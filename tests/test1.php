<?php


require_once '../lib/Validator.class.php';



class ClasseTestValidator extends PHPUnit_Framework_TestCase {
    
    
    
    
    

    /**
     * @expectedException finantialLibrary\InvalidLengthException
     */
    public function testCPFLength() {


	
	$this->assertTrue(finantialLibrary\Validator::validateCPF('123456789012'));
    }
    
    
    /**
     * @expectedException finantialLibrary\InvalidContentException
     */
    public function testCPFContents() {
	$this->assertTrue(finantialLibrary\Validator::validateCPF('1234567890A'));
    }

    
    /**
     * Test some valid CPF
     */
    public function testCPFValid() {
	$this->assertTrue(finantialLibrary\Validator::validateCPF('52998224725'));
	$this->assertTrue(finantialLibrary\Validator::validateCPF('02011669928'));
    }
    
    /**
     * @expectedException finantialLibrary\InvalidCPFException
     */
    public function testCPFInvalid() {	
	$this->assertTrue(finantialLibrary\Validator::validateCPF('74824095100'));
    }
    
    
    /**
     * @expectedException finantialLibrary\InvalidWellKnownDuplicatedException
     */
    public function testCPFWellKnownInvalid() {
	
	$this->assertFalse(finantialLibrary\Validator::validateCPF('11111111111'));
	
    }
    
}

