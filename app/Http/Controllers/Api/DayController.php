<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index(){
        return response()->json([
            'message' => 'Day list retrieved successfully.',
            'data' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']
        ]);
    }

    public function store(Request $request){
        return response()->json([
            'message' => 'Day created successfully.',
            'data' => $request->all()
        ]);
    }

    public function update(Request $request, $day_id){
        return response()->json([
            'message' => 'Day updated successfully.',
            'data' => $request->all()
        ]);
    }

    public function destroy($day_id){
        return response()->json([
            'message' => 'Day deleted successfully.',
            'data' => []
        ]);
    }

    
}
