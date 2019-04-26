<?php 
	include_once("../Model/m_alojo.php");

	if(isset($_POST["tipo"],$_POST["sexo"],$_POST["tamano"],$_POST["color"],$_POST["raza"],$_POST["direccion"]
		,$_POST["fechaE"],$_POST["descripcion"],$_POST["img"],$_POST["lugar"],$_POST["fono"],$_POST["nombrealojo"],$_POST["duracion"])){
		session_start();
		// Creamos Objetos
		$tipo=$_POST["tipo"];
		$color=$_POST["color"];
		$tamano=$_POST["tamano"];
		$sexo=$_POST["sexo"];
		$raza=$_POST["raza"];
		$direccion=$_POST["direccion"];
		$descripcion=$_POST["descripcion"];
		$img=$_POST["img"];
		$fechaE=$_POST["fechaE"];
		$lugar=$_POST["lugar"];
		$fono=$_POST["fono"];
		$nombrealojo=$_POST["nombrealojo"];
		$duracion=$_POST["duracion"];
		$ing= new m_alojo();
		$ing->registrar($color,$tamano,$sexo,$raza,$tipo);
		if(isset($_SESSION["correo"])){
			$usuario=$_SESSION["idusuario"];
		}else{
			echo '<script> window.location="../login.php"; </script>';
		}
		$ing->ingpub($tipo,$color,$tamano,$sexo,$raza,$direccion,$descripcion,$img,$fechaE,$lugar,$fono,$nombrealojo,$duracion);
		echo '<script> window.location="../index.php"; </script>';
	}
?>