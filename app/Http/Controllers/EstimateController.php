<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EstimateController extends Controller
{
    public function index(Request $request)
    {
        try {

            $estimates = Estimate::query();

            if ($request->has('work_order_id')) $estimates->where('work_order_id', $request->work_order_id);

            $estimates->orderBy('created_at', 'DESC');
            $estimates = $estimates->paginate(10);
            return response()->json($estimates, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function create(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'estimate_date' => 'required',
                'bill_to' => 'required|string',
                'work_order_id' => 'required|numeric',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors' => join(",", $errors)], 422);
            }
            $data = $request->toArray();
            $res = Estimate::create($data);
            $list = Estimate::where('work_order_id', '=', $res->work_order_id)->get();
            return response([
                'estimate' => $res,
                'estimates_list' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function show($id)
    {
        try {
            $res =  Estimate::findOrFail($id);
            return response()->json($res, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            Estimate::findOrFail($id);
            $validatedData = Validator::make($request->all(), [
                'estimate_date' => 'required',
                'bill_to' => 'required|string',
                'work_order_id' => 'required|numeric',
            ]);

            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors' =>  $errors], 422);
            }
            
            Estimate::where('id', $id)->update($request->toArray());
            $est = Estimate::where('id', $id)->first();
            $list = Estimate::where('work_order_id', '=', $est->work_order_id)->orderBy('updated_at','desc')->get();
            return response()->json([
                'message' => 'Estimate updated successfully',
                'estimates' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function destroy($id)
    {
        try {
            $est =  Estimate::findOrFail($id);
            $wo_id = $est->work_order_id;
            $est->delete();
            $list = Estimate::where('work_order_id', '=', $wo_id)->get();
            return response()->json([
                'message' => 'Estimate deleted successfully',
                'estimates' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
