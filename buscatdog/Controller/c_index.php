<?php 
	include_once("./Model/m_index.php");
	function publicaciones(){
		$pub= new m_index();
		return $pub->publicar();
	}

?>



