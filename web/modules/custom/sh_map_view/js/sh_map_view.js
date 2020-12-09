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
    console.log(e.latlng);
  }

  map.on('click', onMapClick);


}) (Drupal, jQuery);
