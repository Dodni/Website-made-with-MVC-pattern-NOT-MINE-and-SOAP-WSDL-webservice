<?php

class Szallitasok_Controller
{
	public $baseName = 'szallitasok';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>