<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();
class HomeController extends Controller
{
    public function index(){
    	$all_category_product = DB::table('tbl_category_produce')->where('category_status','0')->orderby('category_id','desc')->get();
        $all_brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_produce','tbl_category_produce.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('product_id','desc')->get();;
    	return view('pages.home')->with('all_product',$all_product)->with('all_category_product',$all_category_product)->with('all_brand_product',$all_brand_product);
    }
}
