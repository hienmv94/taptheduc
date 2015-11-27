@extends('admin.include.main')
@section('tittle')
Thông tin chi tiết
@stop
@section('content')

		<h2>{{$location->name}}</h2>
		<div class="row">
			<div class="col-md-12 ">
				<div class="col-md-6 col-md-offset-1">
					@include('admin.detail.slide')
					<br>
					@include('admin.detail.information')
				</div>
				<div class="col-md-4 col-md-offset-1">
				@include('admin.detail.map')
				</div>
			</div>
		</div>

@endsection