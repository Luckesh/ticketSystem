<?php
	session_start();
	if(!isset($_SESSION['u_uid']))
		header("Location: welcome.php")
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
	<nav>
		<div>
			<ul>
				<li><a href="index.php"><img src="images/logo.png" width=55px height=auto alt="spsekeLogo" style="margin-top:2px"></a></li>

				<?php

					echo '<li><a href="newTicket.php">Nové hlásenie</a></li>';
					echo '<li><a href="viewTicket.php">Vaše hlásenia</a></li>';
					if ($_SESSION['u_technik']){
						echo '<li><a href="viewToDo.php">Poruchy na riešenie</a></li>';
					}

				?>
			</ul>
			<div class="nav-login">
				<?php

					if (isset($_SESSION['u_id'])) {
						echo '<table><tr>';
						echo '<td style="padding-top: 15px;">'.htmlspecialchars($_SESSION['u_uid']).'</td>';
						echo '<td><form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form></td></tr></table>';



					}
					else {
						echo '<form action="includes/login.inc.php" method="POST">
							<input type="text" name="uid" placeholder="Username/e-mail">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" name="submit">Login</button>
						</form>
						<a href="signup.php">Sign up</a>';
					}
				?>
			</div>
		</div>
	</nav>
</header>
