<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
       $admin_email = $request->admin_email;
       $admin_password = $request->admin_password ;

       $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password', $admin_password)->first();
              if($result){
        Session::put('admin_name',$result->admin_name);
        Session::put('admin_id', $result->admin_id);
        return Redirect::to('/dashboard');
       }else{
            Session::put('message', 'Sai tài khoản hoặc mật khẩu');
            return Redirect::to('/admin');
       }

       return view('admin.dashboard');

    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else {
            return Redirect::to('admin')->send();
        }
    }
    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
        ->select('tbl_order.*', 'tbl_customer.customer_name')
        ->orderBy('tbl_order.order_id', 'desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
   
}



//             <?php

// use Illuminate\Contracts\Session\Session as SessionSession;
// use Symfony\Component\HttpFoundation\Session\Session;

//                 $message = Session::get('massage');
//                 if($message){
//                     echo $message;
//                 SessionSession::put('massage',null);
//                 }
//             ?>
