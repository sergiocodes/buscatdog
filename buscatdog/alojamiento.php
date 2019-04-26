<?php
  session_start();
  if(isset($_SESSION['correo'])){
    $profile = $_SESSION['correo'];
  }
  
?>
<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Alojamiento - Buscatdog</title>
    <meta name="description" content="THOMSOON - Single page with minimalist two column description and one photo. Download free now with file Photoshop! ">
    <meta name="keywords" content="thomsoon, simplicity, theme, html5, single page, boxed portfolio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="thomsoon.com">
    <link rel="icon" type="image/png" href="img/icon.png" />

    <!--Style-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <style>
        #map {
            max-width: 600px;
            height: 600px;
            min-width: 300px;
            border: 1px solid black;
        }
    </style>
    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->



</head>

<body>

    <!--Preloader-->

    <div class="preloader" id="preloader">
        <div class="item">
            <div class="spinner">
            </div>
        </div>
    </div>

    <div class="opacity-nav">

        <div class="menu-index" id="buttons" style="z-index:999999">
            <i class="fa  fa-close"></i>
        </div>

        <ul class="menu-fullscreen">
            <?php  
                if(isset($_SESSION["correo"])){
                    echo '<li><a class="ajax-link" href="index.php">Inicio</a></li>';
                    echo '<li><a class="ajax-link" href="panel.php">Panel</a></li>';
                    echo '<li><a href="logout.php">Salir</a></li>';
                }else{
                    echo '<li><a class="ajax-link" href="index.php">Inicio</a></li>';
                    echo '<li><a class="ajax-link" href="login.php">Iniciar sesión</a></li>';
                    echo '<li><a class="ajax-link" href="registrar.php">Registrarse</a></li>';
                }
            ?>
        </ul>

    </div>


    <!--Header-->
    <header id="fullscreen">

        <a href="index.php">
            <div class="logo" id="full"><img src="img/logo.png"></div>
        </a>

        <div class="menu-index" id="button">
            <i class="fa fa-bars"></i>
        </div>

    </header>

    <div class="clear"></div>

    <!--Content-->

    <div class="content" id="ajax-content">


        <div class="text-intro">
            <?php
              require_once("Controller/c_pub.php");
              $res=get_alojos($_GET['id']);
              if(isset($res['cat_raza'])){
                $ani="cat";
              }else if(isset($res['dog_raza'])){
                $ani="dog";
              }
              if(isset($res['pper_ubicacion_act'])){
                $dir="pper_ubicacion_act";
              }else if(isset($res['pabd_direccion'])){
                $dir="pabd_direccion";
              }
            ?>
            <h1>Alojado</h1>
            <ul class="portfolio-grid">
                <li class="grid-item" data-jkit="[show:delay=3000;speed=500;animation=fade]">
                    <img src="img/<?php echo $res['pub_imagen'];?>">
                </li>
            </ul>
            
            <h1>Información mascota</h1>
            <div class="two-column">
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr class="bg-warning">
                            <td>Estado</td>
                            <td><?php echo $res['pub_estado'];?></td>
                        </tr>
                        <tr>
                            <td>Especie</td>
                            <td><?php echo $res['mas_especie'];?></td>
                        </tr>
                        <tr>
                            <td>Raza</td>
                            <td><?php echo $res[$ani.'_raza'];?></td>
                        </tr>
                        <tr>
                            <td>Tamaño</td>
                            <td><?php echo $res['mas_tamano'];?></td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td><?php echo $res['mas_color'];?></td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td><?php echo $res['mas_sexo'];?></td>
                        </tr>
                        <tr>
                            <td>Descripción adicional</td>
                            <td><?php echo $res['pub_descripcion'];?></td>
                        </tr>
                    </tbody>
                </table>
                <h1>Información Publicación:</h1>
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td>Fecha Publicación</td>
                            <td><?php echo $res['pub_fecha'];?></td>
                        </tr>
                        <tr>
                            <td>Fecha rescate</td>
                            <td><?php echo $res['pabd_fecha_encon'];?></td>
                        </tr>
                        <tr>
                            <td>Ubicación rescate</td>
                            <td><?php echo $res['pabd_direccion'];?></td>
                        </tr>
                    </tbody>
                </table>
                <h1>Información del contacto:</h1>
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td><?php echo $res['pali_nombre'];?></td>
                        </tr>
                        <tr>
                            <td>Teléfono</td>
                            <td><?php echo $res['pali_fono'];?></td>
                        </tr>
                        <tr>
                            <td>Dirección</td>
                            <td><?php echo $res['pali_lugaralojo'];?></td>
                        </tr>
                        <tr>
                            <td>Alojamiento hasta:</td>
                            <td><?php echo $res['pali_duracion'];?></td>
                        </tr>
                    </tbody>
                </table>
                <h1>Ubicación alojamiento:</h1>
                <div id="map"></div>
            </div>
				
			<script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 16,
                    center: {lat: -34.397, lng: 150.644}
                    });
                    var geocoder = new google.maps.Geocoder();
                    geocodeAddress(geocoder, map);                    
                }
				
				function geocodeAddress(geocoder, resultsMap) {
				var address = "<?php echo $res['pali_lugaralojo'];?>";
                console.log(address);
				geocoder.geocode({'address': address}, function(results, status) {
				  if (status === 'OK') {
					resultsMap.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
					  map: resultsMap,
					  position: results[0].geometry.location
					});
				  } else {
					alert('Geocode was not successful for the following reason: ' + status);
				  }
				});
				}
			</script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAS-vsQiU-Kj7XugCCppod8NHERuBjrMF4&callback=initMap"></script> 
           
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>

    </div>



    <!--Home Sidebar-->

    <div id="ajax-sidebar"></div>


    <!--Footer-->

    <footer>

        <div class="footer-margin">
            <div class="copyright">Buscatdog 2019</div>
        </div>


    </footer>



    <!--Scripts-->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/modernizr.custom.42534.js" type="text/javascript"></script>
    <script src="js/jquery.waitforimages.js" type="text/javascript"></script>
    <script src="js/typed.js" type="text/javascript"></script>
    <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
    <script src="js/jquery.jkit.1.2.16.min.js"></script>
    <script src="js/script.js" type="text/javascript"></script>

    <script>
        $('#button, #buttons').on('click', function() {
            $(".opacity-nav").fadeToggle("slow", "linear");
            // Animation complete.
        });
    </script>


</body>

</html>