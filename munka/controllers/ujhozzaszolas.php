<?php

class Ujhozzaszolas_Controller
{
	public $baseName = 'ujhozzaszolas';
	public function main(array $vars)
	{
		$ujhozzaszolasModel = new Ujhozzaszolas_Model;
		$retData = $ujhozzaszolasModel->get_data($vars);
		
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "hirek";

		$view = new View_Loader($this->baseName.'_main');
        
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>  