@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
                        @if($page_key == 'add')
						<h3>Add New Meta Content</h3>
                        @endif
                        @if($page_key == 'edit')
                        <h3>Update Meta Content</h3>
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
                       <form method="post" action="{{url('amazeadmin/add_edit_meta_content/add')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="meta_page_id" class="col-sm-3 col-form-label">Meta Page</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="meta_page_id" aria-label="Default select example" required>
                                      <option value="">Choose Meta Page</option>
                                      @foreach ($meta_page_results as $meta_page)
                                      <option value="{{$meta_page->id}}">{{$meta_page->meta_page_url}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                                <div class="col-sm-8">
                                  <input type="text" name="meta_title" class="form-control" id="meta_title" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="meta_keyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                                <div class="col-sm-8">
                                  <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="meta_description" class="col-sm-3 col-form-label">Meta Description</label>
                                <div class="col-sm-8">
                                  <textarea id="meta_description" class="form-control" name="meta_description" required=""></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="og_image" class="col-sm-3 col-form-label">Meta OG and Twitter Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="og_image" class="form-control" id="og_image" required="">
                                </div>
                              </div>
                              {{-- <div class="form-group row">
                                <label for="twitter_image" class="col-sm-3 col-form-label">Meta Twitter Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="twitter_image" class="form-control" id="twitter_image" required="">
                                </div>
                              </div> --}}

                              <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="status" aria-label="Default select example">
                                      <option value="1">Active</option>
                                      <option value="0">DeActive</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="offset-md-3 col-sm-10">
                                  <button type="submit" class="btn btn-success">Add</button>
                                </div>
                              </div>
                        </form>
                    </div>
                    @endif
                    @if($page_key == 'edit')
                    <div>
                        <form method="post" action="{{url('amazeadmin/add_edit_meta_content/'.$get_results->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="meta_page_id" class="col-sm-3 col-form-label">Meta Page</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="meta_page_id" aria-label="Default select example" required>
                                      <option value="">Choose Meta Page</option>
                                      @foreach ($meta_page_results as $meta_page)
                                      <option value="{{$meta_page->id}}" @if($meta_page->id == $get_results->meta_page_id) selected @endif>{{$meta_page->meta_page_url}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="meta_title" class="col-sm-3 col-form-label">Meta Title</label>
                                <div class="col-sm-8">
                                  <input type="text" name="meta_title" class="form-control" id="meta_title" required="" value="{{$get_results->meta_title}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="meta_keyword" class="col-sm-3 col-form-label">Meta Keyword</label>
                                <div class="col-sm-8">
                                  <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" required="" value="{{$get_results->meta_keyword}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="meta_description" class="col-sm-3 col-form-label">Meta Description</label>
                                <div class="col-sm-8">
                                  <textarea id="meta_description" class="form-control" name="meta_description" required="">{{$get_results->meta_description}}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="og_image" class="col-sm-3 col-form-label">Meta OG Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="og_image" class="form-control" id="og_image">
                                    <img src="{{$get_results->og_image}}" width="200">
                                </div>
                              </div>
                              {{-- <div class="form-group row">
                                <label for="twitter_image" class="col-sm-3 col-form-label">Meta Twitter Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="twitter_image" class="form-control" id="twitter_image">
                                    <img src="{{$get_results->twitter_image}}" width="200">
                                </div>
                              </div> --}}

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
