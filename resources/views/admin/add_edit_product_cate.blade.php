@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
            @if($page_key == 'add')
						<h3>Add New Product Category</h3>
            @endif
            @if($page_key == 'edit')
            <h3>Update Product Category</h3>
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
                       <form id="add_edit_product_cate_form" method="post" action="{{url('adminpanel/add_edit_product_cate/add')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                           <!--  <div class="form-group row">
                                <label for="blog_author" class="col-sm-3 col-form-label">Blog Author</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="blog_author" aria-label="Default select example" required>
                                      <option value="">Select Author Name</option>
                                      
                                    </select>
                                </div>
                              </div> -->
                              <div class="form-group row">
                                <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-8">
                                  <input type="text" name="category_name" class="form-control" id="category_name" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="category_url" class="col-sm-3 col-form-label">Category Url</label>
                                <div class="col-sm-8">
                                  <input type="text" name="category_url" class="form-control" id="category_url" required="">
                                </div>
                              </div>
                              <!-- <div class="form-group row">
                                <label for="blog_image" class="col-sm-3 col-form-label">Blog Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="blog_image" class="form-control" id="blog_image" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="blog_short_desc" class="col-sm-3 col-form-label">Blog Short Description</label>
                                <div class="col-sm-8">
                                  <textarea id="blog_short_desc" class="form-control" name="blog_short_desc" required=""></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="blog_desc" class="col-sm-3 col-form-label">Blog Description</label>
                                <div class="col-sm-8">
                                  <textarea id="blog_desc" class="form-control" name="blog_desc" required=""></textarea>
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
                                  <textarea id="meta_description" class="form-control" name="meta_description"></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="og_image" class="col-sm-3 col-form-label">Meta OG and Twitter Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="og_image" class="form-control" id="og_image">
                                </div>
                              </div> -->
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
                       <form id="add_edit_product_cate_form" method="post" action="{{url('adminpanel/add_edit_product_cate/'.$get_results->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <!-- <div class="form-group row">
                                <label for="blog_author" class="col-sm-3 col-form-label">Blog Author</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="blog_author" aria-label="Default select example" required>
                                      <option value="">Select Author Name</option>
                                      
                                    </select>
                                </div>
                              </div> -->
                              <div class="form-group row">
                                <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-8">
                                  <input type="text" name="category_name" class="form-control" id="category_name" required="" value="{{$get_results->category_name}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="category_url" class="col-sm-3 col-form-label">Category Url</label>
                                <div class="col-sm-8">
                                  <input type="text" name="category_url" class="form-control" id="category_url" required="" value="{{$get_results->category_url}}">
                                </div>
                              </div>
                              <!-- <div class="form-group row">
                                <label for="blog_image" class="col-sm-3 col-form-label">Blog Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="blog_image" class="form-control" id="blog_image">
                                    <img src="{{$get_results->blog_image}}" width="200" height="200">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="blog_short_desc" class="col-sm-3 col-form-label">Blog Short Description</label>
                                <div class="col-sm-8">
                                  <textarea id="blog_short_desc" class="form-control" name="blog_short_desc" required="">{{$get_results->blog_short_desc}}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="blog_desc" class="col-sm-3 col-form-label">Blog Description</label>
                                <div class="col-sm-8">
                                  <textarea id="blog_desc" class="form-control" name="blog_desc" required="">{{$get_results->blog_desc}}</textarea>
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
                                  <textarea id="meta_description" class="form-control" name="meta_description">{{$get_results->meta_description}}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="og_image" class="col-sm-3 col-form-label">Meta OG and Twitter Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="og_image" class="form-control" id="og_image">
                                    <img src="{{$get_results->og_image}}" width="200">
                                </div>
                              </div> -->
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
<script type="text/javascript">

// CKEDITOR.plugins.addExternal( 'abbr', '/ckeditor/plugins/filebrowser/', 'plugin.js' );
// CKEDITOR.replace( 'blog_desc', {
//         // extraPlugins: 'abbr'
//         filebrowserBrowseUrl: '/browser/browse.php',
//     filebrowserUploadUrl: '/uploader/upload.php'
// } );

    // CKEDITOR.replace( 'blog_desc' );
// CKEDITOR.on( 'instanceReady', function( evt )
//   {
//     var editor = evt.editor;

//    editor.on('change', function (e) {
//     var contentSpace = editor.ui.space('contents');
//     var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
//     var ckeditorFrame = ckeditorFrameCollection[0];
//     var innerDoc = ckeditorFrame.contentDocument;
//     var innerDocTextAreaHeight = $(innerDoc.body).height();
//     console.log(innerDocTextAreaHeight);
//     });
//  });

CKEDITOR.replace('blog_desc', {
      height: 300,

      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });
  </script>
@endsection
