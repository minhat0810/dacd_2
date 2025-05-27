<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryProduct extends Controller
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
    public function add_category()
    {
        $this->AuthLogin();
        return view('admin.add_category');
    }
    public function all_category()
    {
        // $all_category = DB::table('tbl_category')->get();
        // $manager_category =  view('admin.all_category')->with('all_category',$all_category);
        // return view('admin.all_category')->with('all_category',$manager_category);
        $this->AuthLogin();
        $all_category = DB::table('tbl_category')->get();
        return view('admin.all_category')->with('all_category', $all_category);
    }
    public function save_category(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category');
        // echo '<pre>';
        //     print_r($data); 
        // '</pre>';
    }

    public function unactive_category($category_id){
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status' => 1]);
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category');
    }

    public function active_category($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->update(['category_status' => 0]);
        Session::put('message', 'Ẩn danh mục sản phẩm thành công');
        return Redirect::to('all-category');
    }

    public function edit_category($category_id){
        $this->AuthLogin();
        $edit_category = DB::table('tbl_category')->where('category_id',$category_id)->get();
        return view('admin.edit_category')->with('edit_category', $edit_category);
    }
    public function update_category(Request $request, $category_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        DB::table('tbl_category')->where('category_id', $category_id)->update($data);
        Session::put('message', 'Sửa danh mục sản phẩm thành công');
        return Redirect::to('all-category');
    }
    public function delete_category($category_id)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id', $category_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category');
    }

    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(4)->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category', 'tbl_product.category_id','=', 'tbl_category.category_id')
        ->where('tbl_product.category_id',$category_id)->get();

        $cate_name = DB::table('tbl_category')->where('tbl_category.category_id', $category_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category', $cate_product)->with('brand', $brand_product)
        ->with('category_by_id', $category_by_id)->with('cate_name',$cate_name);
    }
    


}
