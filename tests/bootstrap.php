<?php

$Ipath = get_include_path();

set_include_path($Ipath
        . PATH_SEPARATOR . __DIR__ . "."
        . PATH_SEPARATOR . __DIR__ . "../"
);
//require_once '/../bootstrap.php';

//require_once __DIR__ . '/../vendor/autoload.php'; 
//include_once __DIR__ . '/traits/getPrivateMethod.php';
//include_once __DIR__ . '/traits/getPrivateProperty.php';
//print get_include_path();

function testLoader($className) {

    if (strpos($className, "PHP_") === 0)
        return;
    if (strpos($className, "PHPUnit_") === 0)
        return;
//    if (strpos( $className, "m") === 0  & strlen($className) == 1) return; // Mockery
    //print "className:$className";    $a = strpos("PHPUnit_", $className);    var_dump($a);

    if (strpos($className, "test") !== false) {
        print $className;
        $className = substr($className, strpos("test", $className));
        print $className;
        //    include_once $className . ".php";
        die();
    }
    include_once $className . ".php";
}

spl_autoload_register('testLoader');


