<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\account_acount;
use DB;

class account_accountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acc=new account_acount;
        return response()->json($acc->get_all_account()) ;
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
    {
        $a=$request->data;
        print_r($a->list_permission);
        return response()->json([
            'success' => 200,
            'data'=>"200"
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
    {
        $acc=account_acount::where('id',$id)->get();
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
