<?php

$jasmineVersion = 'jasmine-' . "2.3.4";
$jPath = "$jasmineVersion/lib/$jasmineVersion/";

print <<<EOI

<link rel="shortcut icon" type="image/png" href="$jPath/jasmine_favicon.png">
<link rel="stylesheet" href="$jPath/jasmine.css">

<script src="$jPath/jasmine.js"></script>
<script src="$jPath/jasmine-html.js"></script>
<script src="$jPath/boot.js"></script>

EOI;
unset($jasmineVerison);
unset($jPath);
