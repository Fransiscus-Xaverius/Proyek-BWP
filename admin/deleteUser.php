<?php
require("helper.php");
$id = $_REQUEST['update_id'];
$cari = mysqli_query($con, "select * from customer where id_customer = '".$id."'");
$cari = mysqli_fetch_array($cari);
if($cari['status_customer'] == 0){
    $update = mysqli_query($con, "update customer set status_customer = 1 where id_customer = '".$id."'");
} else {
    $update = mysqli_query($con, "update customer set status_customer = 0 where id_customer = '".$id."'");
}
?>