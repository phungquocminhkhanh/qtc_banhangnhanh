<?php

namespace App\Http\Controllers\admin_board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product_product;
use App\product_unit;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use App\product_extra;
class product_productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $product=new product_product();
        return response()->json($product->get_product());

    }
    public function get_unit()
    {
        $unit=DB::table('tbl_product_unit')->where('id_business',Auth::user()->id_business)->get();
        return response()->json($unit);
    }
    public function product_seach(Request $request)
    {
        $sql='select * from tbl_product_product where 1=1 ';
        if($request->id_category)
        {
<<<<<<< HEAD
            if($request->id_category!=0)
            {
                $sql.=' and id_category='.$request->id_category;
            }

=======
            $sql.=' and id_category='.$request->id_category;
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
        }
        if($request->id_product)
            $sql.=' and id='.$request->id_product;
        $product=DB::select($sql);
        if($request->id_product)
        {
                $acc=DB::table('tbl_product_product')
            ->join('tbl_product_extra','tbl_product_extra.id_product','=','tbl_product_product.id')
            ->select('tbl_product_extra.id as extra_id',
            'tbl_product_product.product_title as product_title',
            DB::raw('(select tbl_product_product.product_title from tbl_product_product where tbl_product_product.id=tbl_product_extra.id_product_extra) as extra_title'))
            ->where('tbl_product_extra.id_product',$product[0]->id)
            ->get();
            if(count($acc)>0)
            {
                return response()->json([
                    'status'=>200,
                    'product'=>$product,
                    'extra'=>$acc
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>200,
                    'product'=>$product
                ]);
            }
        }
        return response()->json([
            'status'=>200,
            'data'=>$product,
        ]);
<<<<<<< HEAD
    }
    public function product_seach_auto(Request $request)//bấm cái gì thì nó tự hiểu và seach cái đó
    {
        if($request->key_seach)
        {
            if($request->id_category)
            {
                $product=DB::table('tbl_product_product')
                ->where('id_category',$request->id_category)
                ->orWhere('product_title', 'LIKE', "%{$request->key_seach}%")
                ->orWhere('product_sales_price', '<=', $request->key_seach)
                ->orWhere('product_code', 'LIKE', "%{$request->key_seach}%")
                ->get();
            }
            else
            {
                $product=DB::table('tbl_product_product')
                ->orWhere('product_title', 'LIKE', "%{$request->key_seach}%")
                ->orWhere('product_sales_price', '<=', $request->key_seach)
                ->orWhere('product_code', 'LIKE', "%{$request->key_seach}%")
                ->get();
            }

        }
        else
        {
            if($request->id_category)
            {
                $product=DB::table('tbl_product_product')->where('id_category',$request->id_category)->get();
            }
            else
            {
                $product=DB::table('tbl_product_product')->get();
            }
        }

        return response()->json([
            'status'=>200,
            'data'=>$product
        ]);
    }
    public function product_disable(Request $request)//bấm cái gì thì nó tự hiểu và seach cái đó
    {
        product_product::where('id',$request->id_product)->update(['product_disable'=>$request->status_product]);
        $acc=product_product::where('id',$request->id_product)->get();
        return response()->json([
            'success' => 200,
            'data'=>$acc
        ],200);
=======
    }
    public function product_seach_auto(Request $request)//bấm cái gì thì nó tự hiểu và seach cái đó
    {
       $product=DB::table('tbl_product_product')
       ->where('product_title', 'LIKE', "%{$request->key_seach}%")
       ->orWhere('product_sales_price', '<', $request->key_seach)
       ->orWhere('product_code', 'LIKE', "%{$request->key_seach}%")
       ->orWhere('product_point', '<', $request->key_seach)
       ->get();
        return response()->json([
            'status'=>200,
            'data'=>$product
        ]);
>>>>>>> 9f95f13acb0054fe12a38f08bdd84e84f02ed5b1
    }
    public function insert_product_extra(Request $request)
    {
        $list=$request->list_product_extra;
        foreach($list as $k=>$v)
        {
            $extra=new product_extra;
            $extra->id_product=$request->id_product;
            $extra->id_product_extra=$v;
            $extra->id_product=$request->id_product;
            $extra->id_business=Auth::user()->id_business;
            $extra->save();
        }
        return response()->json([
            'status'=>200,
         'message'   => 'Thêm thành công',
        ]);
    }
    public function detele_extra(Request $request)
    {
        $d=DB::table('tbl_product_extra')->where('id',$request->extra_id)->delete();
        if($d)
        {
            return response()->json([
                'status'=>200,
                'message'=> 'Xóa thành công',
            ]);
        }


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

            $product=new product_product;
            $product->id_business=Auth::user()->id_business;
            $product->id_category=$request->id_category;
            $product->id_unit=$request->id_unit;
            $product->product_img='images/'.$new_name;
            $product->product_title=$request->product_title;
            $product->product_code=$request->product_code;
            $product->product_sales_price=$request->product_sales_price;
            $product->product_description=$request->product_description;
            $product->product_point=$request->product_point;
            $product->save();
            return response()->json([
                'status'=>200,
             'message'   => 'Thêm thành công',
            ]);
           }
           else
           {
            return response()->json([
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
        $product=DB::table('tbl_product_product')
        ->where('id_business',Auth::user()->id_business)
        ->where('id',$id)
        ->get();
        $unit=DB::table('tbl_product_unit')->where('id_business',Auth::user()->id_business)->get();
        $category=DB::table('tbl_product_category')->where('id_business',Auth::user()->id_business)->get();
        return response()->json([
            "status"=>200,
            "product"=>$product,
            "unit"=>$unit,
            "category"=>$category
        ]);
    }
    public function product_update(Request $request)
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
                product_product::where('id',$request->id_product)
                ->update(["id_category"=>$request->id_category,
                "id_unit"=>$request->id_unit,
                "product_img"=>$url,
                "product_title"=>$request->product_title,
                "product_code"=>$request->product_code,
                "product_sales_price"=>$request->product_sales_price,
                "product_description"=>$request->product_description,
                "product_point"=>$request->product_point,
                ]);
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
                product_product::where('id',$request->id_product)
                ->update(["id_category"=>$request->id_category,
                "id_unit"=>$request->id_unit,
                "product_title"=>$request->product_title,
                "product_code"=>$request->product_code,
                "product_sales_price"=>$request->product_sales_price,
                "product_description"=>$request->product_description,
                "product_point"=>$request->product_point,
                ]);
                return response()->json([
                    'status'=>200,
                     'message'=>'Cập nhật thành công ko file hình',
                ]);
        }

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
