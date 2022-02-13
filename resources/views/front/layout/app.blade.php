<!doctype html>
<html lang="ta">
  <head>
    <title>@yield('title') - page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{url('front/css/common-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('front/css/style.css')}}">
  </head>
  
  <body>
  	@section('header_bar')
  		<nav class="navbar navbar-expand-lg sticky-top custom_navbar">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="{{url('/')}}">Karthick Store</a>
		    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <!-- <span class="navbar-toggler-icon"></span> -->
		      <i class="fa fa-bars"></i>
		    </button>
		    <div class="collapse navbar-collapse custom_navbar_collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 custom_navbar_ul">
		        
		        <li class="nav-item me-2">
		          <a class="btn" href="{{url('contact')}}">Contact</a>
		        </li>
		        @if(isset(session()->get('user_info')['user_id']))
		        <li class="nav-item me-2">
		          <a class="btn" href="{{url('my-orders')}}">My Orders</a>
		        </li>
		        <li class="nav-item me-2">
		          <a class="btn" href="{{url('logout')}}">Logout</a>
		        </li>
		        @else
		        <li class="nav-item me-2">
		          <a class="btn" href="{{url('register')}}">Register</a>
		        </li>
		        <li class="nav-item me-2">
		          <a class="btn" href="{{url('login')}}">Login</a>
		        </li>
		        @endif
		        @php
		          	$cart = session()->get('cart', []);
		          	$total_mul = [];
		          	@endphp
		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            <i class="fa fa-cart-plus"></i><span class="position-absolute top-0 translate-middle badge rounded-pill bg-danger"> {{count($cart)}}  </span> My Cart
		          </a>

		          	<div class="dropdown-menu p-3" aria-labelledby="navbarDropdown" style="left: auto;right: 0;min-width: 20rem;">
		          		@if($cart)
		          		<h4>Order Summary</h4>
		          		<div>
		          		@foreach($cart as $key => $val)
		          		<div class="row">
		          			<div class="col-7">
		          				<div>
		          					<p>{{$val['name']}}</p>
		          				</div>
		          			</div>
		          			<div class="col-5">
		          				<div>
		          					<p>{{$val['quantity']}} x Rs. {{$val['price']}}</p>
		          				</div>
		          			</div>
		          			
		          		</div>
		          		@php
		          		$total_mul[] = $val['price']*$val['quantity'];
		          		@endphp

		          		@endforeach
		          		</div>
		          		<hr class="dropdown-divider">

		          			<div class="row">
		          				<div class="col-7">
		          					<div>
		          						<p>Total</p>
		          					</div>
		          				</div>
		          				<div class="col-5">
		          					<div class="text-end">
		          						<b>Rs. {{number_format(array_sum($total_mul), 2)}}</b>
		          					</div>
		          				</div>
		          			</div>
		          		<hr class="dropdown-divider">
		          			<div class="row">
		          				<div class="col-md-12">
		          					<div>
		          						<a href="{{url('cart')}}" class="btn btn-theme d-block">View Cart & Checkout</a>
		          					</div>
		          				</div>
		          			</div>
		          			@else
		          			<div>
		          				<h5>Your Cart is Empty</h5>
		          			</div>
		          			@endif
		          		
		          	</div>
		        </li>
		      </ul>
		      
		    </div>
		  </div>
		</nav>
		@if (session('success_msg'))
		    <div class="alert alert-success mb-0">
		        {{ session('success_msg') }}
		    </div>
		@endif

		@if (session('error_msg'))
		    <div class="alert alert-danger mb-0">
		        {{ session('error_msg') }}
		    </div>
		@endif
  	@show

  	@yield('content')

  	@section('footer')
  	<footer class="custom_footer text-center pt-3 pb-3">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<div class="copy_rights_div">
  						<p>Copyright &#169; 2022 - Searchzone Technologies | All Rights Reserved</p>
  					</div>
  				</div>
  			</div>
  		</div>
  	</footer>
  	<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{url('front/js/owl.carousel.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <script>
    	$(document).ready(function(){
			$(".products_listing_owl").owlCarousel({
				loop:false,
				margin:10,
				nav:false,
				responsive:{
				    0:{
				        items:1
				    },
				    600:{
				        items:3
				    },
				    1000:{
				        items:4
				    }
				}
			});
		});
    </script>
    <script>
    	function add_to_cart_func(that){
    		var product_id = $(that).prev().val();
    		 $.ajax({
			  url: "{{url('/add-to-cart')}}",
			  type: "POST",
			  data: {
			  	"_token" : "{{ csrf_token() }}",
			  	"id" : product_id
			  },
			  dataType: "json",
			  success:function(data){
			  	// if (product_id == data) {}
			  	window.location.reload();
			  }
			});
    	}

    	function update_to_cart_func(product_id, quantity, type){
    		
    		$.ajax({
			  url: "{{url('/add-to-cart')}}",
			  type: "POST",
			  data: {
			  	"_token" : "{{ csrf_token() }}",
			  	"id" : product_id,
			  	"quantity" : quantity,
			  	"type" : type
			  },
			  dataType: "json",
			  success:function(data){
			  	window.location.reload();
			  }
			});
    	}
    </script>
    @show


    <script type="module">
	  // Import the functions you need from the SDKs you need
	  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.5.0/firebase-app.js";
	  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.5.0/firebase-analytics.js";
	  // TODO: Add SDKs for Firebase products that you want to use
	  // https://firebase.google.com/docs/web/setup#available-libraries

	  // Your web app's Firebase configuration
	  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
	  const firebaseConfig = {
	    apiKey: "AIzaSyBpnwTUsnfg6GrUIkvgY-SJVXRKMxWj0NE",
	    authDomain: "store-management-26ae8.firebaseapp.com",
	    projectId: "store-management-26ae8",
	    storageBucket: "store-management-26ae8.appspot.com",
	    messagingSenderId: "848069592484",
	    appId: "1:848069592484:web:11050327b69ab200b2ed31",
	    measurementId: "G-W3Y00HKSY5"
	  };

	  // Initialize Firebase
	  const app = initializeApp(firebaseConfig);
	  const analytics = getAnalytics(app);
	</script>
  </body>
</html>