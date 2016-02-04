<?php

include_once 'puzzle.php';

class P {

    public $column;
    public $row;
    public $direction;

    public function __construct($r, $c, $direction) {
        $this->row = $r;
        $this->column = $c;
        $this->direction = $direction;
        return $this;   // for chaining
    }

}

class HasOverlapTest extends PHPUnit_Framework_TestCase {

    public function testHasOverlapHORIZONTAL() {
        // should have mocks 
        $direction = new DIRECTION();
        $word = "abc";

        $data = preparedata();
        $d = hasOverlap($data, $word, new P(0, 4, DIRECTION::HORIZONTAL));
        $this->assertFalse($d, "4 should fit");

        $d = hasOverlap($data, $word, new P(0, 19, DIRECTION::HORIZONTAL));
        $this->assertTrue($d, "19 should not fit");
    }

    public function testHasOverlapHORIZONTALREVERSED() {
        // should have mocks 
        $direction = new DIRECTION();
        $word = "abc";

        $data = preparedata();$data[0][5] = 'c';
        $d = hasOverlap($data, $word, new P(0, 4, DIRECTION::HORIZONTAL_REVERSED));
        $this->assertFalse($d, "4 should fit");

        $d = hasOverlap($data, $word, new P(0, 1, DIRECTION::HORIZONTAL_REVERSED));
        $this->assertTrue($d, "revert 1 should not fit");
    }

}
