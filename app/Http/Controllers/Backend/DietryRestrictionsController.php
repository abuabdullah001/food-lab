<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\DietryRestrictions;
class DietryRestrictionsController extends Controller
{
    public function index(){
        return view('Backend.layouts.DietryRestrictions.index');
    }

    public function allDietryRestrictions(){
        if(request()->ajax()){
            if(request()->ajax()){
            $data=DietryRestrictions::all();

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
}


public function store(Request $request){

   $validator=Validator::make($request->all(),[
    'name'=>'required|unique:dietry_restrictions,name',
   ]);
   if($validator->fails()){
     
   }

}
}
