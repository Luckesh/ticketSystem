<?php require 'includes/cmus.inc.php'; ?>

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


<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
      <div>
        <p>Extremne silna karta je <?php karta("GRN/Tajic, Legion's Edge"); ?>, je to neskutocna pecka. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <?php karta("XLN/Kitesail Freebooter") ?>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <br>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <?php karta("ORI/Act of Treason") ?>
          </p>
      </div>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
