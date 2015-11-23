@extends('admin.include.main')
@section('tittle')
	Thêm địa điểm
@stop
@section('content')
	<div class="main">
	<h2 style="margin-left:200px">Thêm Địa Điểm Mới</h2> 
		<div class="main">
			<form action="" method="post" enctype="multipart/form-data" action="{{asset('/admin/add')}}" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table class="tblDangky">
					<tr>
						<td><label for="name">Tên địa điểm:</label></td>
						<td><input type="text" name="name" id="name" placeholder="Nhập tên địa điểm" ></td>
					</tr>
					<tr>
						<td><label for="address">Địa chỉ:</label></td>
						<td><input type="text" name="address" id="address" placeholder="Nhập địa chỉ"></td>
					</tr>
					<tr>
						<td><label for="contact">Điện thoại:</label></td>
						<td><input type="text" name="contact" id="contact" placeholder="Số điện thoại thứ nhất">
						</td>
					</tr>
					<tr>
						<td><label for="describe">Thông tin chi tiết:</label></td>
						<td><textarea name="describe" id="describe" rows="6"></textarea></td>
					</tr>
					<tr>
						<td><label for="area">Diện tích:</label></td>
						<td><input type="text" name="area" id="area"></td>
					</tr>
					<tr>
						<td><label for="sale">Khuyến mại:</label></td>
						<td><textarea name="sale" id="sale" rows="4"></textarea></td>
					</tr>
					<tr>
						<td><label for="price">Bảng giá:</label></td>
						<td><textarea name="price" id="price" rows="4"></textarea></td>
					</tr>
					<tr>
						<td><label for="Theloai">Thể loại:</label></td>
						<td>
							<select name="category_id" id="category_id" style="width:200px">
								@foreach ($category as $cat)
									<option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="fileAnh">Ảnh:</label></td>
						<td><input type="file" name="fileAnh" id="fileAnh"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<input type="submit" value="Xác nhận" id="btnSubmit" name="btnSubmit" >
							<input type="reset" value="Nhập lại">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
@stop