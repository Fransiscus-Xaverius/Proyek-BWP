<?php

require_once("helper.php");

$getCount = mysqli_query($con, "select count(htrans_id) from htrans");
  $getCount = mysqli_fetch_array($getCount);
  $num = $getCount[0];
  $num++;
  echo $num;
?>