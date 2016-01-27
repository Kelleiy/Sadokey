<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo ";;";
include "puzzle.php";

naarTabel($word_list);
createPuzzle($puzzle_level, $word_list);
createPuzzleTable($data);
fillRandomLetters($data);
prepareData();
getRandomLetter();
getRandomStartPosition($word, $level);
hasOverlap($data, $word, $position);
losLevelOp();

?>
