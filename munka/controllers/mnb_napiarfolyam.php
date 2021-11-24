<?php

class Mnb_Napiarfolyam_Controller
{
	public $baseName = 'mnb_napiarfolyam'; 
	public function main(array $vars)
	{
		$mnb_napiarfolyam_model = new Mnb_Napiarfolyam_Model();
		$retData = $mnb_napiarfolyam_model -> GetData();

		$view = new View_Loader($this->baseName."_main");

		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>