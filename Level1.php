<?php

//level 1
function findhorizontal($woorden,$letters)
{
    foreach($woorden as $woord){
        unset($woordLetters);
        // wat doet unset: maakt het array van letters (van te vinden woord) weer leeg
        // $woordLetters splits het woord in de individuele letters
        $woordLetters = str_split($woord);
        // door for worden alle letters van de puzzel opgeroepen
        for($i = 0; $i < sizeof($letters); $i++) {
            $j= 0;
            if(($woordLetters[$j] == $letters[$i]->letter)){
                //maybe start of word found
                while ($j < sizeof($woordLetters)){
                    if($woordLetters[$j] == ($letters[$i]->letter)){
                        $potentialMatch[] = $letters[$i];
                        $i++;
                        $j++;
                    }else{
                        unset($potentialMatch);
                        break;
                    }
                }
                if(($j == sizeof($woordLetters))){
                    //word matched
                    $foundWord = new FoundWord();
                    $foundWord->string = $woord;
                    $foundWord->letters = $potentialMatch;
                    $foundWords[] = $foundWord;
                    unset($potentialMatch);
                    break;
                }
                unset($potentialMatch);
            }
        }
    }
    return $foundWords;
}


