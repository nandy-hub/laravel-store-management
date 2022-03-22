@extends('front.layout.app')
	@section('title', 'home')

	@section('content')
	<section class="home_bnr_sec">
		<div id="banner_carousel" class="carousel slide" data-bs-interval="3000" data-bs-ride="carousel">

			<div class="carousel-indicators">
				<button type="button" data-bs-target="#banner_carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#banner_carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
			</div>

			<div class="carousel-inner">
				<div class="carousel-item">
					<img class="d-block w-100" src="{{url('front/images/grocery-banner1.png')}}" alt="">
				</div>
				<div class="carousel-item active">
					<img class="d-block w-100" src="{{url('front/images/grocery-banner.jpg')}}" alt="">
				</div>
			</div>

			<!-- <button class="carousel-control-prev" type="button" data-bs-target="#banner_carousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#banner_carousel" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button> -->

		</div>
	</section>
	<!-- <section class="home_bnr_sec"></section> -->
	<section class="shop_by_category_sec d-block d-md-none">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="shop_by_category_div">
						<p>Shop by Category</p>
						<button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#shop_by_category_collapse" aria-controls="shop_by_category_collapse" aria-expanded="false" aria-label="Toggle navigation">
					      <i class="fa fa-chevron-down"></i>
					    </button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main_body_sec">
		@include('front.left_side_sec')
		<div class="right_side_div">
			<section class="products_list_sec">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="products_list_head">
								<h3 class="title">All Products</h3>
							</div>
						</div>
					</div>
					<div class="row">
						@if($products->count() > 0)
						@foreach($products as $key => $value)
						<?php 
							$session_cart_res = session()->get('cart'); 
							
						?>
					    <div class="col-md-3">
					    	<div class="card products_list_card">
							  <img class="img-fluid" src="{{url('/uploads/images/'.$value->image)}}">
							  <div class="card-body products_list_card_body">
							    <h5 class="card-title">{{$value->name}}</h5>
							    <p>MRP. <b>{{$value->price}}</b></p>
							    <input type="hidden" name="product_id_hidden" value="{{$value->id}}">
							  

							  	@if($value->quantity > 0)  
								    @if(isset($session_cart_res[$value->id]) && $session_cart_res[$value->id]['quantity'] >= '1')
								    	<div class="input-group cart_btn_div">
										 <button class="btn cart_btn" type="button" onclick="update_to_cart_func(<?php echo $value->id; ?>, $('#quantity').val(), 'dec')">
										  -</button>
										  <input type="text" class="form-control" placeholder="" value="{{$session_cart_res[$value->id]['quantity']}}" id="quantity" readonly="">
										  <button class="btn cart_btn" type="button" onclick="update_to_cart_func(<?php echo $value->id; ?>, $('#quantity').val(), 'inc')">
										  +</button>
										</div>
								    @else
								    	<button class="btn cart_btn" role="button" onclick="add_to_cart_func( this )">Add to Cart</button>
								    @endif
								@else
								<button class="btn cart_btn" disabled="disabled" role="button">Out of Stock</button>
								@endif    
							  </div>
							</div>
					    </div>
					    @endforeach
					    @else
					    <div class="col-md-12">
					    	<div>
					    		<p>No Items Found in this Category</p>
					    	</div>
					    </div>
					    @endif
							
					</div>
				</div>
			</section>
			<hr>
			<section class="products_list_sec">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="products_list_head">
								<h3 class="title">Trending Products</h3>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="owl-carousel owl-theme products_listing_owl">
								@if($top_products)
								@foreach($top_products as $key => $value)
								<?php 
									$session_cart_res = session()->get('cart'); 
									
								?>
							    <div class="item">
							    	<div class="card products_list_card" id="product_cart_{{$value->id}}">
									  <img class="img-fluid" src="{{url('/uploads/images/'.$value->image)}}">
									  <div class="card-body products_list_card_body">
									    <h5 class="card-title">{{$value->name}}</h5>
									    <p>MRP. <b>{{$value->price}}</b></p>
									    <input type="hidden" name="product_id_hidden" value="{{$value->id}}">
									    

									    @if($value->quantity > 0) 
										    @if(isset($session_cart_res[$value->id]) && $session_cart_res[$value->id]['quantity'] >= '1')
										    	<div class="input-group cart_btn_div">
												 <button class="btn cart_btn" type="button" onclick="update_to_cart_func(<?php echo $value->id; ?>, $('#quantity').val(), 'dec')">
												  -</button>
												  <input type="text" class="form-control" placeholder="" value="{{$session_cart_res[$value->id]['quantity']}}" id="quantity" readonly="">
												  <button class="btn cart_btn" type="button" onclick="update_to_cart_func(<?php echo $value->id; ?>, $('#quantity').val(), 'inc')">
												  +</button>
												</div>
										    @else
										    	<button class="btn cart_btn" role="button" onclick="add_to_cart_func( this )">Add to Cart</button>
										    @endif
										@else
											<button class="btn cart_btn" disabled="disabled" role="button">Out of Stock</button>
										@endif   
									  </div>
									</div>
							    </div>
							    @endforeach
							    @endif
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
	@endsection