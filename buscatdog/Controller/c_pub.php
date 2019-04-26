<?php 
	include_once("./Model/m_pub.php");
	function get_publicacion($id){
		$pub= new m_pub();
		$datos=$pub->getinfo($id);
		return $datos[0];
	}
	function get_alojos($id){
		$pub = new m_pub();
		$datos=$pub->getalojo($id);
		return $datos[0];
	}

?>