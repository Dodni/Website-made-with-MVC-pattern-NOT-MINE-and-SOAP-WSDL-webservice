<?php

class Szallitasok_Datumok_Controller
{
	public $baseName = 'szallitasok_datumok';
	public function main(array $vars)
	{
        $szallitasokDatumokModel = new Szallitasok_Datumok_Model;
		$retData = $szallitasokDatumokModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "felveteli";

		$view = new View_Loader($this->baseName."_main");

        foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>