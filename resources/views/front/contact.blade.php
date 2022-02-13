@extends('front.layout.app')
	@section('title', 'contact')

	@section('content')
	<section class="contact_sec">
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
	    		<div class="col-md-8">
	    			<div class="contact_form_card text-center">
		    			<div class="contact_form_head mb-3">
		    				<h2>Contact Us</h2>
		    			</div>
		    			<div class="contact_form_body">

		    				<form method="post" id="contact_form" action="{{url('contact')}}">
		    					{{csrf_field()}}
							  <div class="row">
								  <div class="col-md-6">
								  	<div class="mb-3">
								    <input type="text" class="form-control" placeholder="Enter Your Name *" name="name" required="required" autocomplete="off">
								    </div>
								  </div>
								  <div class="col-md-6">
								  	<div class="mb-3">
								    <input type="tel" class="form-control" placeholder="Phone Number" aria-label="Phone Number" name="phone_number" required="required" autocomplete="off">
								    </div>
								  </div>
								  <div class="col-md-12">
								  	<div class="mb-3">
								  		<textarea class="form-control" name="message" placeholder="Write a Message"></textarea>
								</div>
								  </div>
								  
								</div>
							  
							  <div class="row mt-3">
							  	<div class="col-12">
								    <button class="btn btn-theme" type="submit">Submit</button>
								  </div>
							  </div>
							  
							</form>
		    			</div>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="row justify-content-center">
	    		<div class="col-md-10">
	    			<div class="contact_info_card text-center">
	    				<div class="row">
	    					<div class="col-md-4">
	    						<div class="contact_info_list">
	    							<p>
		    							<i class="fab fa-whatsapp"></i>
		    							<b>WhatsApp Us</b> - <a href="https://web.whatsapp.com/send?phone=919003424066" target="_blank"> 9003424066</a>
	    							</p>
	    						</div>
	    					</div>
	    					<div class="col-md-4">
	    						<div class="contact_info_list">
	    							<p>
		    							<i class="fa fa-phone"></i>
		    							<b>Call Us</b> - <a href="tel::(+91)9003424066"> 9003424066</a>
	    							</p>
	    						</div>
	    					</div>
	    					<div class="col-md-4">
	    						<div class="contact_info_list">
	    							<p>
		    							<i class="fa fa-envelope"></i>
		    							<b>Mail Us</b> - <a href="mailto:test@gmail.com" target="_blank"> Test@gmail.com</a>
	    							</p>
	    						</div>
	    					</div>
	    				</div>
	    				<div class="row">
	    					<div class="col-md-12">
	    						<div class="contact_info_list">
	    							
	    							<p>
	    								<i class="fa fa-address-card"></i>
	    								<b>Address</b> - 54/A, Chinnakadai Street, Muthaiahpillay Lane, Madurai - 625001.
	    							</p>
	    						</div>
	    					</div>
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
			$("#contact_form").validate({
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
		            message: {
		                required: true,
		                minlength : 5
		            }
		        },
		        messages: {
		            name: {
		        		required: 'Name is required'
		        	},
		            phone_number: {
		                required: 'Phone Number is required'
		            },
		            message: {
		                required: 'Message is required'
		            }
		        }
		    })
		});
	</script>
	@endsection