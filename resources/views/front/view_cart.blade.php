@extends('front.layout.app')
	@section('title', 'home')

	@section('content')

	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div>
						<h3 class="mb-3">My Cart Info</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
						<div class="table-responsive">
						<table class="table table-bordered text-center">
						  <thead>
						    <tr>
						      <th scope="col">S.No</th>
						      <th scope="col">Image</th>
						      <th scope="col">Product</th>
						      <th scope="col">Price</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Total</th>
						      <!-- <th scope="col">Action</th> -->
						    </tr>
						  </thead>
						  <tbody>
							@if($cart)
							@php
							$sum_total_val = 0;
							$i = 1;
							@endphp
						  	@foreach($cart as $cart_key => $cart_val)
						  	<!-- <?php echo "<pre>"; print_r($cart_val); ?> -->
						  	
						    <tr>
						      <th scope="row">{{$i}}</th>
						      <td><img src="{{url('uploads/images/'.$cart_val['image'])}}" class="img-fluid" style="width: 100px;height: 100px;"></td>
						      <td>{{$cart_val['name']}}</td>
						      <td>Rs. {{$cart_val['price']}}</td>
						      <!-- <td>{{$cart_val['quantity']}}</td> -->
						      <td>
						      	<input type="hidden" name="product_id_hidden" value="{{$cart_val['product_id']}}">
						      	<div class="input-group mb-3 align-items-center justify-content-center">
											 <button class="btn btn-theme" type="button" onclick="update_to_cart_func(<?php echo $cart_val['product_id']; ?>, $('#quantity').val(), 'dec')">
											  -</button>
											  <span id="quantity" class="ps-3 pe-3">{{ $cart_val['quantity']}}</span>
											  <button class="btn btn-theme" type="button" onclick="update_to_cart_func(<?php echo $cart_val['product_id']; ?>, $('#quantity').val(), 'inc')">
											  +</button>
											</div>
						      </td>
						      <td>Rs. {{number_format($cart_val['quantity']*$cart_val['price'], 2)}}</td>
						      <!-- <td><a href="">Delete</a></td> -->
						    </tr>
						    @php
						    $sum_total_val += $cart_val['quantity']*$cart_val['price'];
						    $i++;
						    @endphp
						    @endforeach
						    <tr>
						      <!-- <th scope="row">3</th> -->
						      
						      <td colspan="5" class="text-end">Total</td>
						      <td>Rs. {{number_format($sum_total_val, 2)}}</td>
						    </tr>
						    @else
						    <tr>
						    	<td>No Items in Your Cart</td>
						    </tr>
						    @endif
						    
						    
						  </tbody>
						</table>
						</div>
						
						<!-- <div class="text-end">
							<a href="{{url('checkout')}}" class="btn btn-warning">Place Order</a>
						</div> -->
						<div class="clearfix">
						  <a href="{{url('/')}}" class="btn btn-warning float-start">Continue Shopping</a>
						  <a href="{{url('checkout')}}" class="btn btn-warning float-end">Place Order</a>
						</div>
				</div>
			</div>
		</div>
	</section>

    <section class="products_list_sec mt-3">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="products_list_head">
								<h3 class="title">Recent Products</h3>
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
							  </div>
							</div>
					    </div>
					    @endforeach
					    @endif
							
					</div>
				</div>
			</section>
	
	@endsection

	@section('footer')
	@parent
	@endsection