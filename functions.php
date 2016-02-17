<?php

include 'Level1';
include 'Level2';
include 'Level3';
include 'Level3_reverse';
include 'Level4';
include 'Letter.php';
include 'FoundWord.php';

$ruweregels = FILE($_FILES['puzzel']['tmp_name']);
$level = $_POST['PuzzleLevel'];
$endOfPuzzle = false;
$r = 1;
foreach ($ruweregels as $regel) {
    $regel = trim($regel);
    if ($regel == "") {
        $endOfPuzzle = true;
    }

    if ($endOfPuzzle == false) {
        if ($regel != "") {
            $wz = str_split($regel);
            // opsplitsen van de letters
            $c = 1;
            foreach ($wz as $char) {
                $wzArray[$r][$c] = $char;
                if ($char != "-") {
                    $letter = new Letter();
                    // letter object aanmaken
                    // eigenschappen van de letter: row, column, letter zelf
                    $letter->row = $r;
                    $letter->column = $c;
                    $letter->letter = $char;
                    $letters[] = $letter;
                    //letters weer toevoegen aan array
                }
                $c++;
            }
        }
    } else {
        if ($regel != "") {
            $woorden[] = $regel;
        }
    }
    $r++;
}

<<<<<<< HEAD
function printPuzzle($wzArray,$foundWords,$woorden){
=======
//level 1
function findhorizontal($woorden, $letters) {
    $foundWords = array();
    foreach ($woorden as $woord) {
        unset($woordLetters);
        // wat doet unset: maakt het array van letters (van te vinden woord) weer leeg
        // $woordLetters splits het woord in de individuele letters
        $woordLetters = str_split($woord);
        // door for worden alle letters van de puzzel opgeroepen
        for ($i = 0; $i < sizeof($letters); $i++) {
            $j = 0;
            if (($woordLetters[$j] == $letters[$i]->letter)) {
                //maybe start of word found
                while ($j < sizeof($woordLetters)) {
                    if ($woordLetters[$j] == ($letters[$i]->letter)) {
                        $potentialMatch[] = $letters[$i];
                        $i++;
                        $j++;
                    } else {
                        unset($potentialMatch);
                        break;
                    }
                }
                if (($j == sizeof($woordLetters))) {
                    //word matched
                    $foundWord = new FoundWord($woord, $potentialMatch);
                   // $foundWord->string = $woord;
                   // $foundWord->letters = $potentialMatch;
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

//level 2
function findReversehorizontal($woorden, $letters) {
    foreach ($woorden as $woord) {
        unset($woordLetters);
        $woordLetters = array_reverse(str_split($woord));
        // array_reverse zorgt ervoor dat array met de letters wordt opgedraaid
        for ($i = 0; $i < sizeof($letters); $i++) {
            $j = 0;
            if (($woordLetters[$j] == $letters[$i]->letter)) {
                //maybe start of word found
                while ($j < sizeof($woordLetters)) {
                    if ($woordLetters[$j] == ($letters[$i]->letter)) {
                        $potentialMatch[] = $letters[$i];
                        $i++;
                        $j++;
                    } else {
                        unset($potentialMatch);
                        break;
                    }
                }
                if (($j == sizeof($woordLetters))) {
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

//level 3
function findVertical($woorden, $wzArray) {
    $totalRows = 1;
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
        for ($j = 1; $j < $totalColumns; $j++) {
            for ($i = 1; $i < $totalRows; $i++) {
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

//level 3
function findReverseVertical($woorden, $wzArray) {
    $totalRows = 1;
    foreach ($wzArray as $row) {
        $totalColumns = 1;
        foreach ($row as $col) {
            $totalColumns++;
        }
        $totalRows++;
    }

    foreach ($woorden as $woord) {
        unset($woordLetters);
        $woordLetters = array_reverse(str_split($woord));
        for ($j = 1; $j < $totalColumns; $j++) {
            for ($i = 1; $i < $totalRows; $i++) {
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

//level 4
function findDiagonaal($woorden, $wzArray) {
    $totalRows = 1;
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
        for ($j = 1; $j < $totalColumns; $j++) {
            for ($i = 1; $i < $totalRows; $i++) {
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
                $j++;
            }
        }
    }
    return $foundWords;
}

function printPuzzle($wzArray, $foundWords, $woorden) {
>>>>>>> f685e6f6c9c95a8444d12002f247272686c5d5f4
    $a_z = "abcdefghijklmnopqrstuvwxyz";
    echo "<table class='puzzle'>";
    $r = 1;
    foreach ($wzArray as $row) {
        echo "<tr>";
        $c = 1;
        foreach ($row as $col) {
            echo "<td><label ";
            // alle gevonden woorden naar individueel woord
            foreach ($foundWords as $foundWord) {
                // letters (letterobjecten) van het woord
                foreach ($foundWord->letters as $letter) {
                    // als de row en column overeen komen met die van een letter
                    // posities van de letters zijn 'opgeslagen' in letterobject
                    if (($r == $letter->row) && ($c == $letter->column)) {
                        echo "title='" . $foundWord->string . "'";
                        //titel met woord erin
                    }
                }
            }
            if ($col == "-") {
                $col = $a_z[rand(0, 25)];
                echo " >" . $col . "</label></td>";
            } else {
                echo " >" . $col . "</label></td>";
            }
            $c++;
        }
        $r++;
        echo "</tr>";
    }
    echo "</table>";

    echo "</br></br>";
    foreach ($woorden as $woord) {
        echo "<div style=\"width:100px;\" class='word' id='" . $woord . "'>" . $woord . "</div>";
    }
}
?>

