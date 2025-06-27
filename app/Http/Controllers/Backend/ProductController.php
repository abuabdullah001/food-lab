<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cuisine;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::with('cuisine')->get();
          
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('product_name', fn($row) => $row->product_name)
                ->addColumn('slug', fn($row) => $row->slug)
                ->addColumn('product_description', fn($row) => $row->product_description)
                ->addColumn('price', fn($row) => number_format($row->price, 2))
                ->addColumn('cuisine', fn($row) => $row->cuisine ? $row->cuisine->name : 'N/A')
                ->addColumn('ingredients', fn($row) => $row->ingredients ?: 'N/A')
                ->addColumn('pre_order', fn($row) => $row->pre_order === 'active' ? 'Yes' : 'No')
                ->addColumn('always_avaialable', fn($row) => $row->always_avaialable === 'active' ? 'Yes' : 'No')
                ->addColumn('start_date', fn($row) => optional($row->start_date)->format('Y-m-d') ?: 'N/A')
                ->addColumn('end_date', fn($row) => optional($row->end_date)->format('Y-m-d') ?: 'N/A')
                ->addColumn('action', function ($row) {
                    $editUrl = route('products.edit', $row->id);
                    $deleteUrl = route('products.destroy', $row->id);
                    return '
                    <a href="' . $editUrl . '" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="' . $deleteUrl . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.layouts.product.index');
    }



    public function create()
    {
        $cuisines = Cuisine::all();
        return view('backend.layouts.product.create', compact('cuisines'));
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

        Product::create($validatedData);

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $cuisines = Cuisine::all();
        return view('backend.layouts.product.edit', compact('product', 'cuisines'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
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

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['success' => true]);
    }
}
