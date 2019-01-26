<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="Wstyle.css">
</head>
<body>

<header>
</header>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Prihlásenie</h2>
		<form class="signup-form" action="includes/login.inc.php" method="POST">
			<input type="text" name="uid" placeholder="Prihlasovacie meno">
			<input type="password" name="pwd" placeholder="Heslo">


      <?php
      if(isset($_GET['login']))
      {
        if($_GET['login']=="error")
        {
          echo '<p class="errorText">Nesprávne meno alebo heslo!</p>';
        }
      }

       ?>

			<button type="submit" name="submit">Prihlásiť sa</button>
		</form>
    <p id="reglog"><a href="signup.php">Registrovať sa</a></p>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
