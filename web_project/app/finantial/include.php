<?php

//global $smarty;
//$smarty = new Smarty();
//
//$smarty->template_dir =  \core\App::getInstance()->getPath(). '/tpl/';
//$smarty->compile_dir  = \core\App::getInstance()->getPath(). '/tpl_c/';

//class MyApp extends 

require_once('lib/Validator.class.php');

class FinantialApp {
    use \core\MicroAppSmarty;
    use \core\MicroAppUtils;

    
    public function __construct() {
	$this->initSmarty();
    }
    
    
    public function checkCPF() {
	$resp = array();
	
	$cpf = \core\App::getInstance()->getParm('cpf');
	
	if (strlen($cpf)>0) {
	    
	    try {
		\finantialLibrary\Validator::validateCPF($cpf);
		$resp['success'] = true;
		$resp['msg'] = 'CPF ok';
	    } catch (Exception $ex) {
		$resp['success'] = false;
		$resp['msg'] = $ex->getMessage();
	    }
	    
	} else {
	    $resp['success'] = false;
	}
	
	
	
	
	$this->sendJSON($resp);
    }
    
    
}
