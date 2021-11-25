<?php
	require("hulladek.php");
	$server = new SoapServer("hulladek.wsdl");
	$server->setClass('Hulladek');
	$server->handle();
?>
