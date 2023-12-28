<?php

namespace App\Http\Controllers;

use App\Models\ActionOrder;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class ActionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try { 
            $res = ActionOrder::query();
            if ($request->has('name'))$res->where('name',"LIKE", '%'.$request->name.'%');
            $res->orderBy('created_at','DESC');
            $res = $res->paginate(10);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'name' => 'string',
                'description' => 'string',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $res = ActionOrder::create($data);
            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActionOrder  $actionOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $res =  ActionOrder::findOrFail($id);
            if(!$res)return response()->json(['error'=>"Find not found"],404);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActionOrder  $actionOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ActionOrder $actionOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActionOrder  $actionOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'name' => 'string'
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            ActionOrder::where('id',$id)->update($request->toArray());
            return response()->json(['message' => 'Updated successfully'], 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActionOrder  $actionOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ActionOrder::findOrFail($id)->delete();
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
