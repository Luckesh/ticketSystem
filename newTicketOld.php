<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>New ticket</h2>
		<form class="signup-form" action="includes/newTicket.inc.php" method="POST">
			<input type="text" name="ucebna" placeholder="Cislo ucebne" required>
			<input type="text" name="pocitac" placeholder="Cislo pocitaca" required>
			<input type="text" name="descr" placeholder="Popis problemu" required>
			<button type="submit" name="submit">Send Ticket</button>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
