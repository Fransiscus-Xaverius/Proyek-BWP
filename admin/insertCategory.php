<?php
	require("helper.php");
	$kategori = $_REQUEST['kategori'];

	$query = mysqli_query($con, "select id_kategori from kategori order by id_kategori desc limit 1");
    $row = mysqli_fetch_array($query);
    $id = $row['id_kategori'];
    $id = substr($id, 4);
    $id = (int)$id;
    $id = $id + 1;
    $id = "kat_" . $id;
    
    $insert_query = "INSERT INTO kategori VALUES('$id', '$kategori')";
    $res = $con->query($insert_query);
?>