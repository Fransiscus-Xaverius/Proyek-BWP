<?php
require("helper.php");
$id = $_REQUEST['update_id'];
$cari = mysqli_query($con, "select * from sepeda where id_sepeda = '".$id."'");
$cari = mysqli_fetch_array($cari);
if($cari['status_sepeda'] == 0){
    $update = mysqli_query($con, "update sepeda set status_sepeda = 1 where id_sepeda = '".$id."'");
} else {
    $update = mysqli_query($con, "update sepeda set status_sepeda = 0 where id_sepeda = '".$id."'");
}
?>