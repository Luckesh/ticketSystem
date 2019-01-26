<?php

function getUcebnaList(){
  require 'dbh.inc.php';
  $sql = "SELECT ucebna FROM ucebne;";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)) {

    echo "<option value=".$row['ucebna'].">".$row['ucebna']."</option>";

  }

}
function getTechnikList($currentUser){
  require 'dbh.inc.php';
  $sql = "SELECT user_uid FROM users WHERE technik=1 AND user_uid!=$currentUser;";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)) {

    echo "<option value=".$row['user_uid'].">".$row['user_uid']."</option>";

  }

}


?>
