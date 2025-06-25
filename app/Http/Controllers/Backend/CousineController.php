<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuisine;
use DataTables;
use Illuminate\Support\Facades\Validator;
class CousineController extends Controller
{
    public function index()
    {
        return view('Backend.layouts.cousine.index');
    }

    public function allCousine(){
          if(request()->ajax()){
            $data=Cuisine::all();

            return Datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action',function($data){
                return '<button type="button"
                            class="btn btn-success btn-sm editRoleBtn"
                            data-bs-toggle="modal"
                            data-bs-target="#editCousineModal"
                            data-id="'.$data->id.'"
                            data-name="'.$data->name.'">
                        Edit
                    </button>
                <a href="" class="btn btn-danger btn-sm delete" data-id="'.$data->id.'">Delete</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
          }
    }

    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:cuisines'
        ]);

       if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }
            $cousine=new Cuisine();
            $cousine->name=$request->name;
            $cousine->save();
            return response()->json(['status'=>true,'message'=>'Cousine Added Successfully']);

    }


    public function update(Request $request){
        // dd($request->all());
        $validator=Validator::make($request->all(),[
            'editname'=>'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        $cousine=Cuisine::find($request->id);
        // dd($cousine);
        $cousine->name=$request->editname;
        $cousine->save();
         return response()->json(['status'=>true,'message'=>'Cousine Updated Successfully']);
    }

    public function delete(Request  $request){
        $cousine=Cuisine::find($request->id);
        $cousine->delete();
        return response()->json(['status'=>200,'message'=>'Cousine Deleted Successfully']);
    }
}
