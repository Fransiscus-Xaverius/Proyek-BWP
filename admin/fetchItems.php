<?php
require("helper.php");
$allItem = mysqli_query($con, "select * from sepeda");

echo "<table border=1>";
echo "<tr height = '40px'>";
echo "<th>No</th>";
echo "<th>ID</th>";
echo "<th>Nama</th>";
echo "<th>Deskripsi</th>";
echo "<th>Harga</th>";
echo "<th>Stok</th>";
echo "<th>Status</th>";
echo "<th>Action</th>";
echo "</tr>";
$no = 1;
while($row = mysqli_fetch_array($allItem)){
    
}

?>