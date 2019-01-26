<?php

function karta($meno)
{
  echo '<span class="hiddentxt">';
  echo substr($meno, 4);
  $meno=str_replace(" ", "_", $meno);
  echo '</span>';
  echo '<span class="hiddenimg">';
  echo '<img src="https://draftsim.com/Images/'.$meno.'.jpg">';
  echo '</span>';
}
?>
