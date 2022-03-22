@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
                        @if($page_key == 'add')
						<h3>Add New Meta Page</h3>
                        @endif
                        @if($page_key == 'edit')
                        <h3>Update Meta Page</h3>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<hr>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($page_key == 'add')
                    <div>
                        <form method="post" action="{{url('amazeadmin/add_edit_meta_page/add')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-sm-3">Page Url</label>
                                <div class="col-sm-8">
                                    <input type="text" name="meta_page_url" class="form-control" placeholder="Enter Page Url Here" required value="{{@$get_results->meta_page_url}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="status">
                                      <option value="1">Active</option>
                                      <option value="0">DeActive</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-md-3 col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                        </form>
                    </div>
                    @endif
                    @if($page_key == 'edit')
                    <div>
                       <form method="post" action="{{url('amazeadmin/add_edit_meta_page/'.$get_results->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Page Url</label>
                                <div class="col-sm-8">
                                    <input type="text" name="meta_page_url" class="form-control" placeholder="Enter Page Url Here" required value="{{@$get_results->meta_page_url}}">
                                </div>
                              </div>


                              <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="status" aria-label="Default select example">
                                      <option value="1" @if($get_results->status == 1) selected @endif>Active</option>
                                      <option value="0" @if($get_results->status == 0) selected @endif>DeActive</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-md-3 col-sm-10">
                                  <button type="submit" class="btn btn-success">Update</button>
                                </div>
                              </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@section('script')
@endsection
