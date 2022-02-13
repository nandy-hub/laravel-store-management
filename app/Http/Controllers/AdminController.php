<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meta_pages;
use App\Models\Meta_content;
use App\Models\Product;
use App\Models\Products;
use App\Models\ProductCategory;
use App\Models\Users;
use App\Models\Order_details;
use App\Models\Contact;



class AdminController extends Controller
{
    //
    function index(Request $request){
    	if($request->session()->has('admin_id')){
    			return Redirect('/adminpanel/dashboard');
    		}
    	if ($request->isMethod('post')) {

    		$this->validate($request, [
		        'email'           => 'required|email',
		        'password'           => 'required',
		    ]);

			 $admin = \DB::table('admin')->where('id', 1)->first();
    		$data['email'] = $request->email;
    		$data['password'] = $request->password;
    		if ($admin->email == $data['email'] && $admin->password == $data['password']) {
    			$session_id = $request->session()->put('admin_id',$admin->id);
    			return Redirect('/adminpanel/dashboard');
    		} else {
    			return \Redirect::back()->withErrors(['Email and Password Invalid']);
    		}
    	}
    	return view('admin.login');
    }

    function dashboard(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$data['stock_order_count'] = Product::where('status', 1)->where('quantity', '>', 0)->count();
		$data['unstock_order_count'] = Product::where('status', 1)->where('quantity', '<=', 0)->count();
		$data['placed_order_count'] = Order_details::where('status', 'placed')->count();
		$data['delivered_order_count'] = Order_details::where('status', 'delivered')->count();
		$data['cancelled_order_count'] = Order_details::where('status', 'cancelled')->count();
		$data['users_count'] = Users::count();
		$data['contact_enquiry_count'] = Contact::count();
    	return view('admin.dashboard', ['data' => $data]);
    }
    function logout(Request $request){
    	$request->session()->forget('admin_id');
			return Redirect('adminpanel');
    }

    function contact_enquiry(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}

		// $results = DB::table('blogs')->orderBy('id', 'desc')->get();
		$result = Contact::get();
    	return view('admin.contact_enquiry', compact('result'));
    }
    function user_details(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}

		// $results = DB::table('blogs')->orderBy('id', 'desc')->get();
		$result = Users::get();
    	return view('admin.user_details', compact('result'));
    }

    function order_details(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}

		// $result = Order_details::get();
		$result = DB::table('order_details')
            ->join('users_new', 'order_details.user_id', '=', 'users_new.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('order_details.*', 'users_new.name', 'users_new.phone_number', 'products.image')
            ->orderBy('created_at', 'desc')
            ->get();
		// echo "<pre>";
		// print_r($result);exit();
    	return view('admin.order_details', compact('result'));
    }
    function order_status_update(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$order_status_val = $request['order_status_val'];
		$order_id = $request['order_id'];
		$result = Order_details::find($order_id);
		$result->status = $order_status_val;
		if($result->save()){
			echo "1";
		} else {
			echo "0";
		}
    }

    // Manage Products Category - Start
    function view_products_cate(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}

		// $results = DB::table('blogs')->orderBy('id', 'desc')->get();
		$result = ProductCategory::get();
    	return view('admin.view_products_cate', compact('result'));
    }
    function add_edit_product_cate(Request $request, $slug){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		if($slug == 'add'){
			if ($request->isMethod('post')) {
				$ins = new ProductCategory;
				$ins->category_name = $request['category_name'];
				$ins->category_url = $request['category_url'];
				$ins->status = $request['status'];

				if($ins->save()){
					return redirect('adminpanel/view_products_cate')->with('success_error_msg', 'Added Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "add";
			$get_results = "";
		} else {
			if ($request->isMethod('post')) {
				$upt = ProductCategory::find($slug);
				$upt->category_name = $request['category_name'];
				$upt->category_url = $request['category_url'];

				$upt->status = $request['status'];

				if($upt->save()){
					return redirect('adminpanel/view_products_cate')->with('success_error_msg', 'Updated Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "edit";
			$get_results = ProductCategory::find($slug);

		}
    	return view('admin.add_edit_product_cate', compact('page_key', 'get_results'));
    }
    function status_product_cate(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$upt = ProductCategory::find($id);
		if($upt->status == 0){
			$upt->status = 1;
		} else {
			$upt->status = 0;
		}
		if($upt->save()){
			return redirect('adminpanel/view_products_cate')->with('success_error_msg', 'Status Changed Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
    function delete_product_cate(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$del = ProductCategory::find($id);

		if($del->delete()){
			return redirect('adminpanel/view_products_cate')->with('success_error_msg', 'Deleted Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
    // Manage Products Category - End


    // Manage Products - Start
    function view_products(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}

		// $results = DB::table('blogs')->orderBy('id', 'desc')->get();
		$result = Product::orderBy('id', 'desc')->get();
    	return view('admin.view_products', compact('result'));
    }
    function add_edit_product(Request $request, $slug){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		if($slug == 'add'){
			if ($request->isMethod('post')) {
				$ins = new Product;
				$ins->cate_id = $request['cate_id'];
				$ins->name = $request['name'];
				$ins->price = $request['price'];
				$ins->quantity = $request['quantity'];
				$ins->description = $request['description'];
				$ins->status = $request['status'];
				$trending_product_check = $request['trending_product_check'];
				if ($trending_product_check == 'on') {
					$ins->trending_product_check = 1;
				} else {
					$ins->trending_product_check = 0;
				}

				if(isset($request['image'])){
					// $cloud_upload = $request->file('image')->storeOnCloudinary('amazeprix');
					// if(isset($cloud_upload)){
					// 	$ins->image = $cloud_upload->getSecurePath();
					// }else {
					// 	$ins->image = "https://via.placeholder.com/468x260?text=No+Image";
					// }
					$imageName = time().'-'.$request['image']->getClientOriginalName();  
			        $img_upload = $request['image']->move(public_path('uploads/images'), $imageName);
			        if ($img_upload) {
			        	$ins->image = $imageName;
			        }
				}

				// $ins->blog_image = "https://via.placeholder.com/468x260?text=No+Image";

				if($ins->save()){
					return redirect('adminpanel/view_products')->with('success_error_msg', 'Product Added Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "add";
			$get_results = "";
		} else {
			if ($request->isMethod('post')) {
				$upt = Product::find($slug);
				$upt->cate_id = $request['cate_id'];
				$upt->name = $request['name'];
				$upt->price = $request['price'];
				$upt->quantity = $request['quantity'];
				$upt->description = $request['description'];
				$upt->status = $request['status'];
				$trending_product_check = $request['trending_product_check'];
				if ($trending_product_check == 'on') {
					$upt->trending_product_check = 1;
				} else {
					$upt->trending_product_check = 0;
				}

				if(isset($request['image'])){
					// $cloud_upload = $request->file('image')->storeOnCloudinary('amazeprix');
					// if(isset($cloud_upload)){
					// 	$upt->image = $cloud_upload->getSecurePath();
					// }else {
					// 	$upt->image = "https://via.placeholder.com/468x260?text=No+Image";
					// }
					$imageName = time().'-'.$request['image']->getClientOriginalName();  
			        $img_upload = $request['image']->move(public_path('uploads/images'), $imageName);
			        if ($img_upload) {
			        	$upt->image = $imageName;
			        }
				} else {
					$upt->image = $upt->image;
				}


    //             if(isset($request['og_image'])){
				// 	$cloud_upload = $request->file('og_image')->storeOnCloudinary('amazeprix');
				// 	if(isset($cloud_upload)){
				// 		$upt->og_image = $cloud_upload->getSecurePath();
				// 	}else {
				// 		$upt->og_image = "https://via.placeholder.com/468x260?text=No+Image";
				// 	}
				// } else {
				// 	$upt->og_image = $upt->og_image;
				// }

				// echo "<pre>";
				// print_r($upt);
				
				if($upt->save()){
					return redirect('adminpanel/view_products')->with('success_error_msg', 'Product Updated Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "edit";
			$get_results = Product::find($slug);

		}
        $product_cate_results = ProductCategory::where('status', 1)->orderBy('id', 'desc')->get();
    	return view('admin.add_edit_product', compact('page_key', 'get_results', 'product_cate_results'));
    }
    function status_product(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$upt = Product::find($id);
		if($upt->status == 0){
			$upt->status = 1;
		} else {
			$upt->status = 0;
		}
		if($upt->save()){
			return redirect('adminpanel/view_products')->with('success_error_msg', 'Status Changed Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
    function delete_product(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$del = Product::find($id);

		if($del->delete()){
			return redirect('adminpanel/view_products')->with('success_error_msg', 'Deleted Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
    // Manage Products - End

   

    function all_products(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
    	return view('admin.all_products');
    }
    function trending_products(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
    	return view('admin.trending_products');
    }

    // Manage Meta Content
    function meta_pages(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}

		$results = DB::table('meta_pages')->orderBy('id', 'desc')->get();
    	return view('admin.meta_pages', compact('results'));
    }
    function add_edit_meta_page(Request $request, $slug){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		if($slug == 'add'){
			if ($request->isMethod('post')) {
				$ins = new Meta_pages;
				$ins->meta_page_url = $request['meta_page_url'];
				$ins->status = $request['status'];
                $ins->created_at = date("Y-m-d H:i:s");

				// echo "<pre>";
				// print_r($ins);
				if($ins->save()){
					return redirect('adminpanel/meta_pages')->with('success_error_msg', 'Meta page Added Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "add";
			$get_results = "";
		} else {
			if ($request->isMethod('post')) {
				$upt = Meta_pages::find($slug);
				$upt->meta_page_url = $request['meta_page_url'];
				$upt->status = $request['status'];

				// echo "<pre>";
				// print_r($upt);
				if($upt->save()){
					return redirect('adminpanel/meta_pages')->with('success_error_msg', 'Meta Page Updated Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "edit";
			$get_results = Meta_pages::find($slug);

		}
    	return view('admin.add_edit_meta_page', compact('page_key', 'get_results'));
    }

    function status_meta_page(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$upt = Meta_pages::find($id);
		if($upt->status == 0){
			$upt->status = 1;
		} else {
			$upt->status = 0;
		}
		if($upt->save()){
			return redirect('adminpanel/meta_pages')->with('success_error_msg', 'Status Changed Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
    function delete_meta_page(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$del = Meta_pages::find($id);

		if($del->delete()){
			return redirect('adminpanel/meta_pages')->with('success_error_msg', 'Deleted Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
    function meta_content(Request $request){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}

		$results = DB::table('meta_content')->orderBy('id', 'desc')->get();
    	return view('admin.meta_content', compact('results'));
    }
    function add_edit_meta_content(Request $request, $slug){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		if($slug == 'add'){
			if ($request->isMethod('post')) {
				$ins = new Meta_content;
				$ins->meta_page_id = $request['meta_page_id'];
				$ins->meta_title = $request['meta_title'];
				$ins->meta_keyword = $request['meta_keyword'];
				$ins->meta_description = $request['meta_description'];
				$ins->status = $request['status'];
                $ins->created_at = date("Y-m-d H:i:s");

                if(isset($request['og_image'])){
					$cloud_upload = $request->file('og_image')->storeOnCloudinary('amazeprix');
					if(isset($cloud_upload)){
						$ins->og_image = $cloud_upload->getSecurePath();
					}else {
						$ins->og_image = "https://via.placeholder.com/468x260?text=No+Image";
					}
				}
                // if(isset($request['twitter_image'])){
				// 	$cloud_upload = $request->file('twitter_image')->storeOnCloudinary('amazeprix');
				// 	if(isset($cloud_upload)){
				// 		$ins->twitter_image = $cloud_upload->getSecurePath();
				// 	}else {
				// 		$ins->twitter_image = "https://via.placeholder.com/468x260?text=No+Image";
				// 	}
				// }
				if($ins->save()){
					return redirect('adminpanel/meta_content')->with('success_error_msg', 'Meta Content Added Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "add";
			$get_results = "";
		} else {
			if ($request->isMethod('post')) {
				$upt = Meta_content::find($slug);
				$upt->meta_page_id = $request['meta_page_id'];
				$upt->meta_title = $request['meta_title'];
				$upt->meta_keyword = $request['meta_keyword'];
				$upt->meta_description = $request['meta_description'];
				$upt->status = $request['status'];

                if(isset($request['og_image'])){
					$cloud_upload = $request->file('og_image')->storeOnCloudinary('amazeprix');
					if(isset($cloud_upload)){
						$upt->og_image = $cloud_upload->getSecurePath();
					}else {
						$upt->og_image = "https://via.placeholder.com/468x260?text=No+Image";
					}
				} else {
					$upt->og_image = $upt->og_image;
				}

                // if(isset($request['twitter_image'])){
				// 	$cloud_upload = $request->file('twitter_image')->storeOnCloudinary('amazeprix');
				// 	if(isset($cloud_upload)){
				// 		$upt->twitter_image = $cloud_upload->getSecurePath();
				// 	}else {
				// 		$upt->twitter_image = "https://via.placeholder.com/468x260?text=No+Image";
				// 	}
				// } else {
				// 	$upt->twitter_image = $upt->twitter_image;
				// }

				// echo "<pre>";
				// print_r($upt);
				if($upt->save()){
					return redirect('adminpanel/meta_content')->with('success_error_msg', 'Meta Page Updated Successfully');
				} else {
					return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
				}
			}
			$page_key = "edit";
			$get_results = Meta_content::find($slug);

		}
        $meta_page_results = Meta_pages::where('status', 1)->get();
    	return view('admin.add_edit_meta_content', compact('page_key', 'get_results', 'meta_page_results'));
    }

    function status_meta_content(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$upt = Meta_content::find($id);
		if($upt->status == 0){
			$upt->status = 1;
		} else {
			$upt->status = 0;
		}
		if($upt->save()){
			return redirect('adminpanel/meta_content')->with('success_error_msg', 'Status Changed Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
    function delete_meta_content(Request $request, $id){
    	if(!$request->session()->has('admin_id')){
			return Redirect('adminpanel');
		}
		$del = Meta_content::find($id);

		if($del->delete()){
			return redirect('adminpanel/meta_content')->with('success_error_msg', 'Deleted Successfully');
		} else {
			return redirect()->back()->with('success_error_msg', 'Something Went Wrong');
		}
    }
}
