<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product_category;
use App\account_permission;
use Illuminate\Support\Facades\Auth;
class product_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        $filehinh= $request->file('category_icon');
        var_dump($filehinh);
        //$tenhinh=$icon->getClientOriginalName();
        // $icon=$request->category_icon;
        // $category=new product_category;
        // $category->id_business=Auth::user()->id_business;
        // $category->title=$request->category_title;

        // $tenhinh=$icon->getClientOriginalName();
        // $name_image=current(explode('.', $tenhinh));
        // $new_image=$name_image.rand(0,99).'.'.$icon->getClientOriginalExtension();
        // $icon->move('image_banhangnhanh',$new_image);
        // $category->category_icon=$new_image;
        // $category->save();
        // return response()->json([
        //     'success' => 200,
        //     'data'=>$tenhinh
        // ],200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
