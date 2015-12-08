@extends('user.include.main')
@section('title')
Cập nhật địa điểm
@endsection
@section('content')
<div class="main">
	<h2 style="margin-left:200px">Cập nhật ảnh</h2> 
	<div class="main">
		<form method="post" enctype="multipart/form-data" action="{{asset('/diadiem/'.$id.'/anh')}}" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<h2>{{$location->name}}</h2>
			@if($images->first())
			<input type="checkbox" class="check" id="checkAll"> Chọn tất cả<br>
			<div class="row">
				@foreach ($images as $image)
				<div class="col-sm-6">
					<input type="checkbox" class="check" value="{{$image->image_id}}" name="checkbox[]">
					<img src="{{asset($image->link)}}" style="width:250px">
				</div>
				@endforeach
			</div>
			@else 
			Không có ảnh đề hiển thị<br>
			@endif
			<label for="fileAnh">Thêm ảnh:</label>
			<input type="file" name="fileAnh[]" id="fileAnh" multiple class="form-control">
			<input type="submit" value="Xác nhận" id="btnSubmit" name="btnSubmit" class="btn btn-primary">
			<input type="submit" value="Xóa" name="delete" class="btn btn-danger">
			<a href="{{asset('diadiem/'.$location->id)}}" class="btn btn-success">Chi tiết</a>
		</form>
	</div>
</div>
@stop