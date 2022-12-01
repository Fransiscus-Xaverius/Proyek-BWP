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
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $row['id_sepeda'] . "</td>";
    echo "<td>" . $row['nama_sepeda'] . "</td>";
    echo "<td>" . $row['deskripsi_sepeda'] . "</td>";
    echo "<td>" . $row['harga_sepeda'] . "</td>";
    echo "<td>" . $row['stok_sepeda'] . "</td>";
    echo "<td>" ;
    if($row['status_sepeda'] == 0){
        echo "Tidak Tersedia";
    } else {
        echo "Tersedia";
    };
    echo "</td>";
    echo "<td>";     
        echo "<button class='btn btn-primary' onclick='ganti_status(this)' value='".$row['id_sepeda']."'>Ganti Status</button>";        
    echo "</td>";
    echo "</tr>";
    $no++;
}

?>