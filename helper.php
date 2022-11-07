<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "db_toko_sepeda");

    if(mysqli_connect_errno()){
        echo mysqli_error($conn);
    }

    function iniAlert($message){
        echo "<script>";
        echo "alert($message)";
        echo "</script>";
    }
?>