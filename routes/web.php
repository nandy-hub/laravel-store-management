<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

Route::prefix('adminpanel')->group(function () {
	// Route::get('/', [AdminController::class, 'index']);
	//Admin Side
	Route::get('/', [AdminController::class, 'index']);
	Route::post('/', [AdminController::class, 'index']);
	Route::get('/dashboard', [AdminController::class, 'dashboard']);
	Route::get('/logout', [AdminController::class, 'logout']);
	Route::get('/user_details', [AdminController::class, 'user_details']);
	Route::get('/order_details', [AdminController::class, 'order_details']);
	Route::post('/order_status_update', [AdminController::class, 'order_status_update']);

	Route::get('/contact_enquiry', [AdminController::class, 'contact_enquiry']);

	Route::get('/view_products_cate', [AdminController::class, 'view_products_cate']);
	Route::get('/add_edit_product_cate/{slug}', [AdminController::class, 'add_edit_product_cate']);
	Route::post('/add_edit_product_cate/{slug}', [AdminController::class, 'add_edit_product_cate']);
	Route::get('/status_product_cate/{slug}', [AdminController::class, 'status_product_cate']);
	Route::get('/delete_product_cate/{slug}', [AdminController::class, 'delete_product_cate']);

	Route::get('/view_products', [AdminController::class, 'view_products']);
	Route::get('/add_edit_product/{slug}', [AdminController::class, 'add_edit_product']);
	Route::post('/add_edit_product/{slug}', [AdminController::class, 'add_edit_product']);
	Route::get('/status_product/{slug}', [AdminController::class, 'status_product']);
	Route::get('/delete_product/{slug}', [AdminController::class, 'delete_product']);

	// Route::get('/view_blog_author', [AdminController::class, 'view_blog_author']);
	// Route::get('/add_edit_blog_author/{slug}', [AdminController::class, 'add_edit_blog_author']);
	// Route::post('/add_edit_blog_author/{slug}', [AdminController::class, 'add_edit_blog_author']);
	// Route::get('/status_blog_author/{slug}', [AdminController::class, 'status_blog_author']);
	// Route::get('/delete_blog_author/{slug}', [AdminController::class, 'delete_blog_author']);


	Route::get('/all_products', [AdminController::class, 'all_products']);
	Route::get('/trending_products', [AdminController::class, 'trending_products']);
	Route::get('/meta_pages', [AdminController::class, 'meta_pages']);
	Route::get('/add_edit_meta_page/{slug}', [AdminController::class, 'add_edit_meta_page']);
	Route::post('/add_edit_meta_page/{slug}', [AdminController::class, 'add_edit_meta_page']);
	Route::get('/status_meta_page/{slug}', [AdminController::class, 'status_meta_page']);
	Route::get('/delete_meta_page/{slug}', [AdminController::class, 'delete_meta_page']);
	Route::get('/meta_content', [AdminController::class, 'meta_content']);
	Route::get('/add_edit_meta_content/{slug}', [AdminController::class, 'add_edit_meta_content']);
	Route::post('/add_edit_meta_content/{slug}', [AdminController::class, 'add_edit_meta_content']);
	Route::get('/status_meta_content/{slug}', [AdminController::class, 'status_meta_content']);
	Route::get('/delete_meta_content/{slug}', [AdminController::class, 'delete_meta_content']);

});


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'register']);
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'login']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/my-orders', [HomeController::class, 'my_orders']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/cart', [HomeController::class, 'view_cart']);
Route::get('/checkout', [HomeController::class, 'checkout_order']);
Route::post('/add-to-cart', [HomeController::class, 'add_to_cart']);
// Route::post('/update-to-cart', [HomeController::class, 'update_to_cart']);
Route::get('/speech_orders', [ProductController::class, 'speech_orders']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/products/{slug}/{id}', [ProductController::class, 'products_category_section']);
