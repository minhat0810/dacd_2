<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking', [BookingController::class, 'store']);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::post('/tim-kiem', [HomeController::class, 'search']);

//Home
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'show_brand_home']);
Route::get('/chi-tiet-san-pham/{brand_id}', [ProductController::class, 'details_product']);

//<<Backend>></Backend>
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Category
Route::get('/add-category', [CategoryProduct::class, 'add_category']);
Route::get('/all-category', [CategoryProduct::class, 'all_category']);
Route::get('/edit-category/{category_id}', [CategoryProduct::class, 'edit_category']);
Route::get('/delete-category/{category_id}', [CategoryProduct::class, 'delete_category']);

Route::get('/unactive-category/{category_id}', [CategoryProduct::class, 'unactive_category']);
Route::get('/active-category/{category_id}', [CategoryProduct::class, 'active_category']);

Route::post('/save-category', [CategoryProduct::class, 'save_category']);
Route::post('/update-category/{category_id}', [CategoryProduct::class, 'update_category']);

//BrandProduct
Route::get('/add-brand', [BrandProduct::class, 'add_brand']);
Route::get('/all-brand', [BrandProduct::class, 'all_brand']);
Route::get('/edit-brand/{brand_id}', [BrandProduct::class, 'edit_brand']);
Route::get('/delete-brand/{brand_id}', [BrandProduct::class, 'delete_brand']);

Route::get('/unactive-brand/{brand_id}', [BrandProduct::class, 'unactive_brand']);
Route::get('/active-brand/{brand_id}', [BrandProduct::class, 'active_brand']);

Route::post('/save-brand', [BrandProduct::class, 'save_brand']);
Route::post('/update-brand/{brand_id}', [BrandProduct::class, 'update_brand']);

//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);

Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);


//Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);

Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);

Route::get('/manage-order', [AdminController::class, 'manage_order']);

