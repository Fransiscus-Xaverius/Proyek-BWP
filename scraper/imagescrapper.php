<?php

$conn = mysqli_connect('localhost', 'root', '', 'db_toko_sepeda');

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

require_once("simple_html_dom.php");

$stmt = $conn->prepare("SELECT * FROM sepeda");
$stmt->execute();
$brng = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
echo count($brng);
$i=0;
foreach ($brng as $key => $value) {
    $content = $value["image_sepeda"];
    $img = 'logo'.$i.'.png'; 
  
// Function to write image into file
    file_put_contents($img, file_get_contents($content));
    $i++;
}

?>
