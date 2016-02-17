<?php

include_once 'functions.php';

class FindHorizontalTest extends PHPUnit_Framework_TestCase {

    //  moet op Test eindigen

    public function testSimpeleNaam() { // moet met test beginnen
        $woorden[] = "aaap";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'a'); //= str_split("aap");
        $letters[1] = new Letter(0,1, 'a'); //= str_split("aap");
         $letters[2] = new Letter(0,2, 'p'); //= str_split("aap");
        $resultaat = findhorizontal($woorden, $letters);
        $this->assertTrue(is_array($resultaat));
        print_r($resultaat);
        $this->assertEquals("aap", $resultaat[0]->string, "aap moet in string zitten");
    }

     public function testSimpeleNaamDieNietBestaat() { // moet met test beginnen
        $woorden[] = "aap";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'a'); //= str_split("aap");
        $letters[1] = new Letter(0,1, 'a'); //= str_split("aap");
         $letters[2] = new Letter(0,2, 'p'); //= str_split("aap");
        $resultaat = findhorizontal($woorden, $letters);
        $this->assertTrue(is_array($resultaat));
        
        $this->assertNotEquals("pap", $resultaat[0]->string, "aap moet in string zitten");
    }

    public function testFunctionReturnsArray() { // moet met test beginnen
        $woorden[] = "aap";
       // $woorden[] = str_split("pop");

        $letters[0] = new Letter(0,0, 'x'); //= str_split("aap");
        $letters[1] = new Letter(0,1, 'a'); //= str_split("aap");
         $letters[2] = new Letter(0,2, 'p'); //= str_split("aap");
        $resultaat = findhorizontal($woorden, $letters);
        $this->assertTrue(is_array($resultaat), "foundwords must be set");
    }
}
