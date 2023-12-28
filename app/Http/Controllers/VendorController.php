<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Mailgun\Mailgun;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Validator;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Facades\Voyager;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            
            $vendors = Vendor::query();
            if ($request->has('carrier_name'))$vendors->where('carrier_name',"LIKE", '%'.$request->carrier_name.'%');
            if ($request->has('driver_phone'))$vendors->where('driver_phone',"LIKE", '%'.$request->driver_phone.'%');
            if ($request->has('driver_email'))$vendors->where('driver_email',"LIKE", '%'.$request->driver_email.'%');
            if ($request->has('email'))$vendors->where('email',"LIKE", '%'.$request->email.'%');
            if ($request->has('public_id'))$vendors->where('public_id',$request->public_id);
            if ($request->has('status'))$vendors->where('status',$request->status);
            
            $vendors->orderBy('created_at','DESC');
            $vendors = $vendors->paginate(10);
            return response()->json($vendors,200);
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
                'carrier_name' => 'required|string',
                // 'contact_email' => 'string|email|max:255',
                // 'driver_email' => 'string|email|max:255',
                // 'email' => 'string|email|max:255',
                // 'status' => 'numeric',

            ]);
        
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
           // return response($request->toArray(), 200);
            $res = Vendor::create($request->toArray());

            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

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
            $vendor =  Vendor::findOrFail($id);
            return response()->json($vendor,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function showPublic($id,$public_id)
    {
        try {
            $vendor =  Vendor::where('id',$id)->where('public_id',$public_id)->first();
            return response()->json($vendor,200);
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
            $vendor =  Vendor::where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            if(!$vendor->signature){
                return response()->json(["message"=>"PLease update signature.", "vendor"=>$vendor],200);
            }
            if($vendor->status == 0){
                $vendor = Vendor::findOrFail($id);
                $fileName =  "{$public_id}{$id}". '.pdf' ; // <--giving the random filename,
                $vendor->url_pdf = url('vendors/'.$fileName);
                $vendor->status = 1;
                $pdf = PDF::loadView("pdf-vendor",compact('vendor')); // <--- load your view into theDOM wrapper;
                $path = public_path('vendors'); // <--- folder to store the pdf documents into the server;
                $pdf->save($path . '/' . $fileName);
                $vendor->save();
            }
            return redirect()->intended($vendor->url_pdf);
        } catch (Exception $e) {
            return response()->json(['error' => 'Invalid'], 401);
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
                'carrier_name' => 'string',
                // 'contact_email' => 'string|email|max:255',
                // 'driver_email' => 'string|email|max:255',
                // 'email' => 'string|email|max:255',
                // 'year' => 'numeric',
            ]);
        
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }

           Vendor::where('id',$id)->update($request->toArray());
            return response()->json(['message' => 'Vendor updated successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function cancel(Request $request, $id)
    {
        try{
           Vendor::where('id',$id)->update(['status'=>2]);
            return response()->json(['message' => 'Cancel vendor successfully'], 200);
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
            Vendor::findOrFail($id)->delete();
            return response()->json(['message' => 'Vendor deleted successfully'], 200);
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
        $vendor = Vendor::findOrFail($id);
        if(!$vendor)return response(['errors'=>'Not found vendor'], 422);
        $data = [
            'company'=> $conpany,
            'subject' => 'Your supplier contract for '.$conpany.' requires a signature',
            'url'=> config('services.company.dashboard')."/auth/vendor/{$id}/{$vendor['public_id']}",
            'textPhone'    => 'Your supplier contract for '.$conpany.' requires a signature. Please follow the link to complete the authorization:'.config('services.company.dashboard')."/auth/vendor/{$id}/{$vendor['public_id']}",
            'textMail'    => 'Your supplier contract for <strong>'.$conpany.'</strong> requires a signature. Please follow the link to complete the authorization.',
            'button' => "Complete contract"
        ];
        if($vendor['signature']){
            $data['subject'] = 'Your supplier contract for '.$conpany.' is ready';
            $data['textPhone'] = 'Your supplier contract for '.$conpany.' is available for viewing. Please follow the link to view:'.config('services.company.dashboard')."/auth/vendor/{$id}/{$vendor['public_id']}";
            $data['textMail'] = 'Your supplier contract for <strong>'.$conpany.'</strong> is available for viewing. Please follow the link to view.';
            $data['button'] = "View contract";
        }
        if($request['email']){
            $html = view('mailgun-html-vendor',compact('data'))->render();
            $mgClient = Mailgun::create( config('services.mailgun.secret'), config('services.mailgun.endpoint'));
            $domain = config('services.mailgun.domain');
            $params = array(
            'from'    => config('services.mailgun.name').' <'. config('services.mailgun.email').'>',
            'to'      => $request['email'],
            'subject' => $data['subject'],
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
                               "body" => $data['textPhone']
                           ) 
                  ); 
        }

            return response()->json(['message' => 'Send vendor successfully', 'resulf'=>$res], 200);
        }catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
        
        
       

    }

    public function uploadSignature(Request $request, $id, $public_id){
        {
            $vendor =  Vendor::where('id',$id)
            ->where('public_id',$public_id)
            ->first();
            if(!$vendor)return response(['errors'=>'Not found order'], 422);
            $fullFilename = null;
            $resizeWidth = 1800;
            $resizeHeight = null;
            $slug = 'vendors';
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
                    $status = __('voyager::media.success_uploaded_file');
                    $fullFilename = $fullPath;
                } else {
                    $status = __('voyager::media.error_uploading');
                }
            } else {
                $status = __('voyager::media.uploading_wrong_type');
            }
            $vendor = Vendor::findOrFail($id);
            $vendor->signature = Voyager::image($fullFilename);
            $fileName =  "{$public_id}{$id}". '.pdf' ; // <--giving the random filename,
            $vendor->url_pdf = url('vendors/'.$fileName);
            $vendor->status = 1;
            $pdf = PDF::loadView("pdf-vendor",compact('vendor')); // <--- load your view into theDOM wrapper;
            $path = public_path('vendors'); // <--- folder to store the pdf documents into the server;
            $pdf->save($path . '/' . $fileName);
            $vendor = $vendor->save();
    
            // Return URL for TinyMCE
            return  response()->json(['message' => $status, 'resulf'=>$vendor], 200);
        }

    }
}
