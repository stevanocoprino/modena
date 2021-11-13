<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ListController extends Controller
{
    //
    public function index()
    {
    	// mengambil data dari table pegawai
       

    	$data["users"] = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->join('organizations','users.organization_id', '=', 'organizations.id')->join('erps','users.erp_id', '=', 'erps.id')
        ->get(['users.*', 'roles.role_name','organizations.organization_name','erps.erp_name']);
        $data["title"]="Home";
    	//// mengirim data pegawai ke view index
    	//return view('list', $data);

        //$data = User::all();
             //return Datatables::of($data);
        //        ->addIndexColumn()
        //        ->addColumn('action', function($row){
        //            $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
        //            return $actionBtn;
        //        })
        //        ->rawColumns(['action'])
        //        ->make(true);
        
//
        return view('list',$data);


        
 
    }
    public function edit(Request $request)
    {
        
    }
}
