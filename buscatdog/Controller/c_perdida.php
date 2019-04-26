<?php 
	include_once("../Model/m_perdida.php");

	if(isset($_POST["nombre"],$_POST["color"],$_POST["tamano"],$_POST["chip"],$_POST["sexo"],$_POST["raza"],$_POST["direccion"],$_POST["descripcion"],$_POST["img"],$_POST["tipo"])){
		session_start();
		// Creamos Objetos
		if(isset($_SESSION["correo"])){
			$nombre=$_POST["nombre"];
			$color=$_POST["color"];
			$tamano=$_POST["tamano"];
			$chip=$_POST["chip"];
			$sexo=$_POST["sexo"];
			$raza=$_POST["raza"];
			$direccion=$_POST["direccion"];
			$descripcion=$_POST["descripcion"];
			$img=$_POST["img"];
			$tipo=$_POST["tipo"];
			if($tipo=="gato"){
				$ing= new m_perdida();
				$ing->reggato($nombre,$color,$tamano,$chip,$sexo,$raza,$tipo);
				//HAY QUE OBTENER EL USUARIO
				$ing->ingpub($nombre,$color,$tamano,$chip,$tipo,$direccion,$descripcion,$img);
				echo '<script> window.location="../index.php"; </script>';
			}else if($tipo == "perro"){
				$ing= new m_perdida();
				$ing->regperro($nombre,$color,$tamano,$chip,$sexo,$raza,$tipo);
				//HAY QUE OBTENER EL USUARIO
				$ing->ingpub($nombre,$color,$tamano,$chip,$tipo,$direccion,$descripcion,$img);
				echo '<script> window.location="../index.php"; </script>';
			}
		}else{
			echo '<script> window.location="../login.php"; </script>';
		}
	}
?>