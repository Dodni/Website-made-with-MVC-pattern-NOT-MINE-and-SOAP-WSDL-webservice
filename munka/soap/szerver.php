<?php
	require("felveteli.php");
	$server = new SoapServer("felveteli.wsdl");
	$server->setClass('Felveteli');
	$server->handle();
?>
