<?php

function notifyNewTicket($ucebna,$pocitac,$descr,$autor,$conn){

  $ucebna='"'.$ucebna.'"';
  $sql="SELECT user_last, user_email FROM ucebne JOIN users ON IDucitel=user_id WHERE ucebna=$ucebna;";
  $result = mysqli_query($conn, $sql);
  $ucitel = mysqli_fetch_assoc($result);

  $sprava="Pan/i ".$ucitel['user_last'] .", \n
v učebni ".$ucebna." na počítači ".$pocitac." je nasledovná porucha: \n'" . $descr .
"'\nHlásiteľ poruchy: " . $autor;

  mail($ucitel['user_email'],'Nová porucha',$sprava, 'From: lpaugsch@gmail.com');

  echo $sprava;

}

function notifySolvedTicket($ucebna,$pocitac,$descr,$autor,$fix,$conn){

  $sql="SELECT user_last, user_email FROM users WHERE user_uid=$autor;";
  $result = mysqli_query($conn, $sql);
  $ucitel = mysqli_fetch_assoc($result);

  $sprava="Pan/i ".$ucitel['user_last'] .", \n
v učebni ".$ucebna." na počítači ".$pocitac." bola vyriešená táto porucha: \n'" . $descr .
"'\nRiešenie: " . $fix;

  mail($ucitel['user_email'],'Vyriešená porucha',$sprava, 'From: lpaugsch@gmail.com');

  echo $sprava;

}

function notifyNewEta($id,$conn){

  include 'niceDate.inc.php';
  $sql="SELECT ucebna_id, pc_id, descr, autor, eta, riesitel FROM tickets
  WHERE IDticket=$id;";
  $result = mysqli_query($conn, $sql);
  $ticket = mysqli_fetch_assoc($result);

  $autor='"'.$ticket['autor'].'"';

  echo $autor;

  $sql="SELECT user_last, user_email FROM users
  WHERE user_uid=$autor;";
  $result = mysqli_query($conn, $sql);
  $ucitel = mysqli_fetch_assoc($result);


  $sprava="Pan/i ".$ucitel['user_last'] .", \n
predpokladané vyriešenie poruchy v učebni ".$ticket['ucebna_id']." na pocitaci ".$ticket['pc_id']." s popisom: \n'" . $ticket['descr'] .
"'\nje : " . niceDate($ticket['eta']);

  mail($ucitel['user_email'],"Nový predpokladaný čas vyriešenia",$sprava, 'From: lpaugsch@gmail.com');

  echo $sprava;
}

function notifyChangeRiesitel($id,$conn,$riesitel,$currentUser,$msg){

  include 'niceDate.inc.php';
  $sql="SELECT ucebna_id, pc_id, descr, autor, eta FROM tickets
  WHERE IDticket=$id;";
  $result = mysqli_query($conn, $sql);
  $ticket = mysqli_fetch_assoc($result);

  $autor='"'.$ticket['autor'].'"';

  echo $autor;
  $sql="SELECT user_last, user_email FROM users
  WHERE user_uid=\"$riesitel\";";
  $result = mysqli_query($conn, $sql);
  $ucitel = mysqli_fetch_assoc($result);


  $sprava="Pan/i ".$ucitel['user_last'] .", \n
bol Vám pridelený ticket v učebni ".$ticket['ucebna_id']." na počítači ".$ticket['pc_id']." s popisom: \n'" . $ticket['descr'] .
"'\nHlásiteľ poruchy: " . $autor . "\nTicket presunuty od: " . $currentUser.
"\nSpráva k prideleniu: " . $msg;

  mail($ucitel['user_email'],'Pridelený ticket',$sprava, 'From: lpaugsch@gmail.com');

  echo $sprava;
}


function messageToRiesitel($id,$conn,$currentUser,$msg){

  include 'niceDate.inc.php';
  $sql="SELECT ucebna_id, pc_id, descr, autor, eta, riesitel FROM tickets
  WHERE IDticket=$id;";
  $result = mysqli_query($conn, $sql);
  $ticket = mysqli_fetch_assoc($result);

  $autor='"'.$ticket['autor'].'"';

  echo $autor;
  echo $ticket['riesitel'];
  $riesitel = $ticket['riesitel'];

  $sql="SELECT user_last, user_email FROM users WHERE user_uid=\"$riesitel\";";

  $result = mysqli_query($conn, $sql);
  $ucitel = mysqli_fetch_assoc($result);

  $sql="SELECT user_last, user_email FROM users
  WHERE user_uid=\"$currentUser\";";
  $result = mysqli_query($conn, $sql);
  $hlasitel = mysqli_fetch_assoc($result);

  


  $sprava=$msg."\n----------------------\nUčebňa: ".$ticket['ucebna_id']."\nPočítač: ".$ticket['pc_id']."\nPopis: ".$ticket['descr'];

  $predmet = $currentUser." Vám poslal správu ohľadom hlásenia";

  mail($ucitel['user_email'],$predmet,$sprava, 'From: '.$hlasitel['user_email']);

  echo $sprava;
}

?>
