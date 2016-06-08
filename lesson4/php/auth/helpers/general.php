<?php
function __autoload($className){
    $DS = DIRECTORY_SEPARATOR;
    $path = "libs\\$className.php";
    $path = str_replace('\\',$DS,$className);
    require_once "libs\\$className.php";
}

//a quicky!
function vd($o){
    var_dump($o);
}

