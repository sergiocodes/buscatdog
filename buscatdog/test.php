<!DOCTYPE html>
<html lang="es">
<head>
<title>Obtener Coordenadas a partir de una dirección</title>
<meta charset="utf-8" />
<script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

</head>
<body onload="mapa()">
 <script>
    function mapa(){
         var geocoder = new google.maps.Geocoder();

        var address = 'Santiago, Chile'
        geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {

            var latitude = results[0].geometry.location.lat();

            var  longitude = results[0].geometry.location.lng();

            alert('La longitud es: ' + longitude + ', la latitud es: ' + latitude);

            } 
        }); 
    }
   
</script>
</body>
</html>