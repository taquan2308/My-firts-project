<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();
class ProductController extends Controller
{
    public function add_product(){
        // dd('1');
        $category_product = DB::table('tbl_category_produce')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $manager_product = view('admin.add_product')->with('category_product',$category_product)->with('brand_product',$brand_product);
        // Biến                    = view(all_product)                   chứa(truyền vào)                        dữ liệu   
        return view('admin_layout')->with('admin.add_product',$manager_product);
       // Trả về view(Tổng quan)      (với   'admin.all_category_product'   = view(all_product)    chứa       dữ liệu )

        return view('admin.add_product');
    }
    public function all_product(){
        $all_product = DB::table('tbl_product')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        // Biến                    = view(all_product)                   chứa(truyền vào)                        dữ liệu   
        return view('admin_layout')->with('admin.all_product',$manager_product);
       // Trả về view(Tổng quan)      (với   'admin.all_category_product'   = view(all_product)    chứa       dữ liệu )
    }
    public function save_product(request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        // echo '<>';
        // print_r($data);
        // echo '<>';

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            //                                      lấy đuôi mở rộng jpg, png....
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image ;

            DB::table('tbl_product')->insert($data);
            // dd('1');
            Session::put('message','Bạn đã insert thành công!');
            return Redirect::to('/add-product');
        }
        DB::table('tbl_product')->insert($data);
        // dd('1');
        Session::put('message','Bạn đã insert thành công!');
        return Redirect::to('/add-product');
    }
    public function unactive_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/all-product');
    }
    public function active_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message', 'Không kích hoạt danh mục sản phẩm thành công  ');
        return Redirect::to('/all-product');
    }
    public function edit_product($product_id){
        // dd('1');
        // dd($product_id);
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $category_product = DB::table('tbl_category_produce')->orderby('category_id','desc')->get();
         // dd('1');
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('brand_product',$brand_product)->with('category_product',$category_product);
        // dd('1');
        return view('admin_layout')->with('admin.edit_product', $manager_product);
        //     thằng này       chứa ->  thằng được.... extend ( thằng con này ) ????
        //             ...          <-    (thằng này extend từ thằng trước) ???
    }
    public function update_product(Request $request){
        // ,$category_product_id
        // dd('1');
        $product_id = $request['product_id'];
        // dd($product_id);

        $data = array();
        $data['product_name'] = $request['product_name'];
        $data['product_price'] = $request['product_price'];
        // $data['product_image'] = $request['product_image'];
        $data['product_desc'] = $request['product_desc'];
        $data['product_content'] = $request['product_content'];
        $data['category_id'] = $request['category_id'];
        $data['brand_id'] = $request['brand_id'];
        $data['product_status'] = $request['product_status'];

        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            //                                      lấy đuôi mở rộng jpg, png....
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image ;

            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            // dd('1');
            Session::put('message','Bạn đã update thành công!');
            return Redirect::to('/all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        // dd('1');
        Session::put('message','Bạn đã update thành công!');
            return Redirect::to('/all-product');
        // dd('1');
        // echo '<>';
        // print_r($data);
        // echo '<>';
        // dd($data);
        // dd($category_product_id);
        // DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        // // dd('1');
        // Session::put('message','Bạn đã update thành công!');
        // return Redirect::to('/all-product');
    }
    public function delete_product($product_id){
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        // dd('1');
        Session::put('message','Bạn đã xóa thành công!');
        return Redirect::to('/all-product');
    }
}
