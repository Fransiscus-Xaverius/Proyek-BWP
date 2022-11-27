<?php
$kategori = 0;
                $merk = 0;
                if(isset($_POST['MTB'])){ $MTB = $_POST['MTB']; $kategori += 1;
                } else { $MTB = ""; }
                if(isset($_POST['Urban'])){ $Urban = $_POST['Urban']; $kategori += 1
                } else { $Urban = ""; }
                if(isset($_POST['BMX'])){ $BMX = $_POST['BMX']; $kategori += 1
                } else { $BMX = ""; }
                if(isset($_POST['Junior'])){ $Junior = $_POST['Junior']; $kategori += 1
                } else { $Junior = ""; }
                if(isset($_POST['Electric'])){ $Electric = $_POST['Electric']; $kategori += 1
                } else { $Electric = ""; }
                
                if(isset($_POST['Polygon'])){ $Polygon = $_POST['Polygon']; $merk += 1
                } else { $Polygon = ""; }
                if(isset($_POST['Wimcycle'])){ $Wimcycle = $_POST['Wimcycle'];$merk += 1
                } else { $Wimcycle = ""; }
                if(isset($_POST['KONA'])){ $KONA = $_POST['KONA'];$merk += 1
                } else { $KONA = ""; }
                $min = $_POST['min'];
                $max = $_POST['max'];

                $_SESSION['iniFilter'] = [
                  'MTB' => $MTB,
                  'Urban' => $Urban,
                  'BMX' => $BMX,
                  'Junior' => $Junior,
                  'Electric' => $Electric,
                  'Polygon' => $Polygon,
                  'Wimcycle' => $Wimcycle,
                  'KONA' => $KONA,
                  'min' => $min,
                  'max' => $max
                ];  
                if($kategori > 0 && $merk > 0 && $min != "" && $max != ""){
                  
                } else if ($kategori > 0 && $merk > 0 && $min != ""){
                } else if ($kategori > 0 && $merk > 0 && $max != ""){

                }

                $result = $con->query("select * from sepeda where '".$kategori."' and '".$merk."' and harga_sepeda between ".$min." and ".$max." and status_sepeda = 1 and stok_sepeda > 0 LIMIT 12 OFFSET ".$dex);