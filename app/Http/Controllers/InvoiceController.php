<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\WorkOrder;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\Constraint;
use TCG\Voyager\Facades\Voyager;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Mailgun\Mailgun;
use Twilio\Rest\Client;
use App\Models\ProductItemInvoice;
use App\Models\LineItemInvoice;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        try { 
            $res = Invoice::with('user')->with('order')->with('location');
            if ($request->has('payer_name'))$res->where('payer_name',"LIKE", '%'.$request->payer_name.'%');
            if ($request->has('payer_phone'))$res->where('payer_phone',"LIKE", '%'.$request->payer_phone.'%');
            if ($request->has('payer_email'))$res->where('payer_email',"LIKE", '%'.$request->payer_email.'%');
            if ($request->has('public_id'))$res->where('public_id',$request->public_id);
            if ($request->has('status'))$res->where('status',$request->status);  
            $res->orderBy('created_at','DESC');
            $res = $res->paginate(10);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function create(Request $request)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'payer_name' => 'required|string',
                'product_items' => 'nullable|json',
                'line_items' => 'nullable|json',
                'files' => 'nullable|json',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $data['public_id'] = Str::random(10);
            if($data['work_order_id']){
                $checkError = $this->checkWorkOrder($data['work_order_id']);
                if($checkError) return response()->json(['error' => $checkError], 401);
            }
            $data['user_id'] = $request->user()['id'];
            $res = Invoice::create($data);
            if($data['work_order_id'])WorkOrder::where('id',$data['work_order_id'])->update(['invoice_id'=>$res->id, "invoice_status"=>$res->status ]);
            $this->createPDF($res->id);
            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

    }

    public function createDuplicate($id)
    {
        try{
            $data = Invoice::findOrFail($id);
            $data->type = null;
            $data->work_order_id = null;
            $data = $data->toArray();
            $res = Invoice::create($data);
           $invoice = $this->createPDF($res->id);
            return response($invoice, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

    }

    public function update(Request $request, $id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'payer_name' => 'string',
                'product_items' => 'nullable|json',
                'line_items' => 'nullable|json',
                'files' => 'nullable|json',
            ]);
        
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            if(isset($data['public_id']))unset($data['public_id']);
            if(!count($data))return response()->json(['error' => 'No data updated'], 400);
            $current = Invoice::with('product_items')->with('line_items')->findOrFail($id);
            
            $data['user_id'] = $request->user()['id'];
            $product_items = ProductItemInvoice::where('invoice_id', $id)->get();
            $line_items = LineItemInvoice::where('invoice_id', $id)->get();
              $subtotal = 0;
              if ($product_items) {
                    foreach($product_items as $item){
                        $subtotal += $item['qty']*$item['cost'];
                    }
                  
              }
            if ($line_items) {
                foreach($line_items as $item){
                    $subtotal += $item['qty']*$item['cost'];
                }
            }
            
            $convenience_fee = 0;
            $tax_total = 0;
            $data['subtotal'] = number_format($subtotal, 2, '.', '');
            $convenience_fee_disable = isset($data['convenience_fee_disable'])?$data['convenience_fee_disable']:$current->convenience_fee_disable;
            $data['convenience_fee'] = (!$convenience_fee_disable)?  $convenience_fee : 0;
            $data['tax_total'] = $tax_total;
            $data['amount'] = number_format( $subtotal + $data['convenience_fee'] + $data['tax_total'], 2, '.', '');
            Invoice::where('id',$id)->update($data);
            $this->createPDF($id);
            return response()->json(['message' => 'Invoice updated successfully', "data"=>$data], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function show($id)
    {
        try {
            $res =  Invoice::with('user')->with('order')->with('location')->with('product_items')->with('line_items')->findOrFail($id);
            if(!$res)return response()->json(['error'=>"Find not found"],404);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function showPublic($id,$public_id)
    {
        try {
            $res =  Invoice::with('user')->with('order')->with('location')->with('product_items')->with('line_items')->where('id',$id)->where('public_id',$public_id)->first();
            if(!$res)return response()->json(['error'=>"Find not found"],404);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    


    public function destroy($id)
    {
        try {
            Invoice::findOrFail($id)->delete();
            return response()->json(['message' => 'Invoice deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function uploadSignature(Request $request, $id, $public_id){
        {
            $invoice =  Invoice::where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            if(!$invoice)return response(['errors'=>'Not found invoice'], 422);
            $fullFilename = null;
            $resizeWidth = 1800;
            $resizeHeight = null;
            $slug = 'invoices';
            $file = $request->file('image');
            $path = $slug.'/'.$id.'/';
            $filename = 'signature';
            $filename_counter = 1;
            // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
            while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
                $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
            }
            $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();
            $ext = $file->guessClientExtension();
            if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
                $image = Image::make($file)
                    ->resize($resizeWidth, $resizeHeight, function (Constraint $constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                if ($ext !== 'gif') {
                    $image->orientate();
                }
                $image->encode($file->getClientOriginalExtension(), 75);
    
                // move uploaded file from temp to uploads directory
                if (Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public')) {
                    $status = __('voyager::media.success_uploading');
                    $fullFilename = $fullPath;
                } else {
                    $status = __('voyager::media.error_uploading');
                    return response()->json(['error' => $status], 401);
                }
            } else {
                $status = __('voyager::media.uploading_wrong_type');
                return response()->json(['error' => $status], 401);
            }
            $this->createPDF($id);
            // Return URL for TinyMCE
            return  response()->json(['message' => $status, 'resulf'=>$invoice], 200);
        }

    }

    public function uploadAttachment(Request $request, $id){
        {
            $order =  Invoice::with('user')->where('id',$id)
            ->first();
            if(!$order)return response(['errors'=>'Not found invoice'], 422);
            $slug = 'invoices';
            $file = $request->file('file');
            $fullPath = $slug.'/'.$id;
            $ext = $file->guessClientExtension();
            $upload = null;
            if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif', 'pdf'])) {
                // move uploaded file from temp to uploads directory
                $upload  = Storage::disk(config('voyager.storage.disk'))->put($fullPath, $file);
                if ($upload) {
                    $status = __('media.success_uploaded_file');
                } else {
                    $status = __('media.error_uploading');
                }
            } else {
                $status = __('media.uploading_wrong_type');
            }
            // Return URL for TinyMCE
            return  response()->json(['message' => $status, 'data'=>[ 'url'=>Voyager::image($upload), 'type'=> $ext ] ], 200);
        }

    }

    public function createPDF($id){
        try {
            $slug = 'invoices';
            $invoice = Invoice::with('user')->with('order')->with('location')->with('product_items')->with('line_items')->findOrFail($id);
            if(isset($invoice->work_order_id))WorkOrder::where('id',$invoice->work_order_id)->where('invoice_id', $invoice->id)->update(["invoice_status"=>$invoice->status ]);
            
            $product_items = ProductItemInvoice::where('invoice_id', $id)->get();
            $line_items = LineItemInvoice::where('invoice_id', $id)->get();
            $user = User::with('profile')->findOrFail($invoice->user_id);
             $fileName =  "{$invoice->public_id}{$id}". '.pdf' ; // <--giving the random filename,
             $invoice->url_pdf = url($slug.'/'.$fileName);
             $invoice['files'] = json_decode($invoice['files']);
             $pdf = PDF::loadView("pdf-invoice",compact('invoice','user','product_items', 'line_items')); // <--- load your view into theDOM wrapper;
             $path = public_path($slug); // <--- folder to store the pdf documents into the server;
             $pdf->save($path . '/' . $fileName);
             $invoice->save();
             return $invoice;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendInvoice(Request $request,$id){
        $validatedData = Validator::make($request->all(), [
            'email' => 'string|email|max:255',
        ]);
    
        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->all();
            return response(['errors'=>join(",",$errors)], 422);
        }

        try{

        $conpany = config('services.company.name');
        $invoice = Invoice::findOrFail($id);
        if(!$invoice)return response(['errors'=>'Not found invoice'], 404);
        $data = [
            'company'=> $conpany,
            'url'=> config('services.company.dashboard')."/auth/invoice/{$id}/{$invoice['public_id']}",
            'textPhone'    => 'Your receipt for '.$conpany.' is ready. Please follow the link to download your receipt:'.config('services.company.dashboard')."/auth/invoice/{$id}/{$invoice['public_id']}",
            'textMail'    => 'Your receipt for '.$conpany.' is ready. Please follow the link to download your receipt',
            'button' => "View Receipt",
            'transaction' => '#'.$id
        ];
        if($request['email']){
            $html = view('mailgun-html-invoice',compact('data'))->render();
            $mgClient = Mailgun::create( config('services.mailgun.secret'), config('services.mailgun.endpoint'));
            $domain = config('services.mailgun.domain');
            $params = array(
            'from'    => config('services.mailgun.name').' <'. config('services.mailgun.email').'>',
            'to'      => $request['email'],
            'subject' =>'Your receipt for '.$conpany.' is ready - Transaction #'.$id,
            'text'    => $data['textMail'],
            'html'=> $html
            );
            # Make the call to the client.
            $res = $mgClient->messages()->send($domain, $params);
        }
        if($request['phone']){
            $client = new Client(config('services.twilio.account_sid'), config('services.twilio.auth_token'));
            $res = $client->messages->create( $request['phone'], // to 
                           array(  
                               "messagingServiceSid" => config('services.twilio.service_sid'),      
                               "body" => strip_tags($data['textPhone'])
                           ) 
                  ); 
        }

            return response()->json(['message' => 'Send invoice successfully', 'resulf'=>$res], 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
        
        
       

    }


    public function checkWorkOrder($id){
        try {
        $check = WorkOrder::findOrFail($id);
        if(!$check) return "Order not found";
        if($check->invoice_id) return "Order exist invoice";
        return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function updateAmountInvoice($id){
        try{
        $data = [];
        $current = Invoice::with('product_items')->with('line_items')->findOrFail($id);
        $product_items = ProductItemInvoice::where('invoice_id', $id)->get();
        $line_items = LineItemInvoice::where('invoice_id', $id)->get();
        
         $subtotal = 0;
        foreach($product_items as $item){
            $subtotal += $item['qty']*$item['cost'];
        }
        foreach($line_items as $item){
            $subtotal += $item['qty']*$item['cost'];
        }
        $convenience_fee = 0;
        $tax_total = 0;
        $data['subtotal'] = number_format($subtotal, 2, '.', '');
        $convenience_fee_disable = isset($data['convenience_fee_disable'])?$data['convenience_fee_disable']:$current->convenience_fee_disable;
        $data['convenience_fee'] = (!$convenience_fee_disable)?  $convenience_fee : 0;
        $data['tax_total'] = $tax_total;
        $data['amount'] = number_format( $subtotal + $data['convenience_fee'] + $data['tax_total'], 2, '.', '');
        Invoice::where('id',$id)->update($data);
        return true;
        }catch(Exception $e){
            return false;
        }
        
    }








}
