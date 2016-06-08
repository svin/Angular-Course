<?php

/**
 * Created by PhpStorm.
 * User: Jbt
 * Date: 5/11/2016
 * Time: 3:55 AM
 */

function __autoload($className){
    require_once "libs\\$className.php";
}

//echo \oop\User::getInstances();


//$aff1 = new \oop\Affiliate();
//$aff1->setEmail("Alon");
//echo $aff1->getEmail()."<br/>";
//
//$usr1 = new \oop\User();
//$usr2 = new \oop\User();
//
//echo $usr2->getInstances();

//$db = new \db\Mysqli();
//$db2 = new \db\Mysqli();
$db = \db\Mysqli::getInstance();
//get referance to the same instance
$db2 = \db\Mysqli::getInstance();

$sql = "INSERT INTO employees ( firstname,lastname,gender,age)
        VALUES ('Alon','Nagar','m',18)";
$db->query($sql);

//switch ($_GET['cc_type']){
//    case "Visa":
//        $cc = new \creditcards\Visa();
//        break;
//    case "Isracard":
//        $cc = new \creditcards\Isracard();
//        break;
//}
$className = '\\creditcards\\'.$_GET['cc_type'];
if(!file_exists('libs'.$className)){
    throw new Exception("class not exists");
}
$cc =  new $className();

$cc->setCC("4580458045804580");
$cc->createTransaction();

$res = $cc->getResponse();


