@extends('front.layout.app')
	@section('title', 'login')

	@section('content')
	<section class="login_register_sec">
	    <div class="container">
	    	<div class="row justify-content-center">
	    		<div class="col-md-6">
	    			<div class="login_register_card text-center">
		    			<div class="login_register_head mb-3">
		    				<h2>Login</h2>
		    			</div>
		    			<div class="login_register_body">

		    				<form method="post" action="{{url('login')}}">
		    					{{csrf_field()}}
							  <div class="row">
								  
								  <div class="col-md-12">
								  	<div class="mb-3">
								    <input type="tel" class="form-control" placeholder="Phone Number" aria-label="Phone Number" name="phone_number" required="required" autocomplete="off">
								    </div>
								  </div>
								  <div class="col-md-12">
								  	<div class="mb-3">
								    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" required="required">
								</div>
								  </div>
								  
								</div>
							  
							  <div class="row mt-3">
							  	<div class="col-12">
								    <button class="btn btn-theme" type="submit">Login</button>
								  </div>
							  </div>
							  <div class="row mt-3">
							  	<div class="col-md-12">
							  		<p>Not Registered Yet? <a href="{{url('register')}}"> Sign Up</a></p>
							  		<!-- <p><a href="{{url('forgot-password')}}"> Forgot Password</a></p> -->
							  	</div>
							  </div>
							</form>
		    			</div>
	    			</div>
	    		</div>
	    	</div>
		</div>
	</section>
	@endsection

	@section('footer')
	@parent
	@endsection