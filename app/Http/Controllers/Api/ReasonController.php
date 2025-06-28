<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reason;
use Illuminate\Support\Facades\Validator;

class ReasonController extends Controller
{
    public function index()
    {
        $reasons = Reason::all();

        return response()->json([
            'message' => 'Reason list retrieved successfully.',
            'reasons' => $reasons
        ]);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255'
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $reason = new Reason();
    $reason->name = $request->name; // ✅ manually assign
    $reason->save();

    return response()->json([
        'message' => 'Reason created successfully.',
        'reason' => $reason
    ]);
}


    public function edit($id)
    {
        $reason = Reason::find($id);

        if (!$reason) {
            return response()->json(['message' => 'Reason not found.'], 404);
        }

        return response()->json($reason);
    }

    public function update(Request $request, $id)
    {
        $reason = Reason::find($id);

        if (!$reason) {
            return response()->json(['message' => 'Reason not found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255' // Adjust to match your table
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $reason->update($validator->validated());

        return response()->json([
            'message' => 'Reason updated successfully.',
            'reason' => $reason
        ]);
    }

    public function destroy($id)
    {
        $reason = Reason::find($id);

        if (!$reason) {
            return response()->json(['message' => 'Reason not found.'], 404);
        }

        $reason->delete();

        return response()->json(['message' => 'Reason deleted successfully.']);
    }
}
