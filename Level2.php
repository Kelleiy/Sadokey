<?php

//level 2
function findReversehorizontal($woorden,$letters)
{
    foreach($woorden as $woord){
        unset($woordLetters);
        $woordLetters = array_reverse(str_split($woord));
        // array_reverse zorgt ervoor dat array met de letters wordt opgedraaid
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

