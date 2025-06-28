<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReport;
use Illuminate\Support\Facades\Validator;

class ProductReportController extends Controller
{
    public function index()
    {
        $reports = ProductReport::with(['reason', 'product'])->get();

        return response()->json([
            'message' => 'Product reports fetched successfully.',
            'data' => $reports
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reason_id' => 'required|exists:reasons,id',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $report = ProductReport::create($validator->validated());

        return response()->json([
            'message' => 'Product report created successfully.',
            'data' => $report
        ], 201);
    }



    public function edit($id)
    {
        $report = ProductReport::with(['reason', 'product'])->find($id);

        if (!$report) {
            return response()->json(['message' => 'Product report not found.'], 404);
        }

        return response()->json([
            'message' => 'Product report fetched for edit.',
            'data' => $report
        ]);
    }

public function update(Request $request, $id)
{
    try {
        $report = ProductReport::find($id);

        if (!$report) {
            return response()->json(['message' => 'Product report not found.'], 404);
        }

        $validator = Validator::make($request->all(), [
            'reason_id' => 'required|exists:reasons,id',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'input' => $request->all()
            ], 422);
        }

        $report->update($validator->validated());

        return response()->json([
            'message' => 'Product report updated successfully.',
            'data' => $report
        ]);

    } catch (\Throwable $e) {
        return response()->json([
            'message' => 'Server Error',
            'error' => $e->getMessage(),
            'line' => $e->getLine()
        ], 500);
    }
}



    public function show($id)
    {
        $report = ProductReport::with(['reason', 'product'])->find($id);

        if (!$report) {
            return response()->json(['message' => 'Product report not found.'], 404);
        }

        return response()->json([
            'message' => 'Product report fetched successfully.',
            'data' => $report
        ]);
    }

    public function destroy($id)
    {
        $report = ProductReport::find($id);

        if (!$report) {
            return response()->json(['message' => 'Product report not found.'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Product report deleted successfully.']);
    }
}
