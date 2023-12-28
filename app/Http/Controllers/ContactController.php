<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mailgun\Mailgun;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Validator;
use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Hash;


class ContactController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        
            $contactModel = new Contact();
            $contactModel->customer_id = $request->customer_id;
            $contactModel->customer_name = $request->customer_name;
            $contactModel->firstname = $request->firstname;
            $contactModel->lastname = $request->lastname;
            $contactModel->email = $request->email;
            $contactModel->phone = $request->phone;
            $contactModel->cell_phone = $request->cell_phone;
            $contactModel->save();
            return response()->json(['message' => 'Create Contact Successfully'], 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }
    
    public function item($id)
    {
        try{
        
            $contact =  Contact::where('customer_id',$id)->first();
            return response()->json($contact, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }
}
