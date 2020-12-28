<?php

namespace App\Http\Controllers\admin_board;

use App\customer_customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class customer_customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function get_customer(Request $request)
    {
        $sql='select * from tbl_customer_customer where 1=1 ';
        if($request->id_customer)
        {

                $sql.=' and id='.$request->id_customer;

        }
        $cus=DB::select($sql);
        return response()->json($cus);
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
    public function store(Request $request)
    {   $ngay=date("Y/m/d");

        $cus=new customer_customer();
        $cus->id_business=Auth::user()->id_business;
        $cus->id_account=Auth::user()->id;
        $cus->customer_code=$request->customer_code;
        $cus->customer_name=$request->customer_name;
        $cus->customer_phone=$request->customer_phone;
        $cus->customer_sex=$request->customer_sex;
        $cus->customer_email=$request->customer_email;
        $cus->customer_birthday=$request->customer_birthday;
        $cus->customer_address=$request->customer_address;
        $cus->customer_point=0;
        $cus->customer_taxcode=$request->customer_taxcode;
        $cus->customer_created_by=$ngay;
        $cus->save();
        return response()->json([
            'status' => 200,
            'message'=>"Thêm thành công",
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
         customer_customer::where('id',$id)->update([
             "customer_name"=>$request->customer_name,
             "customer_phone"=>$request->customer_phone,
             "customer_address"=>$request->customer_address,
             "customer_code"=>$request->customer_code,

         ]);
        return response()->json([
            'status' => 200,
            'message'=>"Cập nhật thành công",
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
