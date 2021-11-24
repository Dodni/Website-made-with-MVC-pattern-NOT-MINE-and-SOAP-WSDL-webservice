<?php

class Teszt_Controller
{
	public $baseName = 'teszt';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName."_main");
	}
}

?>