<?php

class Ujhir_Controller
{
	public $baseName = 'ujhir';
	public function main(array $vars)
	{
		$ujhirModel = new Ujhir_Model;
		$retData = $ujhirModel->get_data($vars);
		
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "hirek";

		$view = new View_Loader($this->baseName.'_main');

		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>