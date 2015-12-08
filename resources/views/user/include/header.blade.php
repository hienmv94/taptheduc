<form method="POST" action="{{asset('/timkiem')}}">
		<div id = "navigator">
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<div class = "logo">
				<a href="{{asset('/')}}" class="home">TẬPTHỂTHAO</a>
			</div>

			<div class = "inputSearch">
				<div class="input-group">
					<input type="text" class="form-control" name="search" placeholder="Tìm kiếm" required="">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Search</button>
					</span>
				</div>
			</div>

			<div class = "login">
				@if(session('user_name'))
				@if(DB::table('users')->where('email',session('user_email'))->where('admin',1)->first())
				<a href="{{asset('/admin')}}"> Quản lý</a>
				@else
				<a href="{{asset('/quanlydiadiem')}}"> Địa Điểm Của Tôi</a>
				@endif
				<b>{{session('user_name')}}</b>
				<span>&nbsp|&nbsp&nbsp</span><a href="{{asset('logout')}}" class = "log">Đăng Xuất</a>
				@else
				<span>&nbsp|&nbsp&nbsp</span><a href="{{asset('facebook/login')}}" class = "log">Đăng nhập bằng FB</a><span> &nbsp&nbsp&nbsp</span>
				<span>&nbsp|&nbsp&nbsp</span><a href="{{asset('google/login')}}" class = "log">Đăng nhập bằng GG</a><span> &nbsp&nbsp&nbsp</span>
				@endif
			</div>
		</div>

		<div id = "optionSearch">
			<div class="sortSearch">
				<span class="titleSearch">Thể loại:</span>
				<select id="optionSort" name="optionSort" class="form-controll">
					<?php
					$category=DB::table('category')->get();
					?>
					<option value="0" selected="selected">Tất cả</option>
					@foreach ($category as $cat)
					<option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
					@endforeach
				</select>
			</div>

			<div class="sizeSearch">
				<span class="titleSearch">Quy mô:</span>
				<select id="optionSize" name="optionSize">
					<option value="0">Tất cả</option>
					<option value="1">Nhỏ</option>
					<option value="2">Vừa</option>
					<option value="3">Lớn</option>
				</select>
			</div>

			<div class="shareNetwork">

			</div>
		</div>
	</form>