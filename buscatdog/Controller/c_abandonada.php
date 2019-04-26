<?php 
	include_once("../Model/m_abandonada.php");

	if(isset($_POST["tipo"],$_POST["sexo"],$_POST["tamano"],$_POST["color"],$_POST["raza"],$_POST["direccion"],$_POST["fechaE"],$_POST["descripcion"],$_POST["img"])){
		session_start();
		// Creamos Objetos
		if(isset($_SESSION["correo"])){
			$usuario="registrado";
		}else{
			$usuario="invitado";
		}
		$tipo=$_POST["tipo"];
		$color=$_POST["color"];
		$tamano=$_POST["tamano"];
		$sexo=$_POST["sexo"];
		$raza=$_POST["raza"];
		$direccion=$_POST["direccion"];
		$descripcion=$_POST["descripcion"];
		$img=$_POST["img"];
		$fechaE=$_POST["fechaE"];

		if($usuario=="invitado"){
			$ing= new m_abandonada();
			if($tipo=="gato"){
				$ing->registrargato($tipo,$color,$tamano,$sexo,$raza);
				$ing->ingpub($tipo,$color,$tamano,$sexo,$raza,$direccion,$descripcion,$img,$fechaE);
				echo '<script> window.location="../index.php"; </script>';
			}else if($tipo=="perro"){
				$ing->registrarperro($tipo,$color,$tamano,$sexo,$raza);
				$ing->ingpub($tipo,$color,$tamano,$sexo,$raza,$direccion,$descripcion,$img,$fechaE);
				echo '<script> window.location="../index.php"; </script>';				
			}
			
		}else if($usuario=="registrado"){
			$ing= new m_abandonada();
			if($tipo=="gato"){
				$ing->registrargato($tipo,$color,$tamano,$sexo,$raza);
				$ing->ingpub($tipo,$color,$tamano,$sexo,$raza,$direccion,$descripcion,$img,$fechaE);
				echo '<script> window.location="../index.php"; </script>';
			}else if($tipo=="perro"){
				$ing->registrarperro($tipo,$color,$tamano,$sexo,$raza);
				$ing->ingpub($tipo,$color,$tamano,$sexo,$raza,$direccion,$descripcion,$img,$fechaE);
				echo '<script> window.location="../index.php"; </script>';
			}
		}
	}
?>