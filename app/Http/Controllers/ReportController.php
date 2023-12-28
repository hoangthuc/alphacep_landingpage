<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Exception;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        try { 
            $res = Report::query();
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
                'email' => 'string|email|max:255'
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $res = Report::create($data);
            return response($data, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

    }

    public function show($id)
    {
        try {
            $res =  Report::query()->findOrFail($id);
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
                'email' => 'string|email|max:255'
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
           Report::where('id',$id)->update($request->toArray());
            return response()->json(['message' => 'Report updated successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function destroy($id)
    {
        try {
            Report::findOrFail($id)->delete();
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
