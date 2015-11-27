<div id="myCarousel" class="carousel slide" style="height:350px">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for Slides -->
				<div class="carousel-inner">
					<div class="item active">
						<!-- Set the first background image using inline CSS below. -->
						<div class="fill"><img src="{{asset('public/images/da.png')}}" width="100%"></div>
					</div>
					<div class="item">
						<!-- Set the second background image using inline CSS below. -->
						<div class="fill"><img src="{{asset('public/images/1.png')}}" width="100%"></div>
					</div>
					<div class="item">
						<!-- Set the third background image using inline CSS below. -->
						<div class="fill"><img src="{{asset('public/images/2.png')}}" width="100%" height="100%"></div>
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="icon-prev"></span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="icon-next"></span>
				</a>

			</div>