<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\account_acount;
use App\account_authorize;
use App\account_permission;
use DB;
use Illuminate\Support\Facades\Auth;

class account_accountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idbussiness=Auth::user()->id_business;
        $acc=new account_acount;
        return response()->json($acc->get_all_account($idbussiness  )) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function account_permission(Request $request)
    {   $idbussiness=Auth::user()->id_business;
        $arrpermission=$request->list_permission;
        account_authorize::where('id_admin',$request->id_account)->where('id_business',$idbussiness)->delete();
        foreach($arrpermission as $k=>$v)
        {
            $role=new account_authorize;
            $role->id_admin=$request->id_account;
            $role->grant_permission=$v;
            $role->id_business=Auth::user()->id_business;
            $role->save();
        }
        return response()->json([
            'success' => 200
        ],200);
    }
    public function account_detail(Request $request)
    {
        $idbussiness=Auth::user()->id_business;
        $account=new account_acount;
        $detai=account_acount::where('id',$request->id_account)->where('id_business',$idbussiness)->get();
        $per=$account->get_permission($request->id_account);
        return response()->json([
            'success' => 200,
            'data' =>["detail"=>$detai,"permission"=>$per]
        ],200);
    }
    public function account_disable(Request $request)
    {
        account_acount::where('id',$request->id_account)->update(['account_status'=>$request->account_status]);
        $acc=account_acount::where('id',$request->id_account)->get();
        return response()->json([
            'success' => 200,
            'data'=>$acc
        ],200);
    }
    public function account_change_password(Request $request)
    {
        account_acount::where('id',$request->id_account)->update(['account_password'=>md5($request->account_password)]);
        $acc=account_acount::where('id',$request->id_account)->get();
        return response()->json([
            'success' => 200,
            'data'=>$acc
        ],200);
    }
    public function store(Request $request)
    {
        $acc=new account_acount;
        $acc->id_type=$request->id_type;
        $acc->id_business=$request->id_business;
        $acc->account_username=$request->account_username;
        $acc->account_password=md5($request->account_password);
        $acc->account_fullname=$request->account_fullname;
        $acc->account_email=$request->account_email;
        $acc->account_phone=$request->account_phone;
        $acc->account_status='Y';
        $acc->save();
        return response()->json([
            'success' => 200,
            'data'=>$acc
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $idbussiness=Auth::user()->id_business;
        $acc=account_acount::where('id',$id)->where('id_business',$idbussiness)->get();
        return response()->json([
            'success' => 200,
            'data'=>$acc
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $acc=account_acount::where('id',$id)->update([
            'account_username'=>$request->account_username,
            'account_fullname'=>$request->account_fullname,
            'account_email'=>$request->account_email,
            'account_phone'=>$request->account_phone,
            'id_type'=>$request->id_type,
        ]);
        return response()->json([
            'success' => 200,
            'data'=>$acc
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
