<div id="myCarousel" class="carousel slide" style="height:350px">
	<!-- Indicators -->
	@if($picture->first())
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<?php
		$i=0;
		?>
		@foreach ($picture as $pic)
		<?php
		$i++;
		?>
		<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
		@endforeach
	</ol>

	<!-- Wrapper for Slides -->
	<div class="carousel-inner">
		<div class="item active">
			<!-- Set the first background image using inline CSS below. -->
			
			<div class="fill"><img src="{{asset($picture->last()->link)}}" width="100%"></div>
			
		</div>
		@foreach ($picture as $pic)
		<div class="item">
			<!-- Set the second background image using inline CSS below. -->
			<div class="fill"><img src="{{asset($pic->link)}}" width="100%"></div>
		</div>
		@endforeach
	</div>
	@else
	<div class="carousel-inner">
		<div class="item active">
			<!-- Set the first background image using inline CSS below. -->
			<div class="fill"><img src="{{asset('public/images/default.jpg')}}" width="100%"></div>
		</div>
	</div>
	@endif
	<!-- Controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="icon-prev"></span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="icon-next"></span>
	</a>

</div>