<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(){
        
        return view('pages.carts.index');
    }

    public function display(Request $request){
        $carts = $request->cartItems;
        $products = DB::table('tbl_product')->whereIn('product_id', $carts)->get();
        return view('pages.carts.ajax.product_in_cart', compact('products'));
    }
}
