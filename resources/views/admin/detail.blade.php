@extends('admin.include.main')
@section('tittle')
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
					<a class="btn btn-success" href="{{asset('admin/'.$location->id.'/update')}}">Cập nhật</a>
				</div>
				<div class="col-md-4 col-md-offset-1">
				@include('admin.detail.map')
				</div>

			</div>

		</div>

@endsection