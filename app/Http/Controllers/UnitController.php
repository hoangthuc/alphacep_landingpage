<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
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


class UnitController extends Controller
{
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        
            $unitModel = new Unit();
            $unitModel->customer_id = $request->customer_id;
            $unitModel->customer_name = $request->customer_name;
            $unitModel->unit_type = $request->unit_type;
            $unitModel->vin = $request->vin;
            $unitModel->year = $request->year;
            $unitModel->make = $request->make;
            $unitModel->model = $request->model;
            $unitModel->unit_number = $request->unit_number;
            $unitModel->unit_nickname = $request->unit_nickname;
            $unitModel->fleet = $request->fleet;
            $unitModel->license_plate_state = $request->license_plate_state;
            $unitModel->license_plate = $request->license_plate;
            $unitModel->save();
            return response()->json(['message' => 'Create Unit Successfully'], 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }
    public function item($id)
    {
        try{
        
            $contact =  Unit::where('customer_id',$id)->first();
            return response()->json($contact, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }

    }

}
