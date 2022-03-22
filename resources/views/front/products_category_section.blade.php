@extends('front.layout.app')
	@section('title', 'home')

	@section('content')

	<section class="main_body_sec">
		@include('front.left_side_sec')
		<div class="right_side_div">
			
			<section class="products_list_sec">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="products_list_head">
								<h3 class="title">{{get_product_cate_by_id(Request::segment(3), 'category_name')}}</h3>
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
										  <input type="text" class="form-control" placeholder="" value="{{$session_cart_res[$value->id]['quantity']}}" id="quantity">
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
		</div>
	</section>

    
	
	@endsection

	@section('footer')
	@parent
	@endsection