@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
						<h3>Product Category Lists</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-right">
						<a href="{{url('adminpanel/add_edit_product_cate/add')}}" class="btn btn-primary">Add Product Category</a>
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
                <th>Category Name</th>
                <th>Category Url</th>
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
                <td>{{$result->category_name}}</td>
                <td>{{$result->category_url}}</td>
                <td>{{$result->updated_at}}</td>
                <td>
                	@if($result->status == 1)
                		<span class="active_deactive_icon bg-success"></span>
                	@else
                		<span class="active_deactive_icon bg-danger"></span>
                	@endif
                </td>
                <td>
                	<a href="{{url('adminpanel/status_product_cate/'.$result->id)}}">@if($result->status == 1)<i class="fa fa-toggle-on" title="Active"></i>@else<i class="fa fa-toggle-off" title="DeActive"></i>@endif</a>
                	<a href="{{url('adminpanel/add_edit_product_cate/'.$result->id)}}"><i class="fa fa-edit"></i></a>
                	<a href="{{url('adminpanel/delete_product_cate/'.$result->id)}}" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@endsection
