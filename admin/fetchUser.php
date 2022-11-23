<?php
    require("helper.php");
    $allUser = mysqli_query($con, "select * from customer");

    echo "<table border=1>";
    echo "<tr>";
    echo "<th>No</th>";
    echo "<th>ID</th>";
    echo "<th>Nama</th>";
    echo "<th>Username</th>";
    echo "<th>Email</th>";
    echo "<th>Alamat</th>";
    echo "<th>No. Telp</th>";
    echo "<th>Jenis Kelamin</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    $no = 1;
    while ($row = mysqli_fetch_array($allUser)) {
        echo "<tr>";
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
        echo "<td>";
        // echo "<button class='btn btn-primary' onclick='edit(this)' value='".$row['id_customer']."'>Edit</button>";        
        echo "<button class='btn btn-danger' onclick='delete_user(this)' value='".$row['id_customer']."'>Delete</button>";        
        echo "</td>";
        // echo "<td><a href='editUser.php?id=" . $row['id_customer'] . "' class='btn btn-primary'>Edit</a></td>";
        // echo "<td><a href='deleteUser.php?id=" . $row['id_customer'] . "' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
        $no++;
    }
    echo "<table>";
?>