@extends('admin.layouts.admin_layout')
@section('content')
<div>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div>
            @if($page_key == 'add')
						<h3>Add New Product</h3>
            @endif
            @if($page_key == 'edit')
            <h3>Update Product</h3>
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
                       <form id="add_edit_product_form" method="post" action="{{url('adminpanel/add_edit_product/add')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="cate_id" class="col-sm-3 col-form-label">Product Category</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="cate_id" aria-label="Default select example" required>
                                      <option value="">Select Product Category</option>
                                      @foreach($product_cate_results as $product_cate_key => $product_cate_val)
                                      <option value="{{$product_cate_val->id}}">{{$product_cate_val->category_name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-8">
                                  <input type="text" name="name" class="form-control" id="name" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">Product Price</label>
                                <div class="col-sm-8">
                                  <input type="text" name="price" class="form-control" id="price" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="quantity" class="col-sm-3 col-form-label">Product Quantity</label>
                                <div class="col-sm-8">
                                  <input type="text" name="quantity" class="form-control" id="quantity" required="">
                                </div>
                              </div>
                              <!-- <div class="form-group row">
                                <label for="category_url" class="col-sm-3 col-form-label">Category Url</label>
                                <div class="col-sm-8">
                                  <input type="text" name="category_url" class="form-control" id="category_url" required="">
                                </div>
                              </div> -->
                              <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Product Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" class="form-control" id="image" required="">
                                </div>
                              </div>
                              <!-- <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Product Short Description</label>
                                <div class="col-sm-8">
                                  <textarea id="description" class="form-control" name="description"></textarea>
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
                                <label class="col-sm-3 col-form-label">Add to Top Product</label>
                                <div class="form-check col-sm-8">
                                  <input class="form-check-input" type="checkbox" name="trending_product_check" id="trending_product_check">
                                  <label class="form-check-label" for="trending_product_check">
                                    Please check to add on Top products list
                                  </label>
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
                       <form id="add_edit_product_form" method="post" action="{{url('adminpanel/add_edit_product/'.$get_results->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="cate_id" class="col-sm-3 col-form-label">Product Category</label>
                                <div class="col-sm-8">
                                  <select class="form-select" name="cate_id" aria-label="Default select example" required>
                                      <option value="">Select Product Category</option>
                                      @foreach($product_cate_results as $product_cate_key => $product_cate_val)
                                      <option value="{{$product_cate_val->id}}" @if($product_cate_val->id == $get_results->cate_id) selected @endif >{{$product_cate_val->category_name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-8">
                                  <input type="text" name="name" class="form-control" id="name" value="{{$get_results->name}}" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">Product Price</label>
                                <div class="col-sm-8">
                                  <input type="text" name="price" class="form-control" id="price" value="{{$get_results->price}}" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="quantity" class="col-sm-3 col-form-label">Product Quantity</label>
                                <div class="col-sm-8">
                                  <input type="text" name="quantity" class="form-control" id="quantity" value="{{$get_results->quantity}}" required="">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Product Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" class="form-control" id="image">
                                    <img src="{{url('/uploads/images/'.$get_results->image)}}" width="200" height="200" class="img-fluid">
                                </div>
                              </div>
                              <!-- <div class="form-group row">
                                <label for="description" class="col-sm-3 col-form-label">Product Short Description</label>
                                <div class="col-sm-8">
                                  <textarea id="description" class="form-control" name="description">{{$get_results->description}}</textarea>
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
                                <label class="col-sm-3 col-form-label">Add to Top Product</label>
                                <div class="form-check col-sm-8">
                                  <input class="form-check-input" type="checkbox" name="trending_product_check" id="trending_product_check" @if($get_results->trending_product_check == 1) checked @endif>
                                  <label class="form-check-label" for="trending_product_check">
                                    Please check to add on Top products list
                                  </label>
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
