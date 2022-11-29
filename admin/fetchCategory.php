<?php
require("helper.php");
$allCategory = mysqli_query($con, "select * from kategori");
echo "<table border=1>";
echo "<tr height = '40px'>";
echo "<th>No</th>";
echo "<th>ID</th>";
echo "<th>Nama</th>";
// echo "<th>Action</th>";
echo "</tr>";
$no = 1;
while ($row = mysqli_fetch_array($allCategory)) {
    echo "<tr style = 'height:45px;'>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $row['id_kategori'] . "</td>";
    echo "<td>" . $row['nama_kategori'] . "</td>";
    echo "</tr>";
    $no++;
}

?>