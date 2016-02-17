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

function printPuzzle($wzArray, $foundWords, $woorden) {
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

