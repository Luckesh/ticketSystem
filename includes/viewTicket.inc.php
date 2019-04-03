<?php

require 'dbh.inc.php';
require 'niceDate.inc.php';



$currentUser='"'.$_SESSION['u_uid'].'"';

$sql = "SELECT IDticket,ucebna_id, autor, pc_id, descr, submitDate,eta,riesitel, deadline, predmet, priority FROM tickets
WHERE autor=$currentUser
ORDER BY IDticket DESC;";
$result = mysqli_query($conn, $sql);


if ($result->num_rows > 0) {
  echo "<h2>Vaše hlásenia</h2>";

    while($row = mysqli_fetch_assoc($result)) {



      echo '<div class="ticket">';
      echo '<div class="statusBox">';
      echo '<ul>';
      echo '<li>id:'.$row['IDticket'].'</li>';
      echo '<li class="status">nový</li>';
      echo '</ul>';
      echo '</div>';
      echo '<div class="lowerBoxUserNew">';
      echo '<div class="lowerBoxAuthor">';
      echo '<p class="tip">Autor:</p>';
      echo '<p>'.$row['autor'].'</p>';
      echo '</div>';
      echo '<div class="lowerBoxSolver">';
      echo '<p class="tip">Riešiteľ:</p>';
      echo '<p>'.$row['riesitel'].'</p>';
      echo '</div>';
      echo '<div class="lowerBoxPriority">';
      echo '<p class="tip">Priorita:</p>';
      echo '<p>'.$row['priority'].'</p>';
      echo '</div>';
      echo '<div class="lowerBoxDue">';
      echo '<p class="tip">Oprava do:</p>';
      echo '<p>'.niceDate($row['deadline']).'</p>';
      echo '</div>';
      echo '<div class="lowerBoxIcon">';
      echo '<p class="tip">Kontakt:</p>';
      echo '<button class="mailBtn" onclick="displayModal('.$row["IDticket"].')"></button>';
      echo '</div>';
      echo '</div>';

      echo '<div class="topBox">';
      echo '<div class="nameBox">';
      echo '<h1>'.$row['predmet'].'</h1>';
      echo '</div>';
      echo '<div class="ucebnaBox">';
      echo '<img src="../img/classicon.png" alt="" title="učebňa" height="30px" width="30px">';
      echo '</div>';
      echo '<div class="ucebnaBox2">';
      echo '<p>'.$row['ucebna_id'].'</p>';
      echo '</div>';
      echo '<div class="pocitacBox">';
      echo '<img src="../img/pcicon.png" alt="" title="počítač" height="30px" width="30px">';
      echo '</div>';
      echo '<div class="pocitacBox2">';
      echo '<p>'.$row['pc_id'].'</p>';
      echo '</div>';



      echo '</div>';

      echo '<div class="descBox">';
      echo '<p> '.$row['descr'].' </p>';
      echo '</div>';
      echo '<div class="updateBox">';
      echo '<ul>';
      echo '<li class="tip">Ohlásené:</li>';
      echo '<li>'.niceDate($row['submitDate']).'</li>';
      echo '</ul>';
      echo '</div>';
      echo '</div>';
  }

} else {
    echo "<h2>Nemáte žiadne aktívne hlásenia</h2>";
}


$sql = "SELECT IDticket,ucebna_id, autor, pc_id, descr, submitDate,riesitel,predmet, solveDate, fix FROM solved_tickets
WHERE autor=$currentUser
ORDER BY IDticket DESC;";
$result = mysqli_query($conn, $sql);


if ($result->num_rows > 0) {
  echo "<h2>Vyriešené hlásenia</h2>";

    while($row = mysqli_fetch_assoc($result)) {

      echo '<div class="ticket">';
      echo '<div class="statusBox">';
      echo '<ul>';
      echo '<li>id:'.$row['IDticket'].'</li>';
      echo '<li class="status">nový</li>';
      echo '</ul>';
      echo '</div>';
      echo '<div class="lowerBoxDone">';
      echo '<div class="lowerBoxAuthor">';
      echo '<p class="tip">Autor:</p>';
      echo '<p>'.$row['autor'].'</p>';
      echo '</div>';
      echo '<div class="lowerBoxSolver">';
      echo '<p class="tip">Riesitel:</p>';
      echo '<p>'.$row['riesitel'].'</p>';
      echo '</div>';
      echo '<div class="lowerBoxDue">';
      echo '<p class="tip">Opravené:</p>';
      echo '<p>'.niceDate($row['solveDate']).'</p>';
      echo '</div>';
      echo '</div>';

      echo '<div class="topBox">';
      echo '<div class="nameBox">';
      echo '<h1>'.$row['predmet'].'</h1>';
      echo '</div>';
      echo '<div class="ucebnaBox">';
      echo '<img src="../img/classicon.png" alt="" title="učebňa" height="30px" width="30px">';
      echo '</div>';
      echo '<div class="ucebnaBox2">';
      echo '<p>'.$row['ucebna_id'].'</p>';
      echo '</div>';
      echo '<div class="pocitacBox">';
      echo '<img src="../img/pcicon.png" alt="" title="počítač" height="30px" width="30px">';
      echo '</div>';
      echo '<div class="pocitacBox2">';
      echo '<p>'.$row['pc_id'].'</p>';
      echo '</div>';

      echo '</div>';


      echo '<div class="descBox">';
      echo '<p> '.$row['descr'].' </p>';
      echo '<p><i> Oprava:'.$row['fix'].' </i></p>';
      echo '</div>';
      echo '<div class="updateBox">';
      echo '<ul>';
      echo '<li class="tip">Ohlásené:</li>';
      echo '<li>'.niceDate($row['submitDate']).'</li>';
      echo '</ul>';
      echo '</div>';
      echo '</div>';
  }

} else {
    #echo "Nemáte žiadne aktívne hlásenia";
}


?>
