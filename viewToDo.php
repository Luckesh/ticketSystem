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
		<h2>Môžete pridať riešenie problému (nepovinné)</h2>
			<textarea id="fixDesc" rows="8" cols="80" wrap="hard"></textarea>
			<button class = "prettybutton" onclick="enterFix()">Vyriešiť</button>
	</div>

</div>

<div id="mailModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
		<h2>Môžete poslať správu na e-mail hlásiteľa.</h2>
			<textarea id="message" rows="8" cols="80" wrap="hard"></textarea>
			<button class = "prettybutton" onclick="sendMail()">Odoslať</button>
	</div>

</div>

<div id="changeModal" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>

		<h2>Komu chcete presunúť ticket?</h2>
		<select class="soflow" name="" id="join">
			<?php
				getTechnikList($currentUser);
			 ?>
		</select>

		<h2>Napíšte prosím správu k presunu</h2>
			<textarea id="changeMessage" rows="8" cols="80" wrap="hard"></textarea>
			<button class = "prettybutton" onclick="changeRiesitel()">Presunúť</button>
	</div>

</div>

<script>

var activeTicketId = 0;
var activeModal = 0;

var modals = document.getElementsByClassName('modal');
var spans = document.getElementsByClassName("close");


function displayModal(id,activeModal) {  //0-solve, 1-smail, 2-move
  modals[activeModal].style.display = "block";
	activeTicketId = id;
}

function enterFix() {
    var txt;
    var fixDesc = message = document.getElementById("fixDesc").value;
    fixDesc = encodeURI(fixDesc);
    var adresa="includes/deleteTicket.inc.php?fix="+fixDesc+"&id="+activeTicketId;
    window.location=adresa;
}

function changeRiesitel() {

		var message = document.getElementById("changeMessage").value;
		var e = document.getElementById("join");
		var riesitel = e.options[e.selectedIndex].value;
    message = encodeURI(message);
    var adresa="includes/changeRiesitel.inc.php?msg="+message+"&id="+activeTicketId+"&riesitel="+riesitel;
    window.location=adresa;

}




// Get the button that opens the modal


// Get the <span> element that closes the modal


function sendMail(){
	message = document.getElementById("message").value;
 	message = message.replace(/\r?\n/g, '<br>');

	var adresa="includes/sendMessage.inc.php?msg="+message+"&id="+activeTicketId+"&returnLocation=viewToDo.php";

	window.location=adresa;
}

// When the user clicks the button, open the modal


// When the user clicks on <span> (x), close the modal



window.onload = function(){
	spans[0].onclick = function() {
		modals[0].style.display = "none";
	}

	spans[1].onclick = function() {
		modals[1].style.display = "none";
	}
	spans[2].onclick = function() {
		modals[2].style.display = "none";
	}
};



// When the user clicks anywhere outside of the modal, close it

window.onclick = function(event) {
  if (event.target == modals[0] || event.target == modals[1] || event.target == modals[2]) {
		modals[0].style.display = "none";
		modals[1].style.display = "none";
		modals[2].style.display = "none";
  }
}



</script>
