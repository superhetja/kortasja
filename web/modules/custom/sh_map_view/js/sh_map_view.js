(function (Drupal, $) {
  "use strict";

  //need to split location into array to parse string to float.
  var location = drupalSettings.sh_map_view.map_view.map_view_location.split(',');

  $("#map-view").css("height", "350px");
  $("#map-view").css("width", "500px");
  var map =  L.map('map-view').setView([parseFloat(location[0]), parseFloat(location[1])], 13); //location sets langtitude and longtitude
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: drupalSettings.sh_map_view.map_view.map_view_id, //This sets the map view (street view or satellite)
    tileSize: 512,
    zoomOffset: -1,
    accessToken: drupalSettings.sh_map_view.map_view.map_view_access_token //Token to display the map
  }).addTo(map);



  var marker = L.circleMarker();

  function onMapClick(e) {
    marker
      .setLatLng(e.latlng)
      .addTo(map);
    doRequest(e.latlng);
  }

  map.on('click', onMapClick);

  function doRequest(latlng) {

    function reqListener () {
      console.log(this.responseText);
      let obj = JSON.parse(this.responseText);
      console.log(obj.address.road + " " +obj.address.house_number + ", " + obj.address.postcode + " " + obj.address.town);
      let house_number = obj.address.house_number !== undefined ? obj.address.house_number : "";
      $('#map_view_address').val(obj.address.road + " " + house_number + ", " + obj.address.postcode + " " + obj.address.town)

    }
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", reqListener);
    oReq.open("GET", "https://nominatim.openstreetmap.org/reverse?email="+ drupalSettings.sh_map_view.map_view.map_view_email +"&format=jsonv2&lat=" + latlng.lat + "&lon=" + latlng.lng);
    oReq.send();
    $('#map_view_longitude').val(latlng.lng);
    $('#map_view_latitude').val(latlng.lat);


  }

}) (Drupal, jQuery);
