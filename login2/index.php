<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">

		<h2>Home</h2>
		<?php
		#	if (isset($_SESSION['u_id'])) {
				header("Location: newTicket.php");  # INDEX nic nerobi, iba presmeruje na new ticket ak je prihlaseny
		#	}else {																# ak nie je prihlaseny, header ho sem nepusti, posle ho na login screen
		#		echo "daco";
			#	}
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>
