@extends('user.include.main')
@section('title')
Tập thể dục | Quản lý địa điểm
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
					<th style="width:100px">Diện tích(m2)</th>
					<th>Mục</th>
					<th>Trạng thái</th>
					<th>Xem</th>
					<th>Sửa</th>
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
					<td><a href="{{asset('diadiem/'.$loc->id)}}">Chi tiết</a></td>
					<td style="width:50px"><a href="{{asset('diadiem/'.$loc->id.'/capnhat')}}">Cập nhật</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a href="{{asset('themdiadiem')}}" class="btn btn-primary">Thêm</a>
		<input type="submit" value="Xóa" name="delete" class="btn btn-danger">
		</form>
	</div>
</div> 

@stop