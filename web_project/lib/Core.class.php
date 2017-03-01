<?php

namespace core;

//require_once './lib/AutoLoad.class.php';


/**
 * Simple framework to manage small web projects
 * 
 * @author Eduardo Luz <eduluz.canada@gmail.com>
 * @copyright (c) 2017, Eduardo Luz
 * @package Portfolio
 */
class App {
//    use AutoLoad;
    
    protected static $instance;
    
    protected $config;
    protected $parms;
    protected $context;
    protected $action;
    
    
    public function __construct() {
	$this->loadConfig();
	
	$this->defParms();
	
	spl_autoload_register(array($this,'autoload'));
	
    }
    
    
    protected function autoload() {
	
    }
    
    /**
     * Load the app definitions of config file
     * 
     * @param string $filename
     */
    protected function loadConfig($filename='config.json') {
	if (file_exists($filename)) {
	    $textConfig = file_get_contents($filename);
	    $this->config = json_decode($textConfig, JSON_OBJECT_AS_ARRAY);
	    
	    // loading registered addons
	    if (array_key_exists('addons', $this->config)) {
		foreach ($this->config['addons'] as $addon) {
		    if (array_key_exists('path', $addon) 
			&& file_exists('./addons/'.$addon['path'])) {
			    if (array_key_exists('includes', $addon) && is_array($addon['includes']) ) {
				foreach ($addon['includes'] as $include) {
				    $filename = './addons/'.$addon['path'].'/'.$include;
				    if (file_exists($filename)) {
					include_once($filename);
				    }
				}
			    }
			}
		}
	    }
	}
	
    }
    
    
    
    /**
     * Load and assign the parms values
     */
    protected function defParms() {
	
	if (array_key_exists('default', $this->config) 
		&& array_key_exists('parms', $this->config['default'])) {
	    $this->parms = array_merge($this->config['default']['parms'], $_REQUEST);
	} else {
	    $this->parms = $_REQUEST;
	}
	
	if (array_key_exists('_context', $_REQUEST)) {
	    $this->context = $_REQUEST['_context'];
	} elseif (array_key_exists('default', $this->config) 
		&& array_key_exists('context', $this->config['default']) ) {
	    $this->context = $this->config['default']['context'];
	} else {
	    $this->context = 'main';
	}
	
	if (array_key_exists('_action', $_REQUEST)) {
	    $this->action = $_REQUEST['_action'];
	} elseif (array_key_exists('default', $this->config) 
		&& array_key_exists('action', $this->config['default']) ) {
	    $this->action = $this->config['default']['action'];
	} else {
	    $this->action = 'index';
	}
	
    }



    /**
     * 
     * @return string
     */
    public function getContext() {
	return $this->context;
    }

    /**
     * 
     * @return string
     */
    public function getAction() {
	return $this->action;
    }


    /**
     * Return the App instance
     * 
     * @return App
     */
    public static function getInstance() {
	if (!self::$instance) {
	    self::$instance = new App();
	}
	
	return self::$instance;
    }
    
    
    /**
     * Execute the context/action 
     */
    public function exec() {
	
	try {
	    $path = $this->checkPathExists();
	    ob_start();
	    
	    $this->execute($path);
	    
	    $content = ob_get_clean();

	    echo $content;
	} catch (\Exception $ex) {
	    echo $ex->getMessage();
	}

    }
    
    
    /**
     * Execute designated action 
     * @param string $path
     * @throws \Exception
     */
    protected function execute($path) {
	if ($this->getParm('_class')) {

	    $className = $this->getParm('_class');
	    $method = $this->getAction();

	    if (!class_exists($className)) {
		throw new \Exception("Class $className not found");
	    }
	    
	    $o = new $className();
	    if (!method_exists($o, $method)) {
		throw new \Exception("Method $method not found");
	    }

	    $o->$method();

	} else {
	    $path .= '/'.$this->getAction().'.php';

	    if (!file_exists($path)) {
		throw new \Exception('action not exist (' . $this->getAction().')');
	    }
	    include_once($path);

	}
	
    }
    
    /**
     * Check if the path to the main action-script exists
     * @return string filepath of script
     * @throws \Exception
     */
    protected function checkPathExists() {

	$path = $this->getBasePath();
	
	if (!file_exists($path)) {
	    throw new \Exception('root path not exist ('.$path.')');
	}
	
	
	$path .= '/'.$this->getContext();
	
	if (!file_exists($path)) {
	    throw new \Exception('context path not exist ('.$this->getContext().')');
	}
	
	if (file_exists($path.'/include.php')) {
	    include_once $path.'/include.php';
	}
	

	return $path;
	
    }
    
    /**
     * Return the application base path;
     * @return string
     */
    public function getBasePath() {
	if (!array_key_exists('defaultPath', $this->config)) {
	    $path = $this->config['defaultPath'];
	} else {
	    $path = './app';
	}
	return $path;
    }
    
    /**
     * Return the actual application path
     * @return string
     */
    public function getPath() {
	$path = $this->getBasePath();
	$path .= '/'.$this->getContext();
	return $path;
    }
    
    
    /**
     * Return the value of parm referenced by key
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed
     */
    public function getParm($key,$defaultValue=null) {
	if (array_key_exists($key, $this->parms)) {
	    return $this->parms[$key];
	} else {
	    return $defaultValue;
	}
    } 
    
    
}



trait MicroAppSmarty {
    
    public $smarty;
    
    
    public function initSmarty() {
	$this->smarty = new \Smarty();

	$this->smarty->template_dir =  \core\App::getInstance()->getPath(). '/tpl/';
	$this->smarty->compile_dir  = \core\App::getInstance()->getPath(). '/tpl_c/';

    }
    
    /**
     * 
     * @return \Smarty
     */
    public function getSmarty() {
	return $this->smarty;
    }
    
}




trait MicroAppUtils {
    
    public function sendJSON($obj) {
	header('Content-type: text/json');
	echo json_encode($obj,JSON_OBJECT_AS_ARRAY);
	exit;
    }
    
}