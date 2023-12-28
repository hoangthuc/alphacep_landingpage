<?php

namespace App\Http\Controllers;

use App\Models\LineItemInvoice;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\InvoiceController;

class LineItemInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try { 
            $res = LineItemInvoice::query();
            if ($request->has('invoice_id'))$res->where('invoice_id', $request->invoice_id);
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
                'invoice_id' => 'required',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $res = LineItemInvoice::create($data);
            $invoice = new InvoiceController();
            $invoice->updateAmountInvoice($data['invoice_id']);
            $invoice->createPDF($data['invoice_id']);
            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }
    }
    public function updateStatus(Request $request,$id)
    {
        try{
            
            $data = $request->toArray();
            $res = LineItemInvoice::find($id);
            $res->status = $data['status'];
            $res->save();
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
     * @param  \App\Models\LineItemInvoice  $lineItemInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $res =  LineItemInvoice::findOrFail($id);
            if(!$res)return response()->json(['error'=>"Find not found"],404);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LineItemInvoice  $lineItemInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(LineItemInvoice $lineItemInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LineItemInvoice  $lineItemInvoice
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
            $data = $request->toArray();
            if(isset($data['invoice_id']))return response(['errors'=>'Not update invoice_id'], 422);
            $res = LineItemInvoice::where('id',$id)->first();
            if(!$res)return response(['errors'=>'Data not found'], 400);
            $res->update($data);
            $invoice = new InvoiceController();
            $invoice->updateAmountInvoice($res['invoice_id']);
            $invoice->createPDF($res['invoice_id']);
            return response()->json(['message' => 'Updated successfully'], 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LineItemInvoice  $lineItemInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $line_item = LineItemInvoice::findOrFail($id);
            $line_item->delete();
            $invoice = new InvoiceController();
            $invoice->updateAmountInvoice($line_item['invoice_id']);
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
