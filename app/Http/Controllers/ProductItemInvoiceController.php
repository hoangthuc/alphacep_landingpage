<?php

namespace App\Http\Controllers;

use App\Models\ProductItemInvoice;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\InvoiceController;

class ProductItemInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try { 
            $res = ProductItemInvoice::query();
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
                'product_id' => 'required',
                'invoice_id' => 'required',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $data['label'] = $data['name'];
            $data['description'] = $data['name'];
            if (ProductItemInvoice::where('product_id', $data['product_id'] )->where('invoice_id', $data['invoice_id'] )->exists()) {
                return response()->json(['message' => "Data exist."], 422);
            }
            $product = Product::findOrFail($data['product_id']);
            if($product->cost)$data['cost'] = $product->cost;
            $res = ProductItemInvoice::create($data);
            $invoice = new InvoiceController();
            $invoice->updateAmountInvoice($data['invoice_id']);
            $invoice->createPDF($data['invoice_id']);
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
     * @param  \App\Models\ProductItemInvoice  $productItemInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $res =  ProductItemInvoice::findOrFail($id);
            if(!$res)return response()->json(['error'=>"Find not found"],404);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductItemInvoice  $productItemInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductItemInvoice $productItemInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductItemInvoice  $productItemInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'product_id' => 'required'
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            if(isset($data['invoice_id']))return response(['errors'=>'Not update invoice_id'], 422);
            if($data['product_id']){
                $product = Product::findOrFail($data['product_id']);
                if($product->cost)$data['cost'] = $product->cost;
                $data['name'] = $product->name;
            }
            $product_item = ProductItemInvoice::where('id',$id)->first();
            $product_item->update($data);
            $invoice = new InvoiceController();
            $invoice->updateAmountInvoice($product_item['invoice_id']);
            return response()->json(['message' => 'Updated successfully'], 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductItemInvoice  $productItemInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product_item = ProductItemInvoice::findOrFail($id);
            $product_item->delete();
            $invoice = new InvoiceController();
            $invoice->updateAmountInvoice($product_item['invoice_id']);
            
            $invoice->createPDF($product_item['invoice_id']);
            return response()->json(['message' => 'Deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
