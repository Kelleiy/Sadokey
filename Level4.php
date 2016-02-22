<?php

//level 4
//function findDiagonaal($woorden,$wzArray)
//{
//    $totalRows=1;
//    // telt de rijen
//    foreach ($wzArray as $row) {
//        $totalColumns = 1;
//        // telt voor elke rij ook de kolommen (eigenlijk de plekjes)
//        foreach ($row as $col) {
//            $totalColumns++;
//        }
//        $totalRows++;
//    }
//
//    foreach ($woorden as $woord) {
//        unset($woordLetters);
//        $woordLetters = str_split($woord);
//        for ($j=1;$j<$totalColumns;$j++) {
//            for($i=1;$i<$totalRows;$i++){
//                $k = 0;
//                if (($woordLetters[$k] == $wzArray[$i][$j])) {
//                    //maybe start of word found
//                    while ($k < sizeof($woordLetters)) {
//                        if ($woordLetters[$k] == $wzArray[$i][$j]) {
//                            $letter = new Letter();
//                            $letter->row = $i;
//                            $letter->column = $j;
//                            $letter->letter = $wzArray[$i][$j];
//
//                            $potentialMatch[] = $letter;
//
//                            $k++;
//                            $i++;
//                        } else {
//                            unset($potentialMatch);
//                            break;
//                        }
//                    }
//                    if (($k == sizeof($woordLetters))) {
//                        //word matched
//                        $foundWord = new FoundWord();
//                        $foundWord->string = $woord;
//                        $foundWord->letters = $potentialMatch;
//                        $foundWords[] = $foundWord;
//                        unset($potentialMatch);
//                        break 2;
//                    }
//                    unset($potentialMatch);
//                }
//                $j++;
//            }
//        }
//    }
//    return $foundWords;
//}

function findDiagonaal($i, $j, $woorden, $wzArray)
{
    foreach($woorden as $k => $letter){
        if(! isCoordinaatOK($i + $k, $j + $k)){
            return FALSE;
        }
        if ($wzArray[$i + $k][$j + $k] !== $letter){
            return FALSE;
        }
        
    }
    return TRUE;
}

function zoekDiagonaalLBRO($word, $wzArray){
    foreach($wzArray as $i => $rij){
        foreach($rij as $j => $letter){
            if ($letter == $word[0]){
            $t = findDiagonaal($i, $j, $woorden, $wzArray);
            
                if ($t == TRUE) {
                    return;
                }
            }
        }
    }
}
