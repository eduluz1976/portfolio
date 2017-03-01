<?php

namespace TestNucleus;

/**
 * Base class, with major of methods to do the API requests.
 */
class APIRequestBase {
    use Utils;
    
    protected static $baseURL = "";
    protected static $baseAction = "";
    
    protected static $parms = array();
    
    /**
     * Define internal parameter 
     * @param string $key
     * @param string $value
     */
    public static function setParm($key, $value) {
	self::$parms[$key] = $value;
    }
    
    /**
     * Define main parameters.
     * 
     * @param string $baseURL
     * @param string $baseAction
     */
    public static function config($baseURL, $baseAction=false) {
	self::$baseURL = $baseURL;
	if ($baseAction) {
	    self::$baseAction = $baseAction;
	}
    }
    




    /**
     * Execute the request, test response and return the contents.
     * @return array
     * @throws Exception
     */
    public static function exec() {
	
	$parms = self::buildQueryString();
	
	$url = self::$baseURL .'/'. self::$baseAction.'?'.$parms;
	
	$contents = file_get_contents($url);
	
	if (empty($contents)) {
	    throw new Exception('Connection error');
	}
	
	$json = json_decode($contents,JSON_OBJECT_AS_ARRAY);
	
	if (json_last_error()) {
	    throw new Exception('Error: ' . json_last_error_msg());
	}

	if (is_array($json) && ($json['msg'] == 'success')  && array_key_exists('data', $json)) {
	    $result = $json['data'];
	    return $result;
	} else {
	    throw new Exception('Format error');
	}
    }
    
}

/**
 * Trait that meet all utilities methods
 */
trait Utils {

    /**
     * Build a query string from internal static parameters.
     * @return string
     */
    protected static function buildQueryString() {
	$s = '';
	foreach (self::$parms as $k => $v) {
	    $s .= $k . '=' . urlencode($v) . '&';
	}
	return $s;
    }    
}


/**
 * Class that make specific loop, thus this API (ScrollsGuide) have a restriction 
 * of get only 500 entries per request.
 */
class ScrollsGuide extends APIRequestBase {
    
    /**
     * Do multiple requests and merge results into a only dataset.
     * @param int $start
     * @param int $target
     * @param int $step
     * @return array
     */
    public static function execLoop($start, $target, $step) {
	$response = array();
	for (;$start<$target;$start+=$step) {
	    self::setParm('start', $start);
	    self::setParm('limit', $step);
	    $resp = self::exec();
	    $response = array_merge($response,$resp);
	}	
	return $response;
    }
    
    
}