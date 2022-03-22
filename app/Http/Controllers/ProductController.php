<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){

    }
    public function speech_orders(){
    	return view('front.speech_orders');
    }
    public function products_category_section($slug, $id){
    	$products = Product::where('status', 1)
                ->where('cate_id', $id)
                ->orderBy('id', 'desc')
                ->get();
        return view('front.products_category_section', compact('products'));
    }

}
