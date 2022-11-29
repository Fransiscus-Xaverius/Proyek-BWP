<?php
    require("helper.php");
    $allUser = mysqli_query($con, "select * from customer");

    echo "<table border=1>";
    echo "<tr height = '40px'>";
    echo "<th>No</th>";
    echo "<th>ID</th>";
    echo "<th>Nama</th>";
    echo "<th>Username</th>";
    echo "<th>Email</th>";
    echo "<th>Alamat</th>";
    echo "<th>No. Telp</th>";
    echo "<th>Jenis Kelamin</th>";
    echo "<th>Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    $no = 1;
    while ($row = mysqli_fetch_array($allUser)) {
        if($row['status_customer'] == 0){
            echo "<tr style = 'background-color:salmon; height:45px;'>";
        } else {
            echo "<tr style = 'background-color:lightgreen;height:45px;'>";
        }
        echo "<td>" . $no . "</td>";
        echo "<td>" . $row['id_customer'] . "</td>";
        echo "<td>" . $row['nama_customer'] . "</td>";
        echo "<td>" . $row['username_customer'] . "</td>";
        echo "<td>" . $row['email_customer'] . "</td>";
        echo "<td>" . $row['alamat_customer'] . "</td>";
        echo "<td>" . $row['noTelp_customer'] . "</td>";
        echo "<td>";
        if($row['jk_customer'] == 0){
            echo "Laki-laki";
        } else {
            echo "Perempuan";
        };
        echo "</td>";
        
        if($row['status_customer'] == 0){
            echo "<td>";
            echo "Non-Aktif";
            echo "</td>";
        } else {
            echo "<td>";
            echo "Aktif";
            echo "</td>";
        };
        
        echo "<td>";     
        echo "<button class='btn btn-primary' onclick='delete_user(this)' value='".$row['id_customer']."'>Ganti Status</button>";        
        echo "</td>";
        echo "</tr>";
        $no++;
    }
    echo "<table>";
?>