@extends('admin.include.main')
@section('tittle')
	<title>Cập nhật địa điểm</title>
@endsection
@section('content')
	<div class="main">
	<h2 style="margin-left:200px">Thêm Địa Điểm Mới</h2> 
		<div class="main">
			<form action="" method="post" enctype="multipart/form-data" action="{{asset('/admin/'.$location->id.'/update')}}" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table class="tblDangky">
					<tr>
						<td><label for="name">Tên địa điểm:</label></td>
						<td><input type="text" class="form-control" name="name" id="name" value ="{{$location->name}}" ></td>
					</tr>
					<tr>
						<td><label for="address">Địa chỉ:</label></td>
						<td><input type="text" class="form-control" name="address" id="address" value ="{{$location->address}}"></td>
					</tr>
					<tr>
						<td><label for="contact">Điện thoại:</label></td>
						<td><input type="text" class="form-control" name="contact" id="contact" value ="{{$location->contact}}">
						</td>
					</tr>
					<tr>
						<td><label for="describe">Thông tin chi tiết:</label></td>
						<td><textarea name="describe" class="form-control" id="describe" rows="6">{{htmlspecialchars($location->describe)}}</textarea></td>
					</tr>
					<tr>
						<td><label for="area">Diện tích:</label></td>
						<td><div class="input-group">
                      <input type="number" name="area" class="form-control" value="{{$location->area}}">
                      <span class="input-group-addon">m2</span>
                    </div></td>
					</tr>
					<tr>
						<td><label for="sale">Khuyến mại:</label></td>
						<td><textarea name="sale" id="sale" class="form-control" rows="4">{{htmlspecialchars($location->sale)}}</textarea></td>
					</tr>
					<tr>
						<td><label for="price">Bảng giá:</label></td>
						<td><textarea name="price" id="price" class="form-control" rows="4">{{htmlspecialchars($location->price)}}</textarea></td>
					</tr>
					<tr>
						<td><label for="Theloai">Thể loại:</label></td>
						<td>
							<select name="category_id" id="category_id" style="width:200px" class="form-control">
								<option value="{{$location->category_id}}" selected="selected">{{$location->category_name}}</option>
								@foreach ($category as $cat)
									<option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="fileAnh">Ảnh:</label></td>
						<td><input type="file" class="form-control" name="fileAnh" id="fileAnh"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="Xác nhận" id="btnSubmit" name="btnSubmit" >
							<input type="reset" value="Nhập lại">
						</td>
					</tr>

				</table>
				<a href="{{asset('admin')}}" class="btn btn-success">Trang chủ</a>
			</form>
		</div>
	</div>
@stop