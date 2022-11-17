<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_toko_sepeda';
$port = '3306';
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_errno) {
    die("gagal connect : " . $conn->connect_error);
    echo "<script>alert('Connect Gagal')</script>";
}

$q = "SELECT COUNT(*) from sepeda";
$hasil = mysqli_query($conn,$q);
$temp = $hasil->fetch_assoc();
$count = $temp["COUNT(*)"];
for ($i=0; $i < (int)$count; $i++) { 
    $query = "UPDATE sepeda SET image_sepeda='logo".$i."' WHERE id_sepeda = 'spd_".$i."'";
    echo $query."<br>";
    if ($conn->query($query) === TRUE) {
        echo "('Berhasil alter!')";
    }
}

?>