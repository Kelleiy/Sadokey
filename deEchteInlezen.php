<?php

function inlezen(array $regels)  {
    $wz = array();
    $woorden = array();
    // eerrst de wz
    foreach($regels as $regel) {
        $d = str_split(trim($regel));
        // klasr als lege regel
        if (count($d) <= 1) break; // verlaat lus
        $wz[]= $d;
    }
    // nu de woorden vinden
    foreach($regels as $regel) {
        if (
                $noggeenlegeregel) continue; // volgende iteratie
        $woorden[] = trim($regel);
    }
    
    return array($wz, $woorden);
}


//inlezen($ruweregels);