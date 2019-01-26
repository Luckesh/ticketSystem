<?php
	session_start();
	//We then check if the user has clicked the signup button
	if (isset($_POST['submit'])) {

		//Then we include the database connection
		include_once 'dbh.inc.php';
		include_once 'sendmail.inc.php';
		//And we get the data from the signup form
		$ucebna = $_POST['ucebna'];
		$pocitac = $_POST['pocitac'];
		$descr = $_POST['descr'];
		$autor= $_SESSION['u_uid'];
		$priority= $_POST['priority'];
		$deadline= $_POST['deadline'];
		$predmet= $_POST['predmet'];

		if(empty($ucebna)){
			header("Location: ../newTicket.php?submission=emptyucebna");
			exit();
		}

		$sql = "SELECT user_uid FROM ucebne
		JOIN users ON ucebne.IDucitel=user_id
		WHERE ucebna=\"$ucebna\";";

		echo $sql;

		$result = mysqli_query($conn, $sql);

		$riesitel = mysqli_fetch_assoc($result);

		$riesitel = $riesitel['user_uid'];

    $stmt2 = mysqli_stmt_init($conn);
    $sql = "INSERT INTO tickets (ucebna_id, pc_id, descr, autor, submitDate, riesitel, predmet, priority, deadline) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?, ?, ?);";

    if(!mysqli_stmt_prepare($stmt2, $sql)) {
				header("Location: ../index.php?submission=error");
        exit();
    } else {

      mysqli_stmt_bind_param($stmt2, "ssssssss", $ucebna, $pocitac, $descr, $autor, $riesitel, $predmet, $priority, $deadline);

      mysqli_stmt_execute($stmt2);
			notifyNewTicket($ucebna,$pocitac,$descr,$autor,$conn);
      header("Location: ../newTicket.php?submission=success");
      exit();

}
}
?>
