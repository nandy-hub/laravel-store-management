<?php
use App\Models\ProductCategory;
use App\Models\Products;


// Admin End - Start
if (! function_exists('get_admin_details')) {
   function get_admin_details_by_key($key)
   {
   		$admin_id = session('admin_id');
   		$result = DB::table('admin')->where('id', $admin_id)->first();
	    return $result->$key;
   }
}

if (! function_exists('get_meta_page_by_id')) {
    function get_meta_page_by_id($id, $key)
    {
            $result = DB::table('meta_pages')->where('id', $id)->first();
            // echo "<pre>";
            // print_r($key);exit;
         return $result->$key;
    }
 }
// Admin End - End


// Front End - Start
if (! function_exists('get_all_products_cate')) {
    function get_all_products_cate()
    {
            $result = ProductCategory::where('status', 1)->get();
         return $result;
    }
 }
 if (! function_exists('get_product_cate_by_id')) {
    function get_product_cate_by_id($id, $key)
    {
        $result = ProductCategory::where('id', $id)->first();
         return $result->$key;
    }
 }
 if (! function_exists('get_order_history_by_pid')) {
    function get_order_history_by_pid($id)
    {
        $result = array();
        foreach (explode(",", $id) as $key => $value) {
          $result[] = Products::where('id', $value)->get();
           
          
        }

        // echo "<pre>";
        // print_r($result[1][0][$col]);exit();
        return $result;
        // $result = Products::where('id', $id)->first();
        //  return $result->$key;
    }
 }

 if (! function_exists('check_product_quantity')) {
    function check_product_quantity($product_id)
    {
        $cart = session()->get('cart', []);
        $result = Products::where('id', $product_id)->where('quantity', '<=', '0')->get();
        return $result;
    }
 }
// Front End - End
