@extends('user.include.main')
@section('title')
Thông tin chi tiết
@stop
@section('content')

		<h2 style="text-align:center; text-transform:uppercase">{{$location->name}}</h2>
		<div class="row">
			<div class="col-md-12 ">
				<div class="col-md-6 col-md-offset-1">
					@include('admin.detail.slide')
					<br>
					@include('admin.detail.information')
					<a class="btn btn-success" href="{{asset('diadiem/'.$location->id.'/capnhat')}}">Cập nhật</a>
				</div>
				<div class="col-md-4 col-md-offset-1">
				@include('admin.detail.map')
				</div>

			</div>

		</div>

@endsection
