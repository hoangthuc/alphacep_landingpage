<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            
            $products = Product::query();
            if ($request->has('name'))$products->where('name',"LIKE", '%'.$request->name.'%');
            if ($request->has('status'))$products->where('status',$request->status);
            
            $products->orderBy('created_at','DESC');
            $products = $products->paginate(10);
            return response()->json($products,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }


    public function create(Request $request)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|string',
                'cost' => 'required|numeric',
            ]);
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }
            $data = $request->toArray();
            $res = Product::create($data);
            return response($res, 200);
        } catch (Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
            }

    }
    

    public function show($id)
    {
        try {
            $res =  Product::findOrFail($id);
            return response()->json($res,200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $validatedData = Validator::make($request->all(), [
                'name' => 'string',
                'cost' => 'numeric',
            ]);
        
            if ($validatedData->fails()) {
                $errors = $validatedData->errors()->all();
                return response(['errors'=>join(",",$errors)], 422);
            }

           Product::where('id',$id)->update($request->toArray());
            return response()->json(['message' => 'Product updated successfully'], 200);
        } catch (Exception $e){
                return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function destroy($id)
    {
        try {
            Product::findOrFail($id)->delete();
            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }






}
