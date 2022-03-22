<!DOCTYPE html>
<html>
@include('admin.layouts.header')
<body>
	<div class="d-flex" id="wrapper">
		@include('admin.layouts.sidebar')
		<div id="page-content-wrapper">
			@include('admin.layouts.header_bar')
			<div class="p-3 position-relative">
				@yield('content')
			</div>
		</div>
	</div>
	@include('admin.layouts.footer_script')
	@yield('script')

</body>
</html>