<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function add_brand_product(){
        $this->AuthLogin();
    	// dd('1');
    	return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
    	$all_brand_product = DB::table('tbl_brand')->get();
    	$manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	// Biến                    = view(all_product)                   chứa(truyền vào)                        dữ liệu   
    	return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
       // Trả về view(Tổng quan)      (với   'admin.all_category_product'   = view(all_product)    chứa       dữ liệu )
    }
    public function save_brand_product(request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['brand_name'] = $request['brand_product_name'];
    	$data['brand_desc'] = $request['brand_product_desc'];
    	$data['brand_status'] = $request['brand_product_status'];
    	// echo '<>';
    	// print_r($data);
    	// echo '<>';

    	DB::table('tbl_brand')->insert($data);
    	// dd('1');
    	Session::put('message','Bạn đã insert thành công!');
    	return Redirect::to('/add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
    	Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
    	return Redirect::to('/all-brand-product');
    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
    	DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
    	Session::put('message', 'Không kích hoạt danh mục sản phẩm thành công  ');
    	return Redirect::to('/all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        // dd('1');
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
         // dd('1');
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        // dd('1');
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
        //     thằng này       chứa ->  thằng được.... extend ( thằng con này ) ????
        //             ...          <-    (thằng này extend từ thằng trước) ???
    }
    public function update_brand_product(Request $request){
        $this->AuthLogin();
        // ,$category_product_id
        // dd('1');
        $data = array();
        $data['brand_name'] = $request['brand_product_name'];
        $data['brand_desc'] = $request['brand_product_desc'];
        $brand_product_id = $request['brand_product_id'];
        // dd('1');
        // echo '<>';
        // print_r($data);
        // echo '<>';
        // dd($data);
        // dd($category_product_id);
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        // dd('1');
        Session::put('message','Bạn đã update thành công!');
        return Redirect::to('/all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        // dd('1');
        Session::put('message','Bạn đã xóa thành công!');
        return Redirect::to('/all-brand-product');
    }
}
