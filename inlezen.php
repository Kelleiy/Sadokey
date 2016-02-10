<?php
    
//$fileName = 'tests/data/t1.txt';
//  $fileName = $_FILES['veld in form']['tmp_name']);
//$ruweregels = FILE($fileName);
//
//foreach($ruweregels as $regel) {
//    $regel = trim($regel);
//    wz[] = str_split(....)
//    woorden[] = $regel;
//}

// voorbeeld gegeven door Jacob (op ma 8-2-2016):
//$filename = $_FILES[]['tmp_name'];
    //include 'inlezen.php';
    //$d = inlezen ($filename);
    //$wz = $d[0];
    //$woorden = $d[1]

//include 'losoplevel1.php';
//losoplevel1 ($wz, $woorden);

include 'puzzelnieuw.php';
function inlezen($filename) {
    $ruweregels = FILE($filename);
}

//inlezen($filename);

    //foreach($ruweregels as $regel) {
        //$regel = trim($regel);
        //$wz[] = str_split($woorden);
       // $woorden[] = $regel;
   // return array($wz, $woorden);


?> 