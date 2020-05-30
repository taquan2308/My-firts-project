<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
    	return view('admin_layout');
    }
    public function dashboard(request $request){
        $this->AuthLogin();
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')->where('admin_email',$admin_email)
    	->where('admin_password',$admin_password)
    	->first();
    	// if(!empty($result)){
    	// 	return view('admin_layout');
    	// };
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return redirect::to('/dashboard');
    	}else{
    		Session::put('message','Mật khẩu hoặc tài khoản bị sai, làm ơn nhập lại ^^');
    		return Redirect::to('/admin');
    	}
    }
    public function logout(){
        $this->AuthLogin();
    	// return view('admin_login');
    	Session::put('admin_name',null);
		Session::put('admin_id',null);
		return Redirect::to('/admin');
    }
}
