<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();


class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_category_product(){
        // dd('1');
        $this->AuthLogin();
        // dd('1');
    	return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
    	$all_category_product = DB::table('tbl_category_produce')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	// Biến                    = view(all_product)                   chứa(truyền vào)                        dữ liệu   
    	return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
       // Trả về view(Tổng quan)      (với   'admin.all_category_product'   = view(all_product)    chứa       dữ liệu )
    }
    public function save_category_product(request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request['category_product_name'];
    	$data['category_desc'] = $request['category_product_desc'];
    	$data['category_status'] = $request['category_product_status'];
    	// echo '<>';
    	// print_r($data);
    	// echo '<>';

    	DB::table('tbl_category_produce')->insert($data);
    	// dd('1');
    	Session::put('message','Bạn đã insert thành công!');
    	return Redirect::to('/add-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_produce')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    	Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
    	return Redirect::to('/all-category-product');
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_produce')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    	Session::put('message', 'Không kích hoạt danh mục sản phẩm thành công  ');
    	return Redirect::to('/all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        // dd('1');
        $edit_category_product = DB::table('tbl_category_produce')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
        //     thằng này       chứa ->  thằng được.... extend ( thằng con này ) ????
        //             ...          <-    (thằng này extend từ thằng trước) ???
    }
    public function update_category_product(Request $request){
        $this->AuthLogin();
        // ,$category_product_id
        $data = array();
        $data['category_name'] = $request['category_product_name'];
        $data['category_desc'] = $request['category_product_desc'];
        $category_product_id = $request['category_product_id'];
        // echo '<>';
        // print_r($data);
        // echo '<>';
        // dd($data);
        // dd($category_product_id);
        DB::table('tbl_category_produce')->where('category_id',$category_product_id)->update($data);
        // dd('1');
        Session::put('message','Bạn đã update thành công!');
        return Redirect::to('/all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_produce')->where('category_id',$category_product_id)->delete();
        // dd('1');
        Session::put('message','Bạn đã xóa thành công!');
        return Redirect::to('/all-category-product');
    }
    // End admin active
    



    
    public function show_brand_home(Request $request){
        dd($request);
        $brand_id = $request->brand_id;
        dd($brand_id);
        $all_category_product = DB::table('tbl_category_produce')->where('category_status','0')->orderby('category_id','desc')->get();
        // $all_brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $manager_category_product = view('pages.category.show_category')->with('all_category_product',$all_category_product);
        // Biến                    = view(all_product)                   chứa(truyền vào)                        dữ liệu   
        return view('layout')->with('pages.category.show_category',$manager_category_product);
       // Trả về view(Tổng quan)      (với   'admin.all_category_product'   = view(all_product)    chứa       dữ liệu )
    }
}   
