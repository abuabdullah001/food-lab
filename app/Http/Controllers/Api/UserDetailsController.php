<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserDetailsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return response()->json([
            'message' => 'User details retrieved successfully.',
            'data' => $user
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        return response()->json([
            'message' => 'User details updated successfully.',
            'data' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        return response()->json([
            'message' => 'User details updated successfully.',
            'data' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully.'
        ]);
    }


}
