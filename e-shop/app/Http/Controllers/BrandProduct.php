<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BrandProduct extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand()
    {
        $this->AuthLogin();
        return view('admin.add_brand');
    }
    public function all_brand()
    {
        // $all_category = DB::table('tbl_category')->get();
        // $manager_category =  view('admin.all_category')->with('all_category',$all_category);
        // return view('admin.all_category')->with('all_category',$manager_category);
        $all_category = DB::table('tbl_brand_product')->get();
        return view('admin.all_brand')->with('all_brand', $all_category);
    }
    public function save_brand(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;

        DB::table('tbl_brand_product')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('add-brand');
        // echo '<pre>';
        //     print_r($data); 
        // '</pre>';
    }

    public function unactive_brand($brand_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update(['brand_status' => 1]);
        Session::put('message', 'Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand');
    }

    public function active_brand($brand_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update(['brand_status' => 0]);
        Session::put('message', 'Ẩn thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand');
    }

    public function edit_brand($brand_id)
    {
        $this->AuthLogin();
        $edit_brand = DB::table('tbl_brand_product')->where('brand_id', $brand_id)->get();
        return view('admin.edit_brand')->with('edit_brand', $edit_brand);
    }
    public function update_brand(Request $request, $brand_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->update($data);
        Session::put('message', 'Sửa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand');
    }
    public function delete_brand($brand_id)
    {
        $this->AuthLogin();
        DB::table('tbl_brand_product')->where('brand_id', $brand_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-brand');
    }
    public function show_brand_home($brand_id)
    {
        $cate_product = DB::table('tbl_category')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        // $all_product = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(4)->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product', 'tbl_product.brand_id', '=', 'tbl_brand_product.brand_id')
        ->where('tbl_brand_product.brand_id', $brand_id)->get();

        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id', $brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('brand_by_id', $brand_by_id)->with('brand_name', $brand_name);
    }
}
