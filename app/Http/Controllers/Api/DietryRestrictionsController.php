<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DietryRestrictions;
use Illuminate\Support\Facades\Validator;

class DietryRestrictionsController extends Controller
{
      public function index()
    {
        return response()->json([
            'data' => DietryRestrictions::all()
        ]);
    }

   
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Manual assignment
        $dietry = new DietryRestrictions();
        $dietry->name = $request->name;
        $dietry->save();

        return response()->json([
            'message' => 'Dietary restriction created successfully.',
            'data' => $dietry
        ], 201);
    }

    
    public function update(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ], 422);
        }

        $dietry = DietryRestrictions::findOrFail($id);
        $dietry->name = $request->name;
        $dietry->save();

        return response()->json([
            'message' => 'Dietary restriction updated successfully.',
            'data' => $dietry
        ]);
    }


    public function destroy($id)
    {
        $dietry = DietryRestrictions::findOrFail($id);
        $dietry->delete();

        return response()->json([
            'message' => 'Dietary restriction deleted successfully.'
        ]);
    }
}
