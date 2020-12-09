(function (Drupal, $) {
  "use strict";


  $("#map-view").css("height", "180px");
  var marker =  L.map('map-view').setView([51.505, -0.09], 13);

  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoic2luZHJpdDE3IiwiYSI6ImNraWg5d3R1ODF2YWUyeXBldjViaHdta3kifQ.7BzIf8X2U6IjG74snzPqHw'
  }).addTo(marker);
}) (Drupal, jQuery);
