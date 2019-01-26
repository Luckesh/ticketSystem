<?php
	include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
    <?php
    	include_once 'includes/viewTicket.inc.php';
    ?>
	</div>

	<div id="mailModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>Môžete poslať správu na e-mail riešiteľa.</p>
				<textarea id="message" rows="8" cols="40" wrap="hard"></textarea>
				<button class = "prettybutton" onclick="sendMail()">Odoslať</button>
		</div>

	</div>


</section>

<script type="text/javascript">



var modal = document.getElementById('mailModal');

var activeTicketId = 0;

// Get the button that opens the modal


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

function sendMail(){
	message = document.getElementById("message").value;
	message = encodeURI(message);
 	//message = message.replace(/\r?\n/g, '<br>');

	var adresa="includes/sendMessage.inc.php?msg="+message+"&id="+activeTicketId+"&returnLocation=viewTicket.php";

	window.location=adresa;
	modal.style.display = "none";


}

// When the user clicks the button, open the modal
function displayModal(id) {
  modal.style.display = "block";
	activeTicketId = id;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



</script>

<?php
	include_once 'footer.php';
?>
