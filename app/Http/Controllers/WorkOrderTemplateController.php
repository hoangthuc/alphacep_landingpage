<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkOrderTemplateRequest;
use App\Http\Requests\UpdateWorkOrderTemplateRequest;
use App\Models\WorkOrderTemplate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Exception;

class WorkOrderTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $orders = WorkOrderTemplate::query();
            if ($request->has('template_name'))$orders->where('template_name',"LIKE", '%'.$request->template_name.'%');            
            $orders->orderBy('created_at','DESC');
            $orders = $orders->paginate(10);
            return response()->json($orders,200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Invalid'], 401);
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
                'template_name' => 'required|string'
            ]);
            if ($validatedData->fails()) {
                return response(['errors'=>$validatedData->errors()->all()], 422);
            }
            $res = WorkOrderTemplate::create($request->toArray());
            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkOrderTemplateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkOrderTemplateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrderTemplate  $workOrderTemplate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $template =  WorkOrderTemplate::findOrFail($id);
            return response()->json($template,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkOrderTemplate  $workOrderTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrderTemplate $workOrderTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkOrderTemplateRequest  $request
     * @param  \App\Models\WorkOrderTemplate  $workOrderTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'template_name' => 'string'
            ]);
        
            if ($validatedData->fails()) {
                return response(['errors'=>$validatedData->errors()->all()], 422);
            }

            WorkOrderTemplate::where('id',$id)->update($request->toArray());
            return response()->json(['message' => 'Order template updated successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkOrderTemplate  $workOrderTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            WorkOrderTemplate::findOrFail($id)->delete();
            return response()->json(['message' => 'Order template deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
