<?php
	require("helper.php");
	$brand = $_REQUEST['Brand'];

	$query = mysqli_query($con, "select count(*) as 'jumlah' from merk");
    $row = mysqli_fetch_array($query);
    $id = $row['jumlah'];
    $id = $id + 1;
    $id = "merk_" . $id;
    
    $insert_query = "INSERT INTO merk VALUES('$id', '$brand')";
    $res = $con->query($insert_query);
?>