@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
						<h3>Contact Enquiry Details</h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<hr>
<table id="common_dataTables" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Message</th>
                <th>Updated_at</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
        	@if($result)
        	@foreach($result as $key => $result)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->phone_number}}</td>
                <td>{{$result->message}}</td>
                <td>{{$result->updated_at}}</td>
                
                <!-- <td>
                	<a href="{{url('adminpanel/status_product_cate/'.$result->id)}}">@if($result->status == 1)<i class="fa fa-toggle-on" title="Active"></i>@else<i class="fa fa-toggle-off" title="DeActive"></i>@endif</a>
                	<a href="{{url('adminpanel/add_edit_product_cate/'.$result->id)}}"><i class="fa fa-edit"></i></a>
                	<a href="{{url('adminpanel/delete_product_cate/'.$result->id)}}" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                </td> -->
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@endsection
