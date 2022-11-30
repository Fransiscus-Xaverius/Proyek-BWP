<?php
	require("helper.php");
	$kategori = $_REQUEST['kategori'];

    $query = mysqli_query($con, "select count(*) as 'jumlah' from kategori");
    $row = mysqli_fetch_array($query);
    $id = $row['jumlah'];
    $id = $id + 1;
    $id = "kat_" . $id;
    
    $insert_query = "INSERT INTO kategori VALUES('$id', '$kategori')";
    $res = $con->query($insert_query);
?>