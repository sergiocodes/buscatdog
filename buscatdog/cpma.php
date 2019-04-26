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
    <title>Crear abandonada - Buscatdog</title>
    <meta name="description" content="Contact page with contact form and simplicty information with e-mail and address. Contact form with check input and textarea. ">
    <meta name="keywords" content="thomsoon, simplicity, theme, html5, contact, form">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="thomsoon.com">
    <link rel="icon" type="image/png" href="img/icon.png" />

    <!--Style-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">	
	<link rel="stylesheet" href="js/alertifyjs/alertify.min.css" />
	<link rel="stylesheet" href="js/alertifyjs/css/themes/default.min.css" />
    
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
        <ul class="portfolio-grid">
            <li class="grid-item" data-jkit="[show:delay=3000;speed=500;animation=fade]" href="cpmp.php">
                <img src="img/logo/button_al.png">
                <a class="ajax-link" href="cpmaa.php">
                    <div class="grid-hover" href="cpmaa.php">
                    </div>
                </a>
            </li>
        </ul>
        <div class="text-intro">

            <h1>Crear publicación de mascota abandonada</h1>
            <p>Los siguientes campos corresponden a información de la mascota vista:</p>

            <form action="Controller/c_abandonada.php" method="post" >
                <div class="form-group">
                    <label for="selectorespecie">Especie</label>
                    <select name="tipo" class="form-control" id="selector-esp">
                        <option value="gato">Gato</option>
                        <option value="perro">Perro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Raza</label>
                    <input type="text" name="raza" class="form-control" id="mas-raza" placeholder="Ej.: Labrador">
                </div>
                <div class="form-group">
                    <label for="selectortamano">Tamaño</label>
                    <select name="tamano" class="form-control" id="selector-tam">
                        <option value="chico">Chico</option>
                        <option value="mediano">Mediano</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Color</label>
                    <input type="text" name="color" class="form-control" id="mas-color" placeholder="Ej.: Negro">
                </div>
                <div class="form-group">
                    <label for="selectorsexo">Sexo</label>
                    <select name="sexo" class="form-control" id="selector-sex">
                        <option value="hembra">Hembra</option>
                        <option value="macho">Macho</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Direccion donde se vió a la mascota</label>
                    <input type="text" name="direccion" class="form-control" id="mas-dir" placeholder="Ej.: Ecuador 8981, Estacion Central, Santiago">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Fecha en que se vió a la mascota</label>
                    <input type="text" name="fechaE" class="form-control" id="mas-fec" placeholder="AAAA-MM-DD">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción adicional</label>
                    <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Subir fotografía</label>
                    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
            </form>

        </div>

        <br/><br/><br/><br/><br/><br/><br/><br/>
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
	<script src="js/alertifyjs/alertify.min.js"></script>

    <script>
        $('#button, #buttons').on('click', function() {
            $(".opacity-nav").fadeToggle("slow", "linear");
            // Animation complete.
        });
    </script>
		
    	
</body>

</html>