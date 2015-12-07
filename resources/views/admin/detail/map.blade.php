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
@section('script')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFk89X-XYKcImo44AW1XLZoSmz7PAC4bU&language=vi"></script>
<script type="text/javascript">(function(d, t, e, m){
    //Rating
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){

    	RW.init({
    		huid: "265063",
    		uid: "5f0fc721a654e56c0e0a232bb8fa0401",
    		source: "website",
    		options: {
    			"size": "medium",
    			"style": "oxygen",
    			"isDummy": false
    		} 
    	});
    	RW.render();
    };
        // Append Rating-Widget JavaScript library.
        var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
        if (d.getElementById(id)) return;              
        rw = d.createElement(e);
        rw.id = id; rw.async = true; rw.type = "text/javascript";
        rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
        s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));
</script>
<script>
		function initialize() {
			var mapProp = {
				center:new google.maps.LatLng(21.036652, 105.787311),
				zoom:16,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			var map=new google.maps.Map(document.getElementById("onlyMap"),mapProp);
			var myLatLng = new google.maps.LatLng(21.036652, 105.787311);
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'Your location!'
			});
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>
	function initialize() {
		var mapProp = {
			center:new google.maps.LatLng(21.010175, 105.822505),
			zoom:16,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var map=new google.maps.Map(document.getElementById("onlyMap"),mapProp);
		var myLatLng = new google.maps.LatLng(21.010175, 105.822505);
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Your location!'
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop