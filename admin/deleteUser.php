<?php
require("helper.php");
$id = $_REQUEST['update_id'];
$delete = mysqli_query($con, "delete from customer where id_customer = '".$id."'");
?>