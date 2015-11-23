@extends('admin.include.main')
@section('title')
<title>Tập thể dục | Quản lý địa điểm</title>
@endsection
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
	<h2>Danh sách địa điểm</h2>
	<form method="get" action="{{asset('/admin/action')}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<table id="table_index" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th sytle="align:left"><input type="checkbox" class="check" id="checkAll"></th>
					<th>Tên</th>
					<th>Địa chỉ</th>
					<th>Liên hệ</th>
					<th>Diện tích</th>
					<th>Mục</th>
					<th>Trạng thái</th>
					<th>Xem</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($location as $loc)
				<tr>
					<td ><input style="margin-left:7px" type="checkbox" class="check" value="{{$loc->id}}" name="checkbox[]"></td>
					<td>{{$loc->name}}</td>
					<td>{{$loc->address}}</td>
					<td>{{$loc->contact}}</td>
					<td>{{$loc->area}}</td>
					<td>{{$loc->category_name}}</td>
					<td>@if($loc->actived) <span style="font-family: Arial Unicode MS, Lucida	Grande; color:#3300CC"> &#10004;</span>
					 @else 
					 <span style="font-family: Arial Unicode MS, Lucida	Grande; color:#FF0000; font-size: 24px;"> &#33;</span>
					 @endif </td>
					<td><a href="">Chi tiết</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a href="{{asset('admin/add')}}" class="btn btn-primary">Thêm</a>
		<input type="submit" value="Xóa" name="delete" class="btn btn-danger">
		<input type="submit" value="Kích hoạt" name="active" class="btn btn-default">
		</form>
	</div>
</div> 

@stop