<?php
    require("helper.php");

    $allTrans = mysqli_query($con, "SELECT * from htrans h, customer c where h.id_customer = c.id_customer");

    echo "<table border=1>";
    echo "<tr height = '40px'>";
    echo "<th>No</th>";
    echo "<th>ID Transaksi</th>";
    echo "<th>ID Customer</th>";
    echo "<th>Nama Customer</th>";
    echo "<th>Harga Total</th>";
    echo "<th>Tanggal Transaksi</th>";
    echo "<th>Order ID</th>";
    echo "<th>Detail Transaksi</th>";
    echo "</tr>";
    $no = 1;
    while($row = mysqli_fetch_array($allTrans)){
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $row['htrans_id'] . "</td>";
        echo "<td>" . $row['id_customer'] . "</td>";
        echo "<td>" . $row['nama_customer'] . "</td>";
        echo "<td> Rp. " . number_format($row['harga_total'], 0, ',', '.') . "</td>";        
        echo "<td>" . $row['h_date'] . "</td>";
        echo "<td>" . $row['order_id'] . "</td>";
        echo "<td>";     
            echo "<button class='btn btn-primary' onclick='details(this)' value='".$row['htrans_id']."'>Details</button>";        
        echo "</td>";
        echo "</tr>";
        $no++;
    }
?>