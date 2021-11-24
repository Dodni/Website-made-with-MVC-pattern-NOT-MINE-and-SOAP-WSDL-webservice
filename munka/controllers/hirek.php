<?php

class Hirek_Controller
{
	public $baseName = 'hirek';
	public function main(array $vars)
	{
		$aloldal = isset($vars[0]) ? $vars[0] : "hirek";
        $hirek_model = new Hirek_Model();
		
        if ($aloldal == 'hirek') {
            $retData = $hirek_model -> get_data();
            $view = new View_Loader($this->baseName."_main");

			      foreach($retData as $name => $value)
				      $view->assign($name, $value);

        } else if (is_numeric($aloldal)){
            $retData = $hirek_model -> mutat($aloldal);
            $view = new View_Loader($this->baseName."_hozzaszolas_main");
            
            foreach($retData as $name => $value)
				      $view->assign($name, $value);
        }
	}
}

?>