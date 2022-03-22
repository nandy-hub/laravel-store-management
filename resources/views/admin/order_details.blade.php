@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
						<h3>Order Lists</h3>
					</div>
				</div>
				<!-- <div class="col-md-6">
					<div class="text-right">
						<a href="{{url('adminpanel/add_edit_product/add')}}" class="btn btn-primary">Add Product</a>
					</div>
				</div> -->
			</div>
		</div>
	</section>
	<hr>
<table id="common_dataTables" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>User Name</th>
                <th>Phone Number</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Updated_at</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	@if($result)
        	@foreach($result as $key => $result)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->phone_number}}</td>
                <td>{{$result->product_name}}</td>
                <td><img src="{{url('uploads/images/'.$result->image)}}" class="img-fluid" height="150" width="150"></td>
                <td>Rs.{{$result->single_price}}</td>
                <td>{{$result->quantity}}</td>
                <td>Rs.{{$result->total_price}}</td>
                <td>{{$result->updated_at}}</td>
                <td>
                	@if($result->status == 'placed')
                		<span class="btn btn-warning">Placed</span>
                    @elseif($result->status == 'delivered')
                        <span class="btn btn-success">Delivered</span>    
                	@else
                		<span class="btn btn-danger">Cancelled</span>
                	@endif
                </td>
                <td>
                	<!-- <a href="{{url('adminpanel/status_product/'.$result->id)}}">@if($result->status == 1)<i class="fa fa-toggle-on" title="Active"></i>@else<i class="fa fa-toggle-off" title="DeActive"></i>@endif</a> -->

                    <select class="form-select" id="order_status" onchange="order_status_update(this, <?php echo $result->id; ?>)">
                        <option value="placed" @if($result->status == "placed") selected @endif>Placed</option>
                        <option value="delivered" @if($result->status == "delivered") selected @endif>Delivered</option>
                        <option value="cancelled" @if($result->status == "cancelled") selected @endif>Cancelled</option>
                    </select>
                	<!-- <a href="{{url('adminpanel/add_edit_product/'.$result->id)}}"><i class="fa fa-edit"></i></a> -->
                	<!-- <a href="{{url('adminpanel/delete_product/'.$result->id)}}" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a> -->
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    function order_status_update(arg1, order_id){
        var order_status_val = $(arg1).val();
        $.ajax({
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                order_status_val : order_status_val,
                order_id : order_id
            },
            url:  "{{ url('/adminpanel/order_status_update') }}",
            success:function(data){
                if (data) {
                    window.location.reload();
                }
            }
        });
    }
</script>
@endsection