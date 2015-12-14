<!doctype html>
<html lang="en">
<head>
	<title>Tập thể thao - Home </title>
	@include('admin.include.head')

	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFk89X-XYKcImo44AW1XLZoSmz7PAC4bU&language=vi"></script>
	@extends('admin.include.script')
</head>
<body>
	@include('user.include.header')
	<div id = "map-canvas">

	</div>

</body>
</html>
@section('script')
	<script charset="utf-8">
function initialize(){
	var myLatlng = new google.maps.LatLng(21.019862, 105.805918);
	var mapOptions = {
		center: myLatlng,
		zoom: 15,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
	
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
			var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			var info = new google.maps.InfoWindow({
				map: map,
				position: pos,
				content: "Your are here!"
			});
			map.setCenter(pos);
		},function(){
			handleNoGeolocation(true);
		});
	}
	else{
		handleNoGeolocation(false);
	}
	
	
	<?php
		foreach($location as $loc) {
			$link ='diadiem/'.$loc->id;
			$describe = $loc->name."<br>Liên hệ :".$loc->contact.'<br><a href='.$link.' >Chi tiết</a>';

	?>

		var address = '<?php echo $loc->address; ?>';
		
		
		geocoder = new google.maps.Geocoder();
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var image = '<?php echo $loc->category_link; ?>';
				var name = '<?php echo $loc->name; ?>';
				var describe = '<?php echo $describe; ?>';

				lat = results[0].geometry.location.lat();
				lng = results[0].geometry.location.lng();
			       	var address_att = new google.maps.LatLng(lat, lng); // attitude's address
			       	// var image;
			       	// alert(cate);
			       	// console.log(cate);
			       	var markerPool = new google.maps.Marker({
			       		position: address_att,
			       		map: map,
						title: name, // adress's name
						icon: image
					});
			       	var infowindow = new google.maps.InfoWindow({
			       		content: describe
			       	});
					//set event for a marker
					google.maps.event.addListener(markerPool, 'click', function() {
						infowindow.open(map, markerPool);
					});

					//show a popup on map
					//var contentString = arrDescribe[j];
					//alert(arrDescribe[j]);
					
			}else{
				alert("False");
			}
		});
	<?php
	}
	 ?> 		
}
	
//function check error show location
function handleNoGeolocation(errorFlag){
	if(errorFlag){
		var content1 = "Sorry, we can not show your location!";
	}else{
		var content1 = "Your browser does not support!";
	}
	var infowindow = new google.maps.InfoWindow(options);
	map.setCenter(options.position);
};
	
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop
