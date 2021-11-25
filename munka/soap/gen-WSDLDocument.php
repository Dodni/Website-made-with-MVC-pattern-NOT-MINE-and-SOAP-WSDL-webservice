<?php
	//error_reporting(0);
	require 'hulladek.php';
	require 'WSDLDocument/WSDLDocument.php';
	$wsdl = new WSDLDocument('Hulladek', "http://localhost/munka/soap/szerver.php", "http://localhost/munka/soap/");
	$wsdl->formatOutput = true;
	$wsdlfile = $wsdl->saveXML();
	echo $wsdlfile;
	file_put_contents ("hulladek.wsdl" , $wsdlfile);
?>
