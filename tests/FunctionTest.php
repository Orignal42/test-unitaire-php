<?php
	
require 'functions.php';
use PHPUnit\Framework\TestCase; 

class FunctionTest extends \PHPUnit\Framework\TestCase {

	public function testAddReturnsTheCorrectSum() {
       $calcul= add(5,4);
        $this->assertEquals(9,$calcul);
    }

    public function testAddDoesNotReturnTheIncorrectSum() {
        $calcul= add(5,4);
        $this->assertNotEquals(10,$calcul);
	}
}
	
?>