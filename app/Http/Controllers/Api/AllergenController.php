<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Allergen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AllergenController extends Controller
{
    public function index()
    {
        $allergens = Allergen::all();
        return response()->json($allergens);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $allergen = new Allergen();
    $allergen->name = $request->name;
    $allergen->save();

    return response()->json([
        'message' => 'Allergen created successfully.',
        'data' => $allergen
    ], 201);
}


  

public function update(Request $request, $id)
{
    // Create a validator instance
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
    ]);

    // If validation fails, return error response
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed.',
            'errors' => $validator->errors()
        ], 422);
    }

    // Find the allergen
    $allergen = Allergen::findOrFail($id);
    $allergen->update($validator->validated());

    // Return response
    return response()->json([
        'message' => 'Allergen updated successfully.',
        'data' => $allergen
    ]);
}



    public function destroy($id)
    {
        $allergen = Allergen::findOrFail($id);
        $allergen->delete();
        return response()->json(['message' => 'Allergen deleted successfully.'], 200);
    }
}
