<?php

function inlezen($fileName ) {
    $ruweRegels = FILE($filename);
}
    foreach($ruweregels as $regel) {
//    $regel = trim($regel);
//    wz[] = str_split(....)
//    woorden[] = $regel;
    return array($wz, $woorden);
}

class InlezenTest extends PHPUnit_Framework_TestCase {

    public function testHasCreatedBothArrays() {
        // simple, included code has
        $gelezenInvoer = inlezen('./tests/data/t1.txt');
        
        
        // check if arrays have been made
        $this->assertTrue(is_array($gelezenInvoer));
        // eerste laadje moet ook een array zijn
        $this->assertTrue(is_array($gelezenInvoer[0]));
        // ik verwacht 2 laadjes
        $this->assertEquals(2, count($gelezenInvoer));
        // 2e laadje (bestaat volgend bovenste test) moet ook een array zijn
        $this->assertTrue(is_array($gelezenInvoer[1]));
        //$this->assertTrue(isset($wz));
        //$this->assertTrue(isset($woorden));
        
        $wz = $gelezenInvoer[0];
        $woorden = $gelezenInvoer[1];       
        
        $this->assertEquals(2, count($wz), '2 regels woordzoeker');
        $this->assertEquals(1, count($woorden), '1 woord te vinden');
        $this->assertEquals(array(str_split('abc-g'), str_split('xyz--')), $wz);
        $this->assertEquals("ab", $woorden[0]);
    }

}
