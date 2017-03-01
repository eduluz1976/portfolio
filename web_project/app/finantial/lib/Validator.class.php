<?php

namespace finantialLibrary;

/**
 * @author Eduardo Luz <eduluz.canada@gmail.com>
 * @package Portfolio
 * @version 1.0.1
 */


class Validator {
    

    /**
     * 
     * @param string $cpf
     * @throws InvalidLengthException When the CPF don't have the right length
     * @throws InvalidContentException When the CPF's content isn't numeric
     * @throws InvalidWellKnownDuplicatedException Thrown when CPF's contents is
     *						   repeated numbers
     * @throws InvalidCPFException When the one of DVs is wrong
     * 
     * @return bool true if the CPF number is valid
     */
    public static function validateCPF($cpf) {
	
	if (strlen($cpf) != 11) {
	    throw new InvalidLengthException();
	} elseif (!is_numeric($cpf)) {
	    throw new InvalidContentException();
	} elseif (str_repeat($cpf[0], 11) == $cpf) {
	    throw new InvalidWellKnownDuplicatedException();
	}
	
	$dv1 = $cpf[9];
	$dv2 = $cpf[10];
	$isValid = true;
	$num = 0;
	
	for ($i=0; $i<9; $i++) {
	    $k = 10 - $i;
	    $num += intval($cpf[$i]) * $k;
	}	
	
	if (self::checkDV($num, $dv1)) {

	    $num = 0;

	    for ($i=0; $i<10; $i++) {
		$k = 11 - $i;
		$num += intval($cpf[$i]) * $k;
	    }	
	    
	    if (!self::checkDV($num, $dv2)) {
		$isValid = false;
	    }
	} else {
	    $isValid = false;
	}
	
	
	if (!$isValid) {
	    throw new InvalidCPFException();
	}
	return true;
    }
    
    
    
    public static function checkDV($num,$dv) {
	$expectedDV = ($num * 10) % 11;	
	$expectedDV = ($expectedDV == 10)?0:$expectedDV;
	if ($expectedDV == $dv) {
	    return true;
	} else {
	    return false;
	}
    }
    
}




class InvalidLengthException extends \Exception {
    
    public function __construct($message='Incorrect length', $code=901, $previous=null) {
	parent::__construct($message, $code, $previous);
    }
}





class InvalidContentException extends \Exception {
    
    public function __construct($message='The value must be numeric', $code=902, $previous=null) {
	parent::__construct($message, $code, $previous);
    }
}




class InvalidWellKnownDuplicatedException extends \Exception {
    
    public function __construct($message='The value is a invalid number (repeated)', $code=903, $previous=null) {
	parent::__construct($message, $code, $previous);
    }
}



class InvalidCPFException extends \Exception {
    
    public function __construct($message='', $code=904, $previous=null) {
	parent::__construct('Invalid CPF '.$message, $code, $previous);
    }
}
