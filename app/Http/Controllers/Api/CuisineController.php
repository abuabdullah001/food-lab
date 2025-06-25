<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CuisineController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Cuisines fetched successfully',
            'data' => Cuisine::all()
        ]);
    }


    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $cuisine = Cuisine::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Cuisine added successfully',
            'data' => $cuisine
        ], 201);
    }

  

    public function show($id)
    {
        try {
            $cuisine = Cuisine::findOrFail($id);
            return response()->json([
                'status' => true,
                'message' => 'Cuisine fetched successfully',
                'data' => $cuisine
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuisine not found'
            ], 404);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $cuisine = Cuisine::findOrFail($id);
            $cuisine->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Cuisine updated successfully',
                'data' => $cuisine
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuisine not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $cuisine = Cuisine::findOrFail($id);
            $cuisine->delete();

            return response()->json([
                'status' => true,
                'message' => 'Cuisine deleted successfully'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Cuisine not found'
            ], 404);
        }
    }
}
