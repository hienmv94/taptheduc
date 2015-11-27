<script type="text/javascript" src="{{asset('public/bootstrap/js/jquery-1.11.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFk89X-XYKcImo44AW1XLZoSmz7PAC4bU&language=vi"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/mapDetail.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table_index').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
			},
			"order": [[ 1, "asc" ]]
		});
	} );


</script>
<script type="text/javascript">
	$("#checkAll").click(function () {
		$(".check").prop('checked', $(this).prop('checked'));
	});
</script>
<script>
	$('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
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

