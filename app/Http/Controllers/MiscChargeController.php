<?php

namespace App\Http\Controllers;

use App\Models\MiscCharge;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MiscChargeController extends Controller
{
   
    public function index(Request $request)
    {
        try {

            $misc_charges = MiscCharge::query();

            if ($request->has('work_order_id')) $misc_charges->where('work_order_id', $request->work_order_id);

            $misc_charges->orderBy('created_at', 'DESC');
            $misc_charges = $misc_charges->paginate(10);
            return response()->json($misc_charges, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function create(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'description' => 'required|max:191|string',
                'quantity' => 'required',
                'rate' => 'required',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors' => join(",", $errors)], 422);
            }
            $data = $request->toArray();
            $res = MiscCharge::create($data);
            $list = MiscCharge::where('work_order_id', '=', $res->work_order_id)->get();
            return response([
                'misc_charge' => $res,
                'misc_charges_list' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function show($id)
    {
        try {
            $res =  MiscCharge::findOrFail($id);
            return response()->json($res, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            MiscCharge::findOrFail($id);
            $validatedData = Validator::make($request->all(), [
                'description' => 'required|max:191|string',
                'quantity' => 'required',
                'rate' => 'required',
            ]);

            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors' =>  $errors], 422);
            }
            
            MiscCharge::where('id', $id)->update($request->toArray());
            $est = MiscCharge::where('id', $id)->first();
            $list = MiscCharge::where('work_order_id', '=', $est->work_order_id)->orderBy('updated_at','desc')->get();
            return response()->json([
                'message' => 'Misc Charge updated successfully',
                'misc_charges' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function destroy($id)
    {
        try {
            $est =  MiscCharge::findOrFail($id);
            $wo_id = $est->work_order_id;
            $est->delete();
            $list = MiscCharge::where('work_order_id', '=', $wo_id)->get();
            return response()->json([
                'message' => 'Misc Charge deleted successfully',
                'misc_charges' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
