<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Allergen;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AllergenController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Allergen::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button class="edit btn btn-sm btn-primary" data-id="'.$row->id.'">Edit</button> ';
                    $btn .= '<button class="delete btn btn-sm btn-danger" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Backend.Layouts.allergen.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        Allergen::create(['name' => $request->name]);

        return response()->json(['success' => 'Allergen created successfully.']);
    }

    public function edit($id)
    {
        $allergen = Allergen::findOrFail($id);
        return response()->json($allergen);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $allergen = Allergen::findOrFail($id);
        $allergen->update(['name' => $request->name]);

        return response()->json(['success' => 'Allergen updated successfully.']);
    }

    public function destroy($id)
    {
        Allergen::findOrFail($id)->delete();
        return response()->json(['success' => 'Allergen deleted successfully.']);
    }
}
