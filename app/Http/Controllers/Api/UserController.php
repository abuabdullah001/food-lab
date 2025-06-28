<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return response()->json([
            'message' => 'User list retrieved successfully.',
            'data' => $users
        ]);
    }


    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name'              => 'required|string|max:255',
            'last_name'         => 'nullable|string|max:255',
            'shop_name'         => 'nullable|string|max:255',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'required|string|max:20',
            'password'          => 'required|string|min:8|confirmed',
            'role'         => 'required|in:admin,customer,shop,superadmin',
            'shop_status'       => 'in:approve,pending,cancel',
            'street'            => 'nullable|string',
            'city'              => 'nullable|string',
            'post_code'         => 'nullable|string',
            'flat_house_no'     => 'nullable|string',
            'latitude'          => 'nullable|numeric',
            'longitude'         => 'nullable|numeric',
            'image'             => 'nullable|string',
            
        ], 
        [
            'password.confirmed' => 'The password confirmation does not match.'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();
        // User model handles hashing via setPasswordAttribute()
        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully.',
            'data' => $user
        ], 201);
    }



    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        return response()->json([
            'message' => 'User found.',
            'data' => $user
        ]);
    }





    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'              => 'sometimes|required|string|max:255',
            'last_name'         => 'nullable|string|max:255',
            'shop_name'         => 'nullable|string|max:255',
            'email'             => 'sometimes|required|email|unique:users,email,' . $user->id,
            'phone'             => 'sometimes|required|string|max:20',
            'password'          => 'nullable|string|min:6|confirmed',
            'user_type'         => 'sometimes|required|in:admin,customer,shop,superadmin',
            'shop_status'       => 'in:approve,pending,cancel',
            'street'            => 'nullable|string',
            'city'              => 'nullable|string',
            'post_code'         => 'nullable|string',
            'flat_house_no'     => 'nullable|string',
            'latitude'          => 'nullable|numeric',
            'longitude'         => 'nullable|numeric',
            'image'             => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user->update($validator->validated());

        return response()->json([
            'message' => 'User updated successfully.',
            'data' => $user
        ]);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully.'
        ]);
    }
}
