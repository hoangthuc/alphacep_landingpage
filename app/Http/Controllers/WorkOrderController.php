<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreWorkOrderRequest;
use App\Http\Requests\UpdateWorkOrderRequest;
use App\Models\WorkOrder;
use App\Models\User;
use Mailgun\Mailgun;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Validator;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Str;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            
            $orders = WorkOrder::with('template')->with('invoice')->with('user')->with('location');
            if ($request->has('carrier_name'))$orders->where('carrier_name',"LIKE", '%'.$request->carrier_name.'%');
            if ($request->has('driver_phone'))$orders->where('driver_phone',"LIKE", '%'.$request->driver_phone.'%');
            if ($request->has('driver_email'))$orders->where('driver_email',"LIKE", '%'.$request->driver_email.'%');
            if ($request->has('email'))$orders->where('email',"LIKE", '%'.$request->email.'%');
            if ($request->has('public_id'))$orders->where('public_id',$request->public_id);
            if ($request->has('work_order_template_id'))$orders->where('work_order_template_id',$request->work_order_template_id);
            
            if (isset($request->invoice_id) && $request->has('invoice_id') != null && $request->has('invoice_id') != 'not null')$orders->where('invoice_id',$request->invoice_id);
            
            if (isset($request->invoice_id) && $request->has('invoice_id') != null && $request->has('invoice_id') == 'not null')$orders->whereNotNull('invoice_id');
            
            if (isset($request->invoice_id) && $request->has('invoice_id') == null)$orders->where('invoice_id',null)->orWhere('invoice_status','!=', 4);
            
            if ($request->has('invoice_status'))$orders->where('invoice_status',$request->invoice_status);
            if ($request->has('status_complete'))$orders->where('status_complete',$request->status_complete);
            if ($request->has('date_start_job'))$orders->where('date_start_job', '>' , $request->date_start_job);
            if ($request->has('date_run'))$orders->where('date_start_job', '<=' , $request->date_run);
            if ($request->has('status'))$orders->where('status',$request->status);
            
            $orders->orderBy('created_at','DESC');
            $orders = $orders->paginate(10);
            return response()->json($orders,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'work_order_reference' => 'string',
                'carrier_name' => 'string'
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $data['date_start_job'] = date('Y-m-d H:i:s',strtotime($data['date_start_job']));
            $data['public_id'] = Str::random(10);
            $data['user_id'] = auth('api')->user()->id;
            $res = WorkOrder::create($data);

            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkOrderRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order =  WorkOrder::with('template')->with('invoice')->with('user')->with('location')->with('actions')->findOrFail($id);
            return response()->json($order,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function showPublic($id,$public_id)
    {
        try {
            $order =  WorkOrder::with('template')->with('invoice')->with('user')->with('location')->with('actions')->where('id',$id)->where('public_id',$public_id)->first();
            return response()->json($order,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function confirm($id, $public_id)
    {
        try {
            $order =  WorkOrder::with('template')
            ->where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            if(!$order->signature){
                return redirect()->intended(config('services.company.dashboard')."/auth/confirm/{$id}/{$public_id}");
            }
            if($order->status == 0){
                $order->url_pdf = $this->createPDF($id);
            }
            return redirect()->intended($order->url_pdf);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function sendOrder(Request $request,$id)
    {
        $validatedData = Validator::make($request->all(), [
            'email' => 'string|email|max:255',
        ]);
    
        if ($validatedData->fails()) {
            return response(['errors'=>$validatedData->errors()->all()], 422);
        }

        try{

        $conpany = config('services.company.name');
        $order = WorkOrder::findOrFail($id);
        if(!$order)return response(['errors'=>'Not found order'], 422);
        $data = [
            'company'=> $conpany,
            'url'=> config('services.company.dashboard')."/auth/confirm/{$id}/{$order['public_id']}",
            'textPhone'    => 'Your work order authorization for '.$conpany.' requires a signature. Please follow the link to complete the authorization:'.config('services.company.dashboard')."/auth/confirm/{$id}/{$order['public_id']}",
            'textMail'    => 'Your work order authorization for <strong>'.$conpany.'</strong> requires a signature. Please follow the link to complete the authorization.',
            'button' => "Complete Authorization"
        ];
        if($order['signature'])$data = [
            'company'=> $conpany,
            'url'=> config('services.company.dashboard')."/auth/confirm/{$id}/{$order['public_id']}",
            'textPhone'    => 'Your work order authorization for '.$conpany.' is available for viewing. Please follow the link to view:'.config('services.company.dashboard')."/auth/confirm/{$id}/{$order['public_id']}",
            'textMail'    => 'Your work order authorization for <strong>'.$conpany.'</strong> is available for viewing. Please follow the link to view.',
            'button' => "View Authorization"
        ];
        if($request['email']){
            $html = view('mailgun-html',compact('data'))->render();
            $mgClient = Mailgun::create( config('services.mailgun.secret'), config('services.mailgun.endpoint'));
            $domain = config('services.mailgun.domain');
            $params = array(
            'from'    => config('services.mailgun.name').' <'. config('services.mailgun.email').'>',
            'to'      => $request['email'],
            'subject' => $conpany.' Work Order Authorization',
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

            return response()->json(['message' => 'Send order successfully', 'resulf'=>$res], 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkOrderRequest  $request
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'work_order_reference' => 'string',
                'carrier_name' => 'string',
                // 'driver_email' => 'string|email|max:255',
                // 'email' => 'string|email|max:255',
                // 'last_8_of_vin' => 'size:8',
                // 'year' => 'numeric',
                // 'work_order_template_id' => 'numeric',
            ]);
        
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }

           WorkOrder::where('id',$id)->update($request->toArray());
           $this->createPDF($id);
           $order = WorkOrder::findOrFail($id);
            return response()->json(['message' => 'Order updated successfully', "resulf"=>$order], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function updatePublic(Request $request, $id,$public_id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'carrier_name' => 'string'
            ]);
        
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
           WorkOrder::where('id',$id)->where('public_id',$public_id)->update($request->toArray());
           $this->createPDF($id);
            return response()->json(['message' => 'Order updated successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function cancel(Request $request, $id)
    {
        try{
           WorkOrder::where('id',$id)->update(['status'=>2]);
            return response()->json(['message' => 'Cancel Order successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            WorkOrder::findOrFail($id)->delete();
            return response()->json(['message' => 'Order deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }



    public function sendConfirm(Request $request,$id){
        $validatedData = Validator::make($request->all(), [
            'email' => 'string|email|max:255',
        ]);
    
        if ($validatedData->fails()) {
            $errors = $validatedData->errors()->all();
            return response(['errors'=>join(",",$errors)], 422);
        }

        try{

        $conpany = config('services.company.name');
        $order = WorkOrder::findOrFail($id);
        if(!$order)return response(['errors'=>'Not found order'], 422);
        $data = [
            'company'=> $conpany,
            'url'=> config('services.company.dashboard')."/auth/confirm/{$id}/{$order['public_id']}",
            'textPhone'    => 'Your work order authorization for '.$conpany.' requires a signature. Please follow the link to complete the authorization:'.config('services.company.dashboard')."/auth/confirm/{$id}/{$order['public_id']}",
            'textMail'    => 'Your work order authorization for <strong>'.$conpany.'</strong> requires a signature. Please follow the link to complete the authorization.',
            'button' => "Complete Authorization"
        ];
        if($request['email']){
            $html = view('mailgun-html',compact('data'))->render();
            $mgClient = Mailgun::create( config('services.mailgun.secret'), config('services.mailgun.endpoint'));
            $domain = config('services.mailgun.domain');
            $params = array(
            'from'    => config('services.mailgun.name').' <'. config('services.mailgun.email').'>',
            'to'      => $request['email'],
            'subject' => $conpany.' Work Order Authorization',
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

            return response()->json(['message' => 'Send confirm successfully', 'resulf'=>$res], 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
        
        
       

    }

    public function uploadSignature(Request $request, $id, $public_id){
        {
            $order =  WorkOrder::where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            if(!$order)return response(['errors'=>'Not found order'], 422);
            $fullFilename = null;
            $resizeWidth = 1800;
            $resizeHeight = null;
            $slug = 'orders';
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
                }
            } else {
                $status = __('voyager::media.uploading_wrong_type');
            }
            $order = WorkOrder::findOrFail($id);
            $order->signature = Voyager::image($fullFilename);
            $order->save();
            $this->createPDF($id);
            // Return URL for TinyMCE
            return  response()->json(['message' => 'Upload successfully', 'resulf'=>$order], 200);
        }

    }

    public function createPDF($id){
        $order = WorkOrder::with('template')->with('location')->findOrFail($id);
        $user = User::with('profile')->findOrFail($order->user_id);
        $public_id = $order->public_id;
        $fileName =  "{$public_id}{$id}". '.pdf' ; // <--giving the random filename,
        $url =  url('orders/'.$fileName);
        $order->url_pdf = $url;
        $order->status = 1;
        $pdf = PDF::loadView("pdf",compact('order','user')); // <--- load your view into theDOM wrapper;
        $path = public_path('orders'); // <--- folder to store the pdf documents into the server;
        $pdf->save($path . '/' . $fileName);
        $order->save();
        return $url;
    }
}
