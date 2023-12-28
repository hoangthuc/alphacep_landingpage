<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
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
use Illuminate\Support\Facades\Hash;


class RoadsyncEmployeeController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        
            $userModel = new User();
            $userModel->email = $request->email;
            $userModel->password = Hash::make($request->password);
            $userModel->user_type = $request->user_type;
            $userModel->firstname = $request->firstname;
            $userModel->lastname = $request->lastname;
            $userModel->employee_number = $request->employee_number;
            $userModel->job_title = $request->job_title;
            $userModel->primary_responsibility = $request->primary_responsibility;
            $userModel->supervisor = $request->supervisor;
            $userModel->assigned_shop = $request->assigned_shop;
            $userModel->associated_shops = $request->associated_shops;
            $userModel->home_phone = $request->home_phone;
            $userModel->cell_phone = $request->cell_phone;
            $userModel->preferred_method_of_contact = $request->preferred_method_of_contact;
            $userModel->landing_page = $request->landing_page;
            $userModel->department = $request->department;
            $userModel->labor_item = $request->labor_item;
            $userModel->authorization_limit = $request->authorization_limit;
            $userModel->technician_pay_type = $request->technician_pay_type;
            $userModel->technician_pay_rate = $request->technician_pay_rate;
            $userModel->technician_certificate_id = $request->technician_certificate_id;
            $userModel->employee_signature = $request->employee_signature;
            $userModel->street_address = $request->street_address;
            $userModel->street_address_2 = $request->street_address_2;
            $userModel->city = $request->city;
            $userModel->country = $request->country;
            $userModel->state = $request->state;
            $userModel->postal_code = $request->postal_code;
            $userModel->roles = $request->roles;
            $userModel->save();
            return response()->json(['message' => 'Create Employee Successfully'], 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }

}
