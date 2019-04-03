<?php

function niceDate($datum){

  if (strtotime($datum) >= strtotime("today") and strtotime($datum) <= strtotime("tomorrow"))
    return "Dnes o ". date_format(new DateTime($datum),"H:i");
  else if (strtotime($datum) >= strtotime("yesterday") and strtotime($datum) <= strtotime("today"))
    return "Včera o ". date_format(new DateTime($datum),"H:i");
  else if (strtotime($datum) >= strtotime("tomorrow") and strtotime($datum) <= strtotime("tomorrow+1 day"))
    return "Zajtra o ". date_format(new DateTime($datum),"H:i");
  else
    return date_format(new DateTime($datum),"d.m.Y H:i");

}

 ?>
