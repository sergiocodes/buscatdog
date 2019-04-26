<?php 
	include_once("../Model/m_panel.php");
	if(isset($_POST["claveantigua"],$_POST["clavenueva"])){
		// Creamos Objetos
		session_start();
		$prev=$_POST["claveantigua"];
		$new=$_POST["clavenueva"];
		if(isset($_SESSION)){
			//print_r($_SESSION);
			$uid=$_SESSION['correo'];
		}
		$act= new m_panel();
		$act->actualizar($prev,$new,$uid);
		echo '<script> window.location="../panel.php"; </script>';

	}else if(isset($_POST["id"])){
		$pubid=$_POST["id"];
		$act= new m_panel();
		$act->cambiarestado($pubid);
		echo '<script> window.location="../panel.php"; </script>';
	}
	
?>