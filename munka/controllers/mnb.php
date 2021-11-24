<?php

class Mnb_Controller
{
	public $baseName = 'mnb';
	public function main(array $vars)
	{
        $mnb_model = new Mnb_Model();
        $retData = $mnb_model -> index();

        $view = new View_Loader($this->baseName."_main");

        foreach($retData as $name => $value)
            $view->assign($name, $value);
	}
}

?>