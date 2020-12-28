<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use App\organization_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use FFI\Exception;
use Illuminate\Support\Facades\Auth;

class tableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $table=DB::table('tbl_organization_table')
        ->join('tbl_organization_floor','tbl_organization_floor.id','=','tbl_organization_table.id_floor')
        ->select('tbl_organization_table.id',
        'tbl_organization_table.table_title',
        'tbl_organization_floor.floor_title',)
        ->get();
        return response()->json($table);
    }
    public function get_table(Request $request)//get table thoe floor
    {
        return response()->json(DB::table('tbl_organization_table')
        ->join('tbl_organization_floor','tbl_organization_floor.id','=','tbl_organization_table.id_floor')
        ->where('tbl_organization_table.id_floor',$request->id_floor)
        ->where('tbl_organization_table.id_business',Auth::user()->id_business)
        ->select('tbl_organization_table.id',
        'tbl_organization_table.id_floor as id_floor',
        'tbl_organization_table.table_title',
        'tbl_organization_table.table_status',
        'tbl_organization_floor.floor_title')
        ->get());
        // try
        // {
        //     $sql='select * from tbl_organization_table
        //     join tbl_organization_floor on tbl_organization_table.id_floor=tbl_organization_floor.id
        //     where 1=1 ';
        //     if($request->id_floor)
        //     {
        //             $sql.=' and tbl_organization_table.id_floor='.$request->id_floor;

        //     }
        //     $table=DB::select($sql);
        //     return response()->json($table);
        // }
        // catch(Exception $e)
        // {
        //     return response()->json([
        //         'status'=>401,
        //          'message'=>'Fail',
        //     ]);
        // }

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

                $table= new organization_table;
                $table->id_business=Auth::user()->id_business;
                $table->id_floor=$request->id_floor;
                $table->table_title=$request->table_title;
                $table->save();


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
        return response()->json(organization_table::where('id',$id)->get());
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
            $floor= organization_table::where('id',$id)
            ->update(["table_title"=>$request->table_title]);
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
            organization_table::where('id',$id)->delete();
            return response()->json([
                'status'=>200,
                 'message'=>'xóa thành công',
            ]);

        }
        catch(Exception $e)
        {
            return response()->json([
                'status'=>200,
                 'message'=>'xóa thất bại',
            ]);
        }
    }
}
