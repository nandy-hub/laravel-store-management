@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section class="dashboard__sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div>
						<h2>Dashboard</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="order__status__box bg-success text-white">
						<h4>Stock Orders</h4>
						@if($data['stock_order_count'])
						<a href="{{url('adminpanel/view_products')}}" class="text-white">
							<span>{{$data['stock_order_count']}}</span>
						</a>
						@else
						<span>0</span>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="order__status__box bg-danger text-white">
						<h4>Out of Stock Orders</h4>
						@if($data['unstock_order_count'])
						<a href="{{url('adminpanel/view_products')}}" class="text-white">
							<span>{{$data['unstock_order_count']}}</span>
						</a>
						@else
						<span>0</span>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="order__status__box bg-warning text-dark">
						<h4>Pending Orders</h4>
						@if($data['placed_order_count'])
						<a href="{{url('adminpanel/order_details')}}" class="text-dark">
							<span>{{$data['placed_order_count']}}</span>
						</a>
						@else
						<span>0</span>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="order__status__box bg-success text-white">
						<h4>Delivered Orders</h4>
						@if($data['delivered_order_count'])
						<a href="{{url('adminpanel/order_details')}}" class="text-white">
							<span>{{$data['delivered_order_count']}}</span>
						</a>
						@else
						<span>0</span>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="order__status__box bg-danger text-white">
						<h4>Cancelled Orders</h4>
						@if($data['cancelled_order_count'])
						<a href="{{url('adminpanel/order_details')}}" class="text-white">
							<span>{{$data['cancelled_order_count']}}</span>
						</a>
						@else
						<span>0</span>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="order__status__box bg-primary text-white">
						<h4>Users</h4>
						@if($data['users_count'])
						<a href="{{url('adminpanel/user_details')}}" class="text-white">
							<span>{{$data['users_count']}}</span>
						</a>
						@else
						<span>0</span>
						@endif
					</div>
				</div>
				<div class="col-md-4">
					<div class="order__status__box bg-dark text-white">
						<h4>Contact Enquiry</h4>
						@if($data['contact_enquiry_count'])
						<a href="{{url('adminpanel/contact_enquiry')}}" class="text-white">
							<span>{{$data['contact_enquiry_count']}}</span>
						</a>
						@else
						<span>0</span>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection

