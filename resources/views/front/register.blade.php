@extends('front.layout.app')
	@section('title', 'register')

	@section('content')
	<section class="login_register_sec">
    <div class="container">
    	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
    	<div class="row justify-content-center">
    		<div class="col-md-6">
    			<div class="login_register_card text-center">
    			<div class="login_register_head mb-3">
    				<h2>Register Form</h2>
    			</div>
    			<div class="login_register_body">
    				<form method="post" id="register_form" action="{{url('register')}}">
    					{{csrf_field()}}
					  <div class="row">
						  <div class="col-md-12">
						  	<div class="mb-3">
							    <input type="text" class="form-control" placeholder="Your Name *" aria-label="Your Name" name="name" required="required" autocomplete="off">
							  </div>
						  </div>
						  <div class="col-md-12">
						  	<div class="mb-3">
							    <input type="tel" class="form-control" placeholder="Phone Number *" aria-label="Phone Number" name="phone_number" required="required" autocomplete="off">
							  </div>
						  </div>
						  <div class="col-md-12">
						  	<div class="mb-3">
							    <input type="password" class="form-control" placeholder="New Password *" aria-label="New Password" name="password" id="password" required="required">
							  </div>
						  </div>
						  <div class="col-md-12">
						  	<div class="mb-3">
						    <input type="password" class="form-control" placeholder="New Confirm Password *" aria-label="New Confirm Password" name="confirm_password" required="required">
						  </div>
						  </div>
						</div>
					  
					  <div class="row mt-3">
					  <div class="col-md-12">
					    <button class="btn btn-theme" type="submit">Submit</button>
					  </div>
					  </div>
					  <div class="row mt-3">
					  	<div class="col-md-12">
					  		<p>Already Registered ? <a href="{{url('login')}}"> Log In</a></p>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$("#register_form").validate({
		        rules: {
		        	name: {
		        		required: true
		        	},
		            phone_number: {
		                required: true,
		                digits: true,
		                minlength: 10,
		                maxlength: 15
		            },
		            password: {
		                required: true,
		                minlength : 5
		            },
		            confirm_password: {
		            	required: true,
	                    equalTo : "#password"
		            }
		        },
		        messages: {
		            name: {
		        		required: 'Name is required'
		        	},
		            phone_number: {
		                required: 'Phone Number is required'
		            },
		            password: {
		                required: 'Password is required'
		            },
		            confirm_password: {
		            	required: 'Confirm Password is required'
		            }
		        }
		    })
		});
	</script>
	@endsection