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

	var thaiHaLat = new google.maps.LatLng(21.010245, 105.822495);
	//Pool marker
	var imagePool = 'images/pool-icon.png';
	var markerPool = new google.maps.Marker({
		position: thaiHaLat,
		map: map,
		title:"My house!",
		icon: imagePool
	});
	//Maker tennis

	var indochinaGym = new google.maps.LatLng(21.036308, 105.782434);
	//Pool marker
	var imageGym = 'images/gym.jpg';
	var markerCenter = new google.maps.Marker({
		position: indochinaGym,
		map: map,
		title:"Indochina Plaza!",
		icon: imageGym
	});
	
	//Stadium

	var stadiumMarker = new google.maps.LatLng(21.039627, 105.784659);
	//Pool marker
	var imageStadium = 'images/stadium.png';
	var markerCenter = new google.maps.Marker({
		position: stadiumMarker,
		map: map,
		title:" Sân bóng Đại Học Sư Phạm HN!",
		icon: imageStadium
	});

	//Sport center
	var CauGiayCenter = new google.maps.LatLng(21.036479, 105.791004);

	var imageCenter = 'images/center.jpg';
	var markerCenter = new google.maps.Marker({
		position: CauGiayCenter,
		map: map,
		title:" Trung tâm thể thao Cầu Giấy",
		icon: imageCenter
	});

	//Sport center
	var tennis = new google.maps.LatLng(21.040115, 105.782130);

	var imageTennis = 'images/tennis.png';
	var markerTennis = new google.maps.Marker({
		position: tennis,
		map: map,
		title:" Sân tennis ĐHNN Hà Nội",
		icon: imageTennis
	});

	var markerPool1 = new google.maps.Marker({
		position: new google.maps.LatLng(21.036382, 105.787922),
		map: map,
		title:"My house!",
		icon: imagePool
	});

	//set event for a marker
	google.maps.event.addListener(markerPool, 'click', function() {
		infowindow.open(map, markerPool);
	});


	//show a popup on map
	var contentString = "<p style='width:160px; text-align: justify;'><b>Bể bơi Thái "+
		"Hà</b><br> Mở cửa vào tất cả các ngày trong tuần.<br>"+
		"Liên hệ: 043 857 2726<br>"+
		"<a href='../Project/files/detail.html' target='_blank'>Xem chi tiết</a></p>";
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	
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