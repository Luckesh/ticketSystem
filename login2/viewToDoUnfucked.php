<?php
	include_once 'header.php';
?>
<section class="main-container">
	<div class="main-wrapper">
    <?php
    	include_once 'includes/viewToDo.inc.php';
    ?>
	</div>
</section>
<?php
	include_once 'footer.php';
?>

<div id="solveModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<p>Ak chcete, napiste riesenie problemu</p>
			<textarea id="fixDesc" rows="8" cols="80" wrap="hard"></textarea>
			<button onclick="enterFix()">Vyriesit</button>
	</div>

</div>

<div id="mailModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<p>Napiste svoju spravu</p>
			<textarea id="message" rows="8" cols="80" wrap="hard"></textarea>
			<button onclick="sendMail()">Odoslat</button>
	</div>

</div>

<script>

var solveModal = document.getElementById('solveModal');
var mailModal = document.getElementById('mailModal');

function displayMailModal(id) {
  mailModal.style.display = "block";
	activeTicketId = id;
}

function displaySolveModal(id) {
  solveModal.style.display = "block";
	activeTicketId = id;
}


function enterFix() {
    var txt;
    var fixDesc = message = document.getElementById("fixDesc").value;
    fixDesc = encodeURI(fixDesc);
    var adresa="includes/deleteTicket.inc.php?fix="+fixDesc+"&id="+activeTicketId;
    window.location=adresa;
}

function changeMessage(id) {
    var txt;
    var person = prompt("Prosim napiste spravu novemu riesitelovi:", "Tajne");
		var e = document.getElementById("join");
		var riesitel = e.options[e.selectedIndex].value;
    var res = encodeURI(person);
    var adresa="includes/changeRiesitel.inc.php?msg="+res+"&id="+id+"&riesitel="+riesitel;
    window.location=adresa;

}



var activeTicketId = 0;

// Get the button that opens the modal


// Get the <span> element that closes the modal
var spanSolve = document.getElementsByClassName("close")[0];
var spanMail = document.getElementsByClassName("close")[1];


function sendMail(){
	message = document.getElementById("message").value;
 	message = message.replace(/\r?\n/g, '<br>');

	var adresa="includes/sendMessage.inc.php?msg="+message+"&id="+activeTicketId;

	window.location=adresa;
	mailModal.style.display = "none";
}

// When the user clicks the button, open the modal


// When the user clicks on <span> (x), close the modal
spanSolve.onclick = function() {
  solveModal.style.display = "none";
//	solveModal.style.display = "none";

}

spanMail.onclick = function() {
  mailModal.style.display = "none";
//	solveModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it

window.onclick = function(event) {
  if (event.target == solveModal || event.target == mailModal) {
		solveModal.style.display = "none";
		mailModal.style.display = "none";
  }
}




</script>
