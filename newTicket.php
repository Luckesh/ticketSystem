

<?php
	include_once 'header.php';
	include 'includes/getList.inc.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Nové hlásenie</h2>
		<form class="signup-form" id="join" action="includes/newTicket.inc.php" method="POST" onsubmit="return tickedValidation()">
			<select name="ucebna" id="ucebnaselect" class="soflow" form="join" required>
					<option value="">Vyberte učebňu</option>
					<?php
					getUcebnaList();
					?>
			</select>
			<input type="text" name="pocitac" placeholder="Číslo pocitaca" required>
			<input type="text" name="predmet" placeholder="Predmet" required>
			<textarea rows="4" cols="30" name="descr" placeholder="Popis problému" id="descr" required></textarea>
			<select id="prio" class="soflow" name="priority" required>
				<option value="">Vyberte prioritu</option>
				<option value="Nízka">Nízka</option>
				<option value="Stredná">Stredná</option>
				<option value="Vysoká">Vysoká</option>
			</select>
			<div class="tooltip">
				<img src="images/questiontag.png" alt="napoveda" width="25px" height="25px" >
  			<span class="tooltiptext">
						Nízka - nebráni používaniu, malá nepríjemnosť <br>
						Stredná - bráni používaniu, ale vyriešenie nesúri <br>
						Vysoká - bráni používaniu a vyžaduje sa oprava do daného termínu (určte prosím termín)
				</span>
			</div>

			<input id="ddline" type="datetime-local" value="<?php echo date("Y-m-d",time())."T".date("H:i",time());?>" name="deadline" required>

			<?php
			if (isset($_GET['submission'])) {
				if($_GET['submission']=="error")
				{
					echo '<p class="errorText">Niečo sa pokazilo, skúste ešte raz.</p>';
				}
				else if($_GET['submission']=="success")
				{
					echo '<p class="successText">Hlásenie bolo úspešne odoslané.</p>';
				}
			}
			?>

			<button type="submit" name="submit">Odoslať</button>


		</form>
	</div>



</section>

<script type="text/javascript">

const source = document.querySelector("#prio");
const target = document.querySelector("#ddline");

const displayWhenSelected = (source, value, target) => {
    const selectedIndex = source.selectedIndex;
    const isSelected = source[selectedIndex].value === value;
    target.classList[isSelected
        ? "add"
        : "remove"
    ]("show");
};
source.addEventListener("change", (evt) =>
    displayWhenSelected(source, "Vysoká", target)
);

function validateForm() {
  var x = document.forms["join"]["ucebna"].value;
  if (x == "") {
    alert("zabudol si ucebnu ty kokot");
    return false;
  }

}

</script>

<?php
	include_once 'footer.php';
?>
