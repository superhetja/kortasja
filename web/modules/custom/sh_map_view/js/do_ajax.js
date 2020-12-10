(function (Drupal, $) {
  "use strict";

  Drupal.behaviors.doAjax = {
    attach: function (context, settings) {
      function handleReq() {
        console.log(this.responseText);
      }

      let oReq = new XMLHttpRequest();
      oReq.addEventListener("load", handleReq);
      oReq.open("GET", "https://nominatim.openstreetmap.org/reverse?email=holmfridurh17@ru.is&format=xml&lat=" + latlng.lat + "&lon=" + latlng.lng);
      oReq.send();
    }
  }

}) (Drupal, jQuery);
