<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddressController extends Controller
{

    public function index()
    {   
        try {         
            $addresss = Address::get();
    
            return response()->json($addresss,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function create(Request $request)
    {

        try{
            $validatedData = Validator::make($request->all(), [
                'street_address' => 'required',
                'city' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'postal_code' => 'required',  
                'address_name' => 'required',  
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $res = Address::create($data);
            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

    }

    public function show($id)
    {
        try {
            $res =  Address::findOrFail($id);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
