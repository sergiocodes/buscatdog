<?php 
	include_once("../Model/ingresa.php");

	if(isset($_POST["nombre"],$_POST["paterno"],$_POST["materno"],$_POST["email"],$_POST["contraseña"],$_POST["direccion"])){
		// Creamos Objetos
		$nombre=$_POST["nombre"];
		$paterno=$_POST["paterno"];
		$materno=$_POST["materno"];
		$email=$_POST["email"];
		$pass=$_POST["contraseña"];
		$direccion=$_POST["direccion"];
		
		$ing= new ingresa();
		$ing->registrar($nombre,$paterno,$materno,$email,$pass,$direccion);
	}
	echo '<script> window.location="../index.php"; </script>';
?>
