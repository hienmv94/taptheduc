<!DOCTYPE html>
<html>
@include('admin.include.head')
<body>
	@include('admin.include.header')
	<div class="page-content">
		@yield('content')
	</div>
	@include('admin.include.footer')
</body>
</html>