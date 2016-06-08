<?php
//start output buffer
ob_start();
// start the session and populate the $_SESSION
session_start();
//load th functions
include_once 'helpers/general.php';


if(!isset($_GET['tableName'])){
    die('{errNum: 0, errMsg: "tableName is a must"}');
}
// get the model we are going to work with
$tableName = $_GET['tableName'];
// if been sent, get the ID to work with
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;
// equivalent to:
//if(isset($_GET['id'])){
//    $id = (int)$_GET['id'];
//}else{
//    $id =null;
//}

//http://localhost/php4578/~Alon/rest.php?tableName=Employees

$className= "\\restful\\$tableName";
$restModel = new $className();
//get the http method (GET,POST,PUT,DELETE)
$method = $restModel->getMethod();

// rest.php?tableName=Users&method=login
// if we got "&method=XXXX"
if(isset($_GET['method'])){
    $method=$_GET['method'];
}

//run the method!
// GET http://localhost/php4578/~Alon/rest.php?tableName=Employees
// GET http://localhost/php4578/~Alon/rest.php?tableName=Employees&id=1
$jsonObj=$restModel->$method($id);
//set response header as json
header('Content-Type: application/json;charset=utf-8');
//print out the response
echo json_encode($jsonObj,JSON_PRETTY_PRINT);