<div id="coverMap">

	<div id="onlyMap">
	</div>
	<p class="name">{{$location->name}}</p>

	<p class="address"><strong>Địa chỉ: </strong><span>{{$location->address}}</span></p>

	<p class="phone"><strong>Điện thoại: </strong><span>{{$location->contact}}</span></p>

	<div class="rw-ui-container"></div>

	<div id="fb-root"></div>

	<div class="fb-comments" data-href="{{asset('admin/'.$location->id)}}" data-width="532"data-numposts="5"></div>

</div>