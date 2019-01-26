<?php
session_start();
require 'sendmail.inc.php';

if (isset($_GET['submit'])) {

  include_once 'dbh.inc.php';

  $eta = '"'.$_GET['eta'].'"';
  $id = $_GET['id'];
  $stmt2 = mysqli_stmt_init($conn);
  $sql = "UPDATE tickets SET eta=$eta WHERE IDticket=$id;";

  $result = mysqli_query($conn, $sql);
  notifyNewEta($id,$conn);
  header('Location: ../viewToDo.php');
}

?>
