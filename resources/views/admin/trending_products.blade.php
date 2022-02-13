@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
						<h3>Trending Products</h3>
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
                <th>Product Name</th>
                <th>Product Url</th>
                <th>Product Image</th>
                <th>Updated_at</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            
        </tbody>
    </table>
</div>
@endsection

