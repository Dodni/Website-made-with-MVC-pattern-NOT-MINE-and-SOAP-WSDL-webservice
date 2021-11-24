<?php
	//error_reporting(0);
	require 'felveteli.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Felveteli', "http://localhost/munka/soap/szerver.php", "http://localhost/munka/soap/");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("felveteli.wsdl" , $wsdlfile);
?>
