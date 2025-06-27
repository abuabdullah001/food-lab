<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //    public function index(Request $request)
    public function index(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'product_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'cuisines_id' => 'required|exists:cuisines,id',
            'ingredients' => 'nullable|string',
            'pre_order' => 'required|in:active,deactive',
            'always_avaialable' => 'required|in:active,deactive',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        $product = Product::create($validatedData);
        return response()->json($product);
    }

    public function create()
    {
        return response(([
            'message' => 'Product creteted successfully.',
        ]
        ), 201);
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }



    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $validated = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'product_description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'cuisines_id' => 'required|exists:cuisines,id',
            'ingredients' => 'nullable|string',
            'pre_order' => 'required|in:active,deactive',
            'always_avaialable' => 'required|in:active,deactive',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        
        if($validated->fails()){
            return response()->json($validated->errors(), 422);
        }
        
        $product->update($request->all());
     
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully.'], 200);
    }
    
}
