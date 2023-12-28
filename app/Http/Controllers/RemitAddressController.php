<?php

namespace App\Http\Controllers;

use App\Models\RemitAddress;
use Exception;
use Illuminate\Http\Request;

class RemitAddressController extends Controller
{
    public function index()
    {   
        try {         
            $addresss = RemitAddress::get();
    
            return response()->json($addresss,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
