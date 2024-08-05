<?php
	session_start();
	$autenti= isset ($_SESSION["autentificado"]) ? $_SESSION["autentificado"]:NULL;
	if($autenti!="!*-?¡--"){
		session_destroy();
		header("Location: index.php");
		exit();
	}
?>