<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.608444, lng: -58.3722367},
        zoom: 15
    });
    var geocoder = new google.maps.Geocoder();

    document.getElementById('submit').addEventListener('click', function() {
      geocodeAddress(geocoder, map);
    });
  }

  function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location

        });
      } else {
        alert('La localización no fue satisfactoria por la siguiente razón: ' + status);
      }
    });
  }
</script>