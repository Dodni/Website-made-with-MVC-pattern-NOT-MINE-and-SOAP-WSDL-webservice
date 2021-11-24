<?php

class Hirek_ujhir_Controller
{
	public $baseName = 'hirek_ujhir'; 
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}
?>