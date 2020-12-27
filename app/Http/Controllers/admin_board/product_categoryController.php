<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product_category;
use App\account_permission;
use Illuminate\Support\Facades\Auth;
use Validator;
class product_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json(product_category::all());
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

        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);
           if($validation->passes())
           {
            $image = $request->file('select_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);

            $category=new product_category;
            $category->id_business=Auth::user()->id_business;
            $category->category_icon='images/'.$new_name;
            $category->category_title=$request->category_title;
            $category->save();
            return response()->json([
                'status'=>200,
             'message'   => 'Thêm thành công',
            ]);
           }
           else
           {
            return response()->json([
                'status'=>200,
             'message'   => "Thêm thất bại",
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
        $cate=product_category::where('id',$id)->get();

        return response()->json([
            'status'   => 200,
            'data'=>$cate
           ]);
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
    public function product_category_update(Request $request)
    {
        if($request->check_upload_image==1)
        {
            $validation = Validator::make($request->all(), [
                'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
               ]);
               if($validation->passes())
               {
                $image = $request->file('select_file');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
                $url='images/'.$new_name;
                //product_category::where('id',$id)->update(["category_icon"=>$url,"category_title"=>$request->category_title]);
                return response()->json([
                    'status'=>200,
                 'message'   => 'Cập nhật thành công',
                ]);
               }
               else
               {
                return response()->json([
                    'status'=>200,
                     'message'=>'Cập nhật thất bại',
                ]);
               }
        }
        else
        {
            // product_category::where('id',$id)->update(["category_title"=>$request->category_title]);
                return response()->json([
                    'status'=>200,
                     'message'=>'Cập nhật thành công ko file hình',
                ]);
        }

    }
    public function update(Request $request, $id)
    {


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
