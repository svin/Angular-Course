<?php
//start output buffer
ob_start();
// start the session and populate the $_SESSION
session_start();



$_SESSION['this_is']="SPARTA!!!";
$_SESSION['auth'] = true;

echo "Text";
