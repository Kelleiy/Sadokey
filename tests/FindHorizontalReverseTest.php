<?php

include_once 'functions.php';

class FindHorizontalReverseTest extends PHPUnit_Framework_TestCase {

    public function testSimpeleNaam() { // moet met test beginnen
        $woorden[] = "paa";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'a'); //= str_split("aap");
        $letters[1] = new Letter(0,1, 'a'); //= str_split("aap");
         $letters[2] = new Letter(0,2, 'p'); //= str_split("aap");
        $resultaat = findReversehorizontal($woorden, $letters);
        $this->assertTrue(is_array($resultaat));
        print_r($resultaat);
        $this->assertEquals("paa", $resultaat[0]->string, "paa moet in string zitten");
    }

     public function testSimpeleNaamDieNietBestaat() { // moet met test beginnen
        $woorden[] = "paa";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'p'); //= str_split("aap");
        $letters[1] = new Letter(0,1, 'a'); //= str_split("aap");
         $letters[2] = new Letter(0,2, 'a'); //= str_split("aap");
        $resultaat = findReversehorizontal($woorden, $letters);
        $this->assertTrue(is_array($resultaat));
        
        $this->assertNotEquals("pap", $resultaat[0]->string, "paa moet in string zitten");
    }

    public function testFunctionReturnsArray() { // moet met test beginnen
        $woorden[] = "paa";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'x'); //= str_split("aap");
        $letters[1] = new Letter(0,1, 'a'); //= str_split("aap");
         $letters[2] = new Letter(0,2, 'p'); //= str_split("aap");
        $resultaat = findReversehorizontal($woorden, $letters);
        $this->assertFalse(is_array($resultaat), "foundwords must be set");
    }
}


