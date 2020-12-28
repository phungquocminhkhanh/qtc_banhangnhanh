<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use App\organization_floor;
use App\organization_table;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class floorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(organization_floor::where('id_business',Auth::user()->id_business)->get());
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
    {
        try
        {
            $floor= new organization_floor;
            $floor->id_business=Auth::user()->id_business;
            $floor->floor_priority=$request->floor_priority;
            $floor->floor_title=$request->floor_title;
            $floor->save();
            return response()->json([
                'status'=>200,
                 'message'=>'Thêm thành công',
            ]);

        }
        catch(Exception $e)
        {
            return response()->json([
                'status'=>200,
                 'message'=>'Thêm thất bại',
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(organization_floor::where('id_business',Auth::user()->id_business)->where('id',$id)->get());
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
        try
        {
            $floor= organization_floor::where('id',$id)
            ->update(["floor_title"=>$request->floor_title,"floor_priority"=>$request->floor_priority]);
            return response()->json([
                'status'=>200,
                 'message'=>'Cập nhật thành công',
            ]);

        }
        catch(Exception $e)
        {
            return response()->json([
                'status'=>200,
                 'message'=>'Cập nhật thất bại',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $floor= organization_floor::where('id',$id)->delete();
            $table= organization_table::where('id_floor',$id)->delete();
            return response()->json([
                'status'=>200,
                 'message'=>'Xóa thành công',
            ]);

        }
        catch(Exception $e)
        {
            return response()->json([
                'status'=>200,
                 'message'=>'Xóa thất bại',
            ]);
        }
    }
}
