<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["users"] = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id')->join('organizations','users.organization_id', '=', 'organizations.id')->join('erps','users.erp_id', '=', 'erps.id')
        ->get(['users.*', 'roles.role_name','organizations.organization_name','erps.erp_name']);
        $data["title"]="List";
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:255',
            'nik' => 'required',
            'fullname' => 'required',
            'email' => 'required|unique:users|max:255',
            'phone' => '',
            'bank_name' => 'required',
            'bank_account' => 'required',
            'organization_id' => 'required',
            'role_id' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'postalcode_id' => '',
            'has_npwp' => '',
            'address'=> '',
            'active' => '',
            'mobile_access'=> '',
            'cti_usage' => '',
            'tmm' => '',
            'limit_days' => '',
            'limit_amount' => '',
            'warehouse_id' => '',
            'erp_id' => '',
        ]);
        //$validatedData = $request->safe()->except(['name', 'email']);
        $show = User::create($validatedData);
       
        //if ($show->fails()) {

        //    return redirect()->back()->withInput()->withErrors($show);
        // }
        // else{
        return redirect()->route('user.create')->with('success', 'Data is successfully saved');
       //  }
    }

    public function postal(Request $request)
    {

        $q= $request->q;
        //DB::enableQueryLog();
        $show = DB::table('postalcodes')->join('subdistricts', 'postalcodes.subdistrict_id', '=', 'subdistricts.id')->join('districts', 'postalcodes.district_id', '=', 'districts.id')->join('cities', 'postalcodes.city_id', '=', 'cities.id')->join('provinces', 'postalcodes.province_id', '=', 'provinces.id')->where('postalcode','LIKE','%'.$q.'%')->limit(10)->get(['postalcodes.id','postalcodes.postalcode','postalcodes.subdistrict_id','subdistricts.subdistrict_name', 'districts.district_name','cities.city_name','provinces.province_name']);
        //$quries = DB::getQueryLog();
        $response=array();
        foreach($show as $sw)
        {
          // $response[] = $sw->subdistrict_name.' - '.$sw->district_name.' - -'.$sw->city_name.' - '.$sw->province_name;
           $response[] = array("id"=>$sw->id,"value"=>$sw->subdistrict_name.' - '.$sw->district_name.' - -'.$sw->city_name.' - '.$sw->province_name);
        }
       // //return dd($quries);;
       // return json_encode($data);
       //return json_encode($response);
       return response()->json($response);
    }
   
    
    
    //public function subdistrict(Request $request)
    //{
//
    //    $q= $request->q;
    //    //DB::enableQueryLog();
    //    $show = DB::table('postalcodes')->join('subdistricts', 'postalcodes.subdistrict_id', //'=', 'subdistricts.id')->join('districts', 'postalcodes.district_id', '=', //'districts.id')->join('cities', 'postalcodes.city_id', '=', 'cities.id')->join//('provinces', 'postalcodes.province_id', '=', 'provinces.id')->where('postalcode',$q)//->get(['postalcodes.*','subdistricts.subdistrict_name', 'districts.district_name',//'cities.city_name','provinces.province_name']);
    //    //$quries = DB::getQueryLog();
  //
    //    
    //    //return dd($quries);;
    //    return json_encode($show);
//
    //}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data["title"]="Create User";
        $data["organization"]=DB::table('organizations')->get();
        $data["role"]=DB::table('roles')->get();
        $data["warehouse"]=DB::table('warehouses')->get();
        $data["postalcode"] = DB::table('postalcodes')->join('subdistricts', 'postalcodes.subdistrict_id', '=', 'subdistricts.id')->join('districts', 'postalcodes.district_id', '=', 'districts.id')->join('cities', 'postalcodes.city_id', '=', 'cities.id')->join('provinces', 'postalcodes.province_id', '=', 'provinces.id')->get(['postalcodes.id','postalcodes.postalcode','postalcodes.subdistrict_id','subdistricts.subdistrict_name', 'districts.district_name','cities.city_name','provinces.province_name']);
        return view('create',$data);
    }

    public function edit(User $user)
    {
        //
        
        $data["title"]="Edit User";
        $data["organization"]=DB::table('organizations')->get();
        $data["role"]=DB::table('roles')->get();
        $data["warehouse"]=DB::table('warehouses')->get();
        $data["postalcode"] = DB::table('postalcodes')->join('subdistricts', 'postalcodes.subdistrict_id', '=', 'subdistricts.id')->join('districts', 'postalcodes.district_id', '=', 'districts.id')->join('cities', 'postalcodes.city_id', '=', 'cities.id')->join('provinces', 'postalcodes.province_id', '=', 'provinces.id')->get(['postalcodes.id','postalcodes.postalcode','postalcodes.subdistrict_id','subdistricts.subdistrict_name', 'districts.district_name','cities.city_name','provinces.province_name']);
        //$data["user"]=DB::table('users')->where('id',$user)->get();
        $data["user"]=$user;

        return view('edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
       $user=User::find($id);
       // dd($id); 
        $rules = [
            'nik' => 'required',
            'fullname' => 'required',
            'phone' => '',
            'bank_name' => 'required',
            'bank_account' => 'required',
            'organization_id' => 'required',
            'role_id' => 'required',
            'postalcode_id' => '',
            'has_npwp' => '',
            'address'=> '',
            'active' => '',
            'mobile_access'=> '',
            'cti_usage' => '',
            'tmm' => '',
            'limit_days' => '',
            'limit_amount' => '',
            'warehouse_id' => '',
            'erp_id' => '',
        ];

        if($request->password_update!="")
        {
           
           $request->password=$request->password_update;
           $request->password_confirmation=$request->password_update_confirmation;
           $rules['password']='min:6|required_with:password_confirmation|//same:password_confirmation';
           $rules['password_confirmation']='min:6';
        }

       if($request->username != $user->username)
       {
          $rules['username']='required|unique:users|max:255';
       }
       if($request->email != $user->email)
       {
          $rules['email']='required|unique:users|max:255';
       }
        $validatedData= $request->validate($rules);
        //$validatedData = $request->safe()->except(['name', 'email']);
        DB::table('users')->where('id',$user->id)->update($validatedData);
       
        //if ($show->fails()) {

        //    return redirect()->back()->withInput()->withErrors($show);
        // }
        // else{
        return redirect()->route('user.edit',$user->id)->with('success', 'Data is successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
