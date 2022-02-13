<div class="left_side_div">
	@if(get_all_products_cate())
	<div class="navbar-collapse products_category_div collapse" id="shop_by_category_collapse">
		<h2 class="title">Category</h2>
		<ul class="products_category_ul">
			<li><a href="{{url('/')}}"> Home</a></li>
			<!-- <li><a href="{{url('/speech_orders')}}"> Talk and Book Orders</a></li> -->
			@foreach(get_all_products_cate() as $key => $value)
			<li><a href="{{url('/products/'.$value->category_url.'/'.$value->id)}}"> {{$value->category_name}}</a></li>
			@endforeach
			<!-- <li><a href="{{url('/products/category/2')}}"> Biscuits</a></li>
			<li><a href="{{url('/products/category/3')}}"> Vegetables</a></li> -->
		</ul>
		<div class="products_category_close_div d-block d-md-none">
			<!-- <a href="">Close <i class="fa fa-window-close ms-3"></i></a> -->
			<button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#shop_by_category_collapse" aria-controls="shop_by_category_collapse" aria-expanded="false" aria-label="Toggle navigation">
					     Close <i class="fa fa-window-close ms-3"></i>
					    </button>
		</div>
	</div>
	@endif
</div>
