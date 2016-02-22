<?php

include_once 'functions.php';

class FindVerticalTest extends PHPUnit_Framework_TestCase {

    public function testSimpeleNaam() { // moet met test beginnen
        $woorden[] = "a";
        $woorden[] = "b";
        $woorden[] = "c";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'a'); //= str_split("abc");
        $letters[1] = new Letter(1,0, 'b'); //= str_split("abc");
        $letters[2] = new Letter(2,0, 'c'); //= str_split("abc");
        $resultaat = findhorizontal($woorden, $letters);
        $this->assertTrue(is_array($resultaat));
        print_r($resultaat);
        $this->assertEquals("aap", $resultaat[0]->string, "aap moet in string zitten");
    }

     public function testSimpeleNaamDieNietBestaat() { // moet met test beginnen
        $woorden[] = "pap";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'p'); //= str_split("aap");
        $letters[1] = new Letter(0,1, 'a'); //= str_split("aap");
         $letters[2] = new Letter(0,2, 'p'); //= str_split("aap");
        $resultaat = findhorizontal($woorden, $letters);
        $this->assertTrue(is_array($resultaat));
        
        $this->assertNotEquals("aap", $resultaat[0]->string, "abc moet in string zitten");
    }

    public function testFunctionReturnsArray() { // moet met test beginnen
        $woorden[] = "abc";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'x'); //= str_split("aap");
        $letters[1] = new Letter(1,0, 'b'); //= str_split("aap");
         $letters[2] = new Letter(2,0, 'c'); //= str_split("aap");
        $resultaat = findhorizontal($woorden, $letters);
        $this->assertFalse(is_array($resultaat), "foundwords must be set");
    }
}
