<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('tbl_category')->where('category_status','1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category', 'tbl_category.category_id', '=', 'tbl_product.category_id')
        // ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
        // ->orderBy('tbl_product.product_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->get();
      //  $all_product = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->paginate(4);
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.product.search')->with('category', $cate_product)->with('brand', $brand_product)->with('search_product', $search_product);
    }
}
