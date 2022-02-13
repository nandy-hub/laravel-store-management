@extends('front.layout.app')
	@section('title', 'home')

	@section('content')

	<section class="main_body_sec">
		@include('front.left_side_sec')
		<div class="right_side_div">
			<section>
				<div class="container">
			    	<div class="row">
			    		<div class="col-md-6">
			    			<div>
			    				<h2>Search What you Want</h2>
			    				<div class="form-group">
								    <input class="form-control" placeholder=" " value="" type="text" id="field-name" />  
								  </div>
								  
								  <div class="mt-3">
								    <button class="btn btn-dark" id="button-submit">Say  "Submit"</button>
								  </div>
			    			</div>
			    		</div>
			    	</div>
				</div>
			</section>
		</div>
	</section>

    
	
	@endsection

	@section('footer')
	@parent
	<script type="text/javascript" src="{{url('front/js/speech_recognition.js')}}"></script>
	@endsection