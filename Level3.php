<?php

//level 3
function findVertical($woorden,$wzArray)
{
    $totalRows=1;
    // telt de rijen
    foreach ($wzArray as $row) {
        $totalColumns = 1;
        // telt voor elke rij ook de kolommen (eigenlijk de plekjes)
        foreach ($row as $col) {
            $totalColumns++;
        }
        $totalRows++;
    }

    foreach ($woorden as $woord) {
        unset($woordLetters);
        $woordLetters = str_split($woord);
        for ($j=1;$j<$totalColumns;$j++) {
            for($i=1;$i<$totalRows;$i++){
                $k = 0;    
                if (($woordLetters[$k] == $wzArray[$i][$j])) {
                    //maybe start of word found
                    while ($k < sizeof($woordLetters)) {
                        if ($woordLetters[$k] == $wzArray[$i][$j]) {
                            $letter = new Letter();
                            $letter->row = $i;
                            $letter->column = $j;
                            $letter->letter = $wzArray[$i][$j];

                            $potentialMatch[] = $letter;

                            $k++;
                            $i++;
                        } else {
                            unset($potentialMatch);
                            break;
                        }
                    }
                    if (($k == sizeof($woordLetters))) {
                        //word matched
                        $foundWord = new FoundWord();
                        $foundWord->string = $woord;
                        $foundWord->letters = $potentialMatch;
                        $foundWords[] = $foundWord;
                        unset($potentialMatch);
                        break 2;
                    }
                    unset($potentialMatch);
                }
            }
        }
    }
    return $foundWords;
}

