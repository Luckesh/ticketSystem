<?php

require 'dbh.inc.php';
require 'sendmail.inc.php';

$id = $_GET['id'];
$fix= '"'.$_GET['fix'].'"';
$sql = "SELECT IDticket,ucebna_id, pc_id, descr, autor, submitDate,riesitel,predmet FROM tickets
WHERE IDticket=$id;";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {

 $ucebna_id='"'.$row["ucebna_id"].'"';
 $pc_id='"'.$row["pc_id"].'"';
 $descr='"'.$row["descr"].'"';
 $autor='"'.$row["autor"].'"';
 $submitDate='"'.$row["submitDate"].'"';
 $riesitel='"'.$row["riesitel"].'"';
 $predmet='"'.$row["predmet"].'"';
}

notifySolvedTicket($ucebna_id,$pc_id,$descr,$autor,$fix,$conn);

$sql = "DELETE FROM tickets WHERE IDticket=$id;";
$result = mysqli_query($conn, $sql);


$sql = "INSERT INTO solved_tickets (ucebna_id,pc_id,descr,autor,submitDate,solveDate,fix,riesitel,predmet) VALUES ($ucebna_id,$pc_id,$descr,$autor,$submitDate,CURRENT_TIMESTAMP,$fix,$riesitel,$predmet);";

$bs=gettype($submitDate);
echo $bs;
$bs=gettype($row["submitDate"]);
echo $bs;
$result = mysqli_query($conn, $sql);

header("Location: ../viewToDo.php");
exit();
?>
