<?php 
	include_once("../Model/m_pub.php");
	if(isset($_POST["pubid"],$_POST["newdir"])){
		// Creamos Objetos
		$pubid=$_POST["pubid"];
		$new=$_POST["newdir"];
		//echo $pubid;
		$act= new m_pub();
		$act->actualizar($pubid,$new);
		echo '<script> window.location="../perdido.php?id='.$pubid.'"; </script>';

	}
	
?>