<?php

include_once 'puzzle.php';

class PrepareDataTest extends PHPUnit_Framework_TestCase {

    public function testPrepareData() {
        // not nice to have puzzle_ as being defined

        $d = preparedata();
        $this->assertEquals(puzzle_height, count($d), "aantal regels");
        $this->assertEquals(puzzle_breedte, count($d[0]), "aantal kolommen");
        $this->assertEquals('0', $d[0][3]); // random
    }

}
