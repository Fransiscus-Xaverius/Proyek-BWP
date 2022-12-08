<?php
    require("helper.php");
    $cart = $_SESSION['cart'];
    $temp = $_REQUEST['id'];
    for ($i=0; $i < sizeof($cart); $i++) { 
        if($cart[$i]['idUser'] == $temp){
            $barang = mysqli_fetch_array(mysqli_query($con, "select * from sepeda where id_sepeda = '".$cart[$i]['idBarang']."'"));
            $total = $barang['harga_sepeda'] * $cart[$i]['jumlah'];
            echo "
            <div class='container'>
                <div class='row'>
                    <div class='col-12 mb-3' style='border : 1px solid black; border-radius : 10px;'>
                        <div class='row'>
                            <div class='col-6'>
                                <img src='getImages/".$barang['image_sepeda']."' alt='gambar' width='450px'>
                            </div>
                            <div class='col-6 mt-3'>
                                <table class = 'ms-5'>
                                    <tr><th colspan=3 class=''><h3 class='fw-bold fs-2'>".$barang['nama_sepeda']."</h3></th></tr>
                                    <tr>
                                        <td><h5 class=''> Harga </h5></td>
                                        <td><h5 class=''> : </h5></td>
                                        <td><h5 class='text-end'>".number_format($barang['harga_sepeda'], 0, ',', '.')."</h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5 class=''> Total </h5></td>
                                        <td><h5 class=''> : </h5></td>
                                        <td><h5 class='text-end'>".number_format($total, 0, ',', '.')."</h5></td>
                                    </tr>
                                    <input type='hidden' name='idCart' value='".$i."'>
                                    <tr>
                                        <td><h5 class=''> Jumlah </h5></td>
                                        <td><h5 class=''> : </h5></td>
                                    </tr>
                                    <tr>
                                        <td colspan=3>
                                            <button name='kurang' class='btn btn-primary' onclick='tambah(this)' jumlah='-1' value='".$i."'>-</button>
                                            <input type='text' value='".$cart[$i]['jumlah']."' style='height:40px; width: 50px;'>
                                            <button name='tambah' class='btn btn-primary' onclick='tambah(this)' jumlah='1' value='".$i."'>+</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan=3>
                                            <button name='hapus' class='btn btn-danger mt-2' onclick='hapus(this)' value='".$i."'>Delete</button> 
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }
?>