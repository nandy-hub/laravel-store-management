@extends('front.layout.app')
	@section('title', 'home')

	@section('content')

	
	<section class="mt-3 mb-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div>
						<h3 class="mb-3">My Order History</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
						<div class="table-responsive">
						<table class="table table-bordered text-center" id="my_orders_table">
							<!-- <table id="example" class="table table-striped" style="width:100%"> -->
						  <thead>
						    <tr>
						      <th scope="col">S.No</th>
						      <th scope="col">Product Name</th>
						      <!-- <th scope="col">Images</th> -->
						      <th scope="col">Quantity</th>
						      <th scope="col">Price</th>
						      <th scope="col">Total Price</th>
						      <th scope="col">Order Date</th>
						      <th scope="col">Status</th>
						      <!-- <th scope="col">Product</th>
						      <th scope="col">Price</th>
						      <th scope="col">Quantity</th>
						      <th scope="col">Total</th> -->
						      <!-- <th scope="col">Action</th> -->
						    </tr>
						  </thead>
						  <tbody>
							@if($order_details_res)
								@foreach($order_details_res as $key => $value)
								<tr>
									<td>{{$key+1}}</td>
									<td>
										{{$value->product_name}}
									</td>
									<td>
										{{$value->quantity}}
									</td>
									<td>
										Rs. {{$value->single_price}}
									</td>
									<td>
										Rs. {{$value->total_price}}
									</td>
									<td>
										{{$value->created_at}}
									</td>
									<td>
										@if($value->status == 'placed')
										<span class="btn btn-warning">{{$value->status}}</span>
										@elseif($value->status == 'cancelled')
										<span class="btn btn-danger">{{$value->status}}</span>
										@elseif($value->status == 'delivered')
										<span class="btn btn-success">{{$value->status}}</span>
										@else
										<span>-</span>
										@endif
									</td>
									<!-- <td>
										
										@foreach(get_order_history_by_pid($value['product_id']) as $key1 => $value1)
											{{$value1[0]['name']}}<br>
										@endforeach
									</td> -->
									<!-- <td>
										
										@foreach(get_order_history_by_pid($value['product_id']) as $key1 => $value1)
											<img src="{{url('uploads/images/'.$value1[0]['image'])}}" width="100" height="100"><br>
										@endforeach
									</td> -->
									
									
								</tr>
								@endforeach
							@endif
						  </tbody>
						</table>
					</div>
						
						<!-- <div class="text-end">
							<a href="{{url('checkout')}}" class="btn btn-warning">Place Order</a>
						</div> -->
						<div class="clearfix">
						  <a href="{{url('/')}}" class="btn btn-warning float-start">Continue Shopping</a>
						  <!-- <a href="{{url('checkout')}}" class="btn btn-warning float-end">Place Order</a> -->
						</div>
				</div>
			</div>
		</div>
	</section>
	@endsection

	@section('footer')
	@parent
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#my_orders_table').DataTable();
		} );
	</script>
	@endsection