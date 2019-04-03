<?php
require 'dbh.inc.php';
require 'sendmail.inc.php';
session_start();

$riesitel=$_GET['riesitel'];
$id=$_GET['id'];
$msg=$_GET['msg'];
$sql = "UPDATE tickets SET riesitel=\"$riesitel\" WHERE IDticket=$id;";

$result=mysqli_query($conn, $sql);

notifyChangeRiesitel($id,$conn,$riesitel,$_SESSION['u_uid'],$msg);

header('Location: ../viewToDo.php');
?>
