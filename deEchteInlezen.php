<?php

function inlezen(array $regels) {
    $wz = array();
    $woorden = array();
    // eerrst de wz
    foreach ($regels as $regel) {
        $d = str_split(trim($regel));
        // klasr als lege regel
        if (count($d) <= 1)
            break; // verlaat lus
        $wz[] = $d;
    }
    // nu de woorden vinden
    $nogGeenLegeRegel = true;  // proper camelcase name 
    foreach ($regels as $regel) {
        $w = trim($regel);
        if ($nogGeenLegeRegel) {
            print strlen($w);
            if (strlen($w) < 1) {
                $nogGeenLegeRegel = false;
            }
            continue; // volgende iteratie
        }
        $woorden[] = $w;
    }

    return array($wz, $woorden);
}

//inlezen($ruweregels);