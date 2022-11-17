<?php
session_start();

$dex = 0;

function alert($message)
{
    echo "<script>alert(" . $message . ")</script>";
}

$con = mysqli_connect('localhost', 'root', '', 'db_toko_sepeda');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>