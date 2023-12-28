<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Part;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PartController extends Controller
{
    public function index(Request $request)
    {
        try {

            $parts = Part::query();
            if ($request->has('work_order_id')) $parts->where('work_order_id', $request->work_order_id);
            $parts->orderBy('created_at', 'DESC');
            $parts = $parts->paginate(10);
            return response()->json($parts, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function create(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'description' => 'required|string',
                'quantity' => 'required|numeric',
                'part_number' => 'required|string',
                'work_order_id' => 'required|numeric',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors' => join(",", $errors)], 422);
            }
            $data = $request->toArray();
            $res = Part::create($data);
            $list = Part::where('work_order_id', '=', $res->work_order_id)->get();
            return response([
                'part' => $res,
                'parts_list' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function show($id)
    {
        try {
            $res =  Part::findOrFail($id);
            return response()->json($res, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            Part::findOrFail($id);
            $validatedData = Validator::make($request->all(), [
                'description' => 'required|string',
                'quantity' => 'required|numeric',
                'part_number' => 'required|string',
                'work_order_id' => 'required|numeric',
            ]);

            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors' =>  $errors], 422);
            }
            
            Part::where('id', $id)->update($request->toArray());
            $est = Part::where('id', $id)->first();
            $list = Part::where('work_order_id', '=', $est->work_order_id)->orderBy('updated_at','desc')->get();
            return response()->json([
                'message' => 'Part updated successfully',
                'parts' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function destroy($id)
    {
        try {
            $est =  Part::findOrFail($id);
            $wo_id = $est->work_order_id;
            $est->delete();
            $list = Part::where('work_order_id', '=', $wo_id)->get();
            return response()->json([
                'message' => 'Part deleted successfully',
                'parts' => $list,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
