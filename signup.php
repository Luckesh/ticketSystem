<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="Wstyle.css">
</head>
<body>

<header>
</header>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Firstname">
			<input type="text" name="last" placeholder="Lastname">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">

      <?php
      if (isset($_GET['signup'])) {
        if($_GET['signup']=="empty")
        {
          echo '<p class="errorText">Vyplnte všetky polia!</p>';
        }
        else if($_GET['signup']=="email")
        {
          echo '<p class="errorText">Zadajte správny email!</p>';
        }
        else if($_GET['signup']=="usertaken")
        {
          echo '<p class="errorText">Uživateľ s týmto menom už existuje!</p>';
        }
        else if($_GET['signup']=="success")
        {
          echo '<p class="successText">Váš účet je vytvorený. Môžete sa prihlásiť!</p>';
        }
      }
      ?>


			<button type="submit" name="submit">Sign up</button>
		</form>
		<p id="reglog"><a href="welcome.php">Prihlásiť sa</a></p>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
