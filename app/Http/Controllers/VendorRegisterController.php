<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorRegister;
use Exception;
use Illuminate\Support\Facades\Validator;

class VendorRegisterController extends Controller
{
    public function index(Request $request)
    {
        try { 
            $res = VendorRegister::query();
            if ($request->has('contact_name'))$res->where('contact_name',"LIKE", '%'.$request->contact_name.'%');
            if ($request->has('contact_phone'))$res->where('contact_phone',"LIKE", '%'.$request->contact_phone.'%');
            if ($request->has('contact_email'))$res->where('contact_email',"LIKE", '%'.$request->contact_email.'%');
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
                'contact_name' => 'required|string',
                'contact_email' => 'string|email|max:255'
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $res = VendorRegister::create($data);
            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

    }

    public function show($id)
    {
        try {
            $res =  VendorRegister::query()->findOrFail($id);
            if(!$res)return response()->json(['error'=>"Find not found"],404);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
    public function update(Request $request, $id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'contact_name' => 'string',
                'contact_email' => 'string|email|max:255'
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
           VendorRegister::where('id',$id)->update($request->toArray());
            return response()->json(['message' => 'VendorRegister updated successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function destroy($id)
    {
        try {
            VendorRegister::findOrFail($id)->delete();
            return response()->json(['message' => 'Vendor Register deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
