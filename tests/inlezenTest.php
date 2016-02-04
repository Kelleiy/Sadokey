<?php

function inlezen($fileName ) {
    include_once 'inlezen.php'; // has to discard fileName
}

class InlezenTest extends PHPUnit_Framework_TestCase {

    public function testHasCreatedBothArrays() {
        // simple, included code has
        inlezen('./tests/data/t1.txt');
        // check if arrays have been made
        $this->assertTrue(isset($wz));
        $this->assertTrue(isset($woord));
        
        $this->assertEquals(2, count($wz), '2 regels woordzoeker');
        $this->assertEquals(1, count($woord), '1 woord te vinden');
        $this->assertEquals(array(str_split('abc-g'), str_split('xyz--')), $wz);
        $this->assertEquals("ab", $woord[0]);
    }

}
