<?php

class Mnb_Haviarfolyam_Controller
{
	public $baseName = 'mnb_haviarfolyam'; 
	public function main(array $vars)
	{
		$mnb_haviarfolyam_model = new Mnb_Haviarfolyam_Model();
		$retData = $mnb_haviarfolyam_model -> GetData();

		$view = new View_Loader($this->baseName."_main");

		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>