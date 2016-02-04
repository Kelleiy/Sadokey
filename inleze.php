<?php
$fileName = 'tests/data/t1.txt';
// $fileName = $_FILES['veld in form']['tmp_name']);
$ruweregels = FILE($fileName);

foreach($ruweregels as $regel) {
    $regel = trim($regel);
    wz[] = str_split(....)
    woorden[] = $regel;
}