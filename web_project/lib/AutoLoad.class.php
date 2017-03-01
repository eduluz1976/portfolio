<?php

namespace core;


trait AutoLoad {
    
    
    
    
    
    public static function init() {
	spl_autoload_register(array(self::getInstance(),'loader'));
    }
    
    
    public function loader($className) {
	die($className);
    }
    
    
}