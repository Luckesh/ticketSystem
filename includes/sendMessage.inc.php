<?php
require 'dbh.inc.php';
require 'sendmail.inc.php';
session_start();

$id=$_GET['id'];
$msg=$_GET['msg'];
$returnLocation=$_GET['returnLocation'];


messageToRiesitel($id,$conn,$_SESSION['u_uid'],$msg);

header('Location: ../'.$returnLocation);
?>
