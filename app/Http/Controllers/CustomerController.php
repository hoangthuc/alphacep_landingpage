<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
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


class CustomerController extends Controller
{
   
    public function list(Request $request)
    {
        try{
        
            $customers = Customer::query();
            if ($request->has('key')) {
                $customers->where('firstname',"LIKE", '%'.$request->key.'%');
                $customers->orWhere('lastname',"LIKE", '%'.$request->key.'%');
            }
            $customers->orderBy('created_at','DESC');
            $customers = $customers->paginate(10);
            
            return response()->json($customers, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        
            $customerModel = new Customer();
            $customerModel->company_name = $request->company_name;
            $customerModel->firstname = $request->firstname;
            $customerModel->lastname = $request->lastname;
            $customerModel->phone = $request->phone;
            $customerModel->cell_phone = $request->cell_phone;
            $customerModel->email = $request->email;
            $customerModel->dot_number = $request->dot_number;
            $customerModel->default_labor_rate = $request->default_labor_rate;
            $customerModel->save();
            return response()->json(['message' => 'Create Customer Successfully'], 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }

}
