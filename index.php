<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "alive";
include "puzzle.php";

naarTabel($word_list);
$s = createPuzzle($puzzle_level, $word_list);
echo $s;
//createPuzzleTable($data);
//getRandomLetter();
//getRandomStartPosition($word, $level);
//hasOverlap($data, $word, $position);
//losLevelOp();

?>
