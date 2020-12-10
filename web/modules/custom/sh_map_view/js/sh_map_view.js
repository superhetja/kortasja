(function (Drupal, $) {
  "use strict";


  $("#map-view").css("height", "350px");
  $("#map-view").css("width", "500px");
  var map =  L.map('map-view').setView([63.938824, -20.972237], 13);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/satellite-v9',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic2luZHJpdDE3IiwiYSI6ImNraWg5d3R1ODF2YWUyeXBldjViaHdta3kifQ.7BzIf8X2U6IjG74snzPqHw'
  }).addTo(map);

  var marker = L.circleMarker();

  function onMapClick(e) {
    marker
      .setLatLng(e.latlng)
      .addTo(map);
    doAddressCheck(e.latlng);
  }

  function doAddressCheck(latlng){
    var req = new XMLHttpRequest()
  }

  map.on('click', onMapClick);


}) (Drupal, jQuery);
