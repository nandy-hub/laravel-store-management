@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
						<h3>Meta Pages</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-right">
						<a href="{{url('amazeadmin/add_edit_meta_page/add')}}" class="btn btn-primary">Add Meta Page</a>
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
                <th>Meta Url</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        	@if($results)
        	@foreach($results as $key => $result)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$result->meta_page_url}}</td>
                <td>{{$result->created_at}}</td>
                <td>{{$result->updated_at}}</td>
                <td>
                	@if($result->status == 1)
                		<span class="active_deactive_icon bg-success"></span>
                	@else
                		<span class="active_deactive_icon bg-danger"></span>
                	@endif
                </td>
                <td>
                	<a href="{{url('amazeadmin/status_meta_page/'.$result->id)}}">@if($result->status == 1)<i class="fa fa-toggle-on" title="Active"></i>@else<i class="fa fa-toggle-off" title="DeActive"></i>@endif</a>
                	<a href="{{url('amazeadmin/add_edit_meta_page/'.$result->id)}}"><i class="fa fa-edit"></i></a>
                	<a href="{{url('amazeadmin/delete_meta_page/'.$result->id)}}" onclick="return confirm('Are you sure you want to delete this Blog?');"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
@endsection
