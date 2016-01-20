<?php
define('alphabet', "abcdefghijklmnopqrstuvwxyz");
define('puzzle_breedte', 20);
define('puzzle_hoogte', 20);
$word_list = array(
        'bergkat',
        'steenbok',
        'stekelvarken', 
        'everzwijn',
        'giraf',
        'pauw',
        'neushoorn',
        'leeuw',
        'zebra',
        'antilope',
        'panter',
        'tijger',
        'hyena',
        'olifant',
        'kameel',
        'papegaai',
        'slang',
        'salamander',
);

//Het puzzel level
$puzzle_level = 1;
if (isset($_REQUEST['PuzzleLevel'])) ( $puzzle_level = $_REQUEST['PuzzleLevel']); 
