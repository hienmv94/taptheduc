function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(21.036652, 105.787311),
    zoom:5,
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