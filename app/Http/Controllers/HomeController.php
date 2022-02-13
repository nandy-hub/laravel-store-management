<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Users;
use App\Models\Product;
use App\Models\Products;
use App\Models\Order_details;
use App\Models\Contact;
use Hash;

class HomeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $cart = session()->get('cart', []);
            foreach ($cart as $key => $value) {
                $products_res = check_product_quantity($key);
                if ($key == @$products_res[0]['id']) {
                    unset($cart[$key]); 
                    session()->put('cart', $cart);
                }
            }
            return $next($request);
        });
    }
    
    public function index()
    {
        //
        $products = Product::where('status', 1)
                ->orderBy('id', 'desc')
                ->get();
        $top_products = Product::where('status', 1)
                ->where('trending_product_check', 1)
                ->orderBy('id', 'desc')
                ->get();        
        return view('front.home', compact('products', 'top_products'));
    }

     public function register(Request $request)
    {
        //
        if (session()->has('user_info')) {
            return redirect('/');
        }
        if ($request->post()) {
           
            $validated = $request->validate([
                'name' => 'required',
                'phone_number' => 'required|unique:users_new',
                'password' => 'required',
            ]);
            $password = $request->input('password');
            $confirm_password = $request->input('confirm_password');
            if ($password == $confirm_password) {
                $ins = new Users;
                $ins->name = $request->input('name');
                $ins->phone_number = $request->input('phone_number');
                $ins->password = Hash::make($request->input('password'));
                $ins->created_at =date("Y-m-d H:i:s");
                
                if ($ins->save()) {
                    return redirect('/login')->with('success_msg', 'Registered Successfully');
                } else {
                    return redirect('/register')->with('error_msg', 'Something Went Wrong on Register');
                }
            } else {
                return redirect()->back()->with('error_msg', 'Password & Confirm Password must be same');
            }
        }
        return view('front.register', ['name' => 'Nandhu']);
    }

    public function login(Request $request){
            if (session()->has('user_info')) {
                return redirect('/');
            }
            if ($request->post()) {

               $phone_number = $request->input('phone_number');
               $password = $request->input('password');

                $get_result = Users::where('phone_number', $phone_number)->first();
                if ($get_result && Hash::check($password, $get_result->password)) {
                    $user_info = ['user_id' => $get_result->id, 'user_ph' => $get_result->phone_number];
                    session()->put('user_info', $user_info);

                    // if (session()->get('cart')) {
                    //     return redirect('/')->with('success_msg', 'Your order placed successfully');
                    // } else {
                        return redirect('/')->with('success_msg', 'Logged In Successfully');
                    // }

                    
                } else {
                    return redirect()->back()->with('error_msg', 'Phone Number or Password Incorrect');
                }
            }
         return view('front.login', ['name' => 'Nandhu']);   
    }
    public function logout(){
        session()->forget('user_info');
        return redirect('/');

    }
    public function my_orders(){
        if (!session()->has('user_info')) {
             return redirect('/login')->with('error_msg', 'Please Login to Continue');
        } else {
            $user_id = session()->get('user_info')['user_id'];
            $order_details_res = Order_details::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
           
            return view('front.my_orders', compact('order_details_res'));    
        }
        
    }
    public function checkout_order(){
        if (!session()->has('user_info')) {
             return redirect('/login')->with('error_msg', 'Please Login to Continue');
        } else {
            if (session()->get('cart')) {
                
                // $product_id_arr = array();
                // $quantity_arr = array();
                // $single_price_arr = array();
                // echo "<pre>";
                // print_r(session()->get('cart'));exit();
                foreach (session()->get('cart') as $key => $value) {
                    // $product_id_arr[] = $value['product_id'];
                    // $quantity_arr[] = $value['quantity'];
                    // $single_price_arr[] = $value['price'];
                    $ins = new Order_details;
                    $ins->user_id = session()->get('user_info')['user_id'];
                    $ins->product_id = $value['product_id'];
                    $ins->product_name = $value['name'];
                    $ins->single_price = $value['price'];
                    $ins->total_price = $value['quantity']*$value['price'];
                    $ins->quantity = $value['quantity'];
                    $ins->created_at =date("Y-m-d H:i:s");
                    $ins->status = 'placed';
                    if ($ins->save()) {
                        $products_res = Products::find($value['product_id']);
                        $products_res->quantity = $products_res['quantity']-$value['quantity'];
                        $products_res->save();
                    }
                    
                    
                }
                return redirect('/')->with('success_msg', 'Your order placed successfully');
                // $ins = new Order_details;
                // $ins->user_id = session()->get('user_info')['user_id'];
                // $ins->product_id = implode(", ", $product_id_arr);
                // $ins->quantity = implode(", ", $quantity_arr);
                // $ins->single_price = implode(", ", $single_price_arr);
                // $ins->created_at =date("Y-m-d H:i:s");
                // if($ins->save()){
                //     return redirect('/')->with('success_msg', 'Your order placed successfully');
                // } else {
                //     return redirect('/')->with('error_msg', 'Something went wrong on place your order');
                // }

                
            } else {
                return redirect('/cart')->with('error_msg', 'Your Cart is Empty');
            }
        }
        
    }

    public function dashboard(){
        // if (!session()->has('user_info')) {
        //     return redirect('/login');
        // }
        return view('front.dashboard', ['name' => 'Nandhu']); 
    }
    public function view_cart(){
        $cart = session()->get('cart', []);
        $products = Product::where('status', 1)
                ->limit(4)
                ->orderBy('id', 'desc')
                ->get();
        return view('front.view_cart', compact('cart', 'products'));
    }
    public function add_to_cart(Request $request){
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $type = $request->input('type');
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
       
        if (isset($cart[$id])) {
            if ($type == 'inc') {
                $cart[$id]["quantity"]++;
            } elseif ($type == 'dec') {
                $cart[$id]["quantity"]--; 
                if ($cart[$id]['quantity'] == 0) {
                    unset($cart[$id]);
                } 
            } else {
              $cart[$id]["quantity"] = 1;
            }
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
            
        }
        
           
        // if ($cart[$id]['quantity'] != 0) {
        //    // session()->flush($cart[$id]);
        //     session()->put('cart', $cart);
        // }
        session()->put('cart', $cart);
        // return $cart[$id];
        echo "1";
        
    }

    function contact(Request $request){
        if ($request->post()) {
           
            $validated = $request->validate([
                'name' => 'required',
                'phone_number' => 'required',
                'message' => 'required',
            ]);
            $ins = new Contact;
            $ins->name = $request->input('name');
            $ins->phone_number = $request->input('phone_number');
            $ins->message = $request->input('message');
            // $ins->created_at =date("Y-m-d H:i:s");
            
            if ($ins->save()) {
                return redirect()->back()->with('success_msg', 'Submitted Successfully');
            } else {
                return redirec()->back()->with('error_msg', 'Something Went Wrong');
            }
           
        }
        return view('front.contact');
    }

    
}
