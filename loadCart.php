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
                                <img src='getImages/".$barang['image_sepeda'].".png' alt='gambar' width='450px'>
                            </div>
                            <div class='col-6 mt-3'>
                                <h3 class='ps-5 fw-bold fs-2'>".$barang['nama_sepeda']."</h3>
                                <h5 class='ps-5'> Harga : ".$barang['harga_sepeda']."</h5>
                                <h5 class='ps-5'> Total : ".$total."</h5>
                                <input type='hidden' name='idCart' value='".$i."'>
                                <div>
                                <h5 class='ps-5'> Jumlah : </h5>
                                <button name='kurang' class='btn btn-primary ms-5' onclick='tambah(this)' jumlah='-1' value='".$i."'>-</button>
                                <input type='text' value='".$cart[$i]['jumlah']."' style='height:40px; width: 50px;'>
                                <button name='tambah' class='btn btn-primary' onclick='tambah(this)' jumlah='1' value='".$i."'>+</button> 
                                </div>  
                                <button name='hapus' class='btn btn-danger ms-5 mt-2' onclick='hapus(this)' value='".$i."'>Delete</button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
        }
    }
?>