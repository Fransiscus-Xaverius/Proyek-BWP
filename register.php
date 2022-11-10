<?php
require('helper.php');

$username = "";
$email = "";
$fullName = "";
$pass = "";
$confirmPass = "";
$jk = "";
$alamat = "";
$noTelp = "";

$error = "";
$success = "";

if(isset($_POST['register'])){
  if(isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['iniEmail']) && isset($_POST['pass']) && isset($_POST['confpass']) && isset($_POST['jk']) && isset($_POST['alamat']) && isset($_POST['notelp'])){
    $username = $_POST['username'];
    $email = $_POST['iniEmail'];
    $fullName = $_POST['fname'];
    $pass = $_POST['pass'];
    $confirmPass = $_POST['confpass'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $noTelp = $_POST['notelp'];

    if($username == "" || $email == "" || $fullName == "" || $pass == "" || $confirmPass == "" || $jk == "" || $alamat == "" || $noTelp == ""){
       $error = "Data tidak boleh ada yang kosong";
    } else {
      if($username == "admin"){
        $error = "Username tidak boleh admin";
      } else {
        $kueri = mysqli_query($con, "select * from customer where email_customer = '". $email . "' or username_customer = '" .$username . "'");
        $result_row = mysqli_fetch_array($kueri);
        if($result_row){
          $error = "Username/Email sudah terdaftar";
        } else {
          if($pass != $confirmPass){
            $error = "Password dan Confirm Password tidak sesuai";
          } else {
            $kueri = mysqli_query($con, "select id_customer from customer order by id_customer desc limit 1");
            $result_row = mysqli_fetch_array($kueri);
              if ($result_row != NULL) {
                $temp = substr($result_row['id'], 2, 3);
                $id = (int)$temp + 1;
              } else {
                $id = 1;
              }
              $id = "US" . str_pad($id, 3, "0", STR_PAD_LEFT);
              $kueri = mysqli_query($con, "insert into customer values('" . $id . "', '" . $username . "', '" . $email . "', '" . $pass . "', '" . $fullName . "', '" . $jk .  "', '" . $alamat . "', '" . $noTelp . "', 1 )");
              if(!$kueri){
                $error = "Gagal mendaftar";
              } else {
                $success = "Berhasil mendaftar";
              }
          }
        }
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="style3.css">
  <style>
    .success {
      color: green;
      text-align : center;
    }

    .error {
      color: red;
      text-align : center;
    }
  </style>
</head>
<body>
  <form action="" method="post">
    <div class="containers">
      <div class="judul">Register</div>
        <div class="kanan ms-4">
          <div class="masuk validate-input">
            <span class="focusInput text-center">Username</span>
            <input class="input100 text-center" type="text" name="username">
          </div>
          <div class="masuk validate-input">
            <span class="focusInput text-center">Full Name</span>
            <input class="input100 text-center" type="text" name="fname">
          </div>
          <div class="masuk validate-input">
            <span class="focusInput text-center">Email</span>
            <input type="email" name="iniEmail" id="" class="input100 text-center">
          </div>
          <div class="masuk validate-input">
            <span class="focusInput text-center">Password</span>
            <input class="input100 text-center" type="password" name="pass">
          </div>
          <div class="masuk validate-input">
            <span class="focusInput text-center">Confirm Password</span>
            <input class="input100 text-center" type="password" name="confpass">
          </div>
          <div class="masuk validate-input">
            <span class="focusInput text-center">Alamat</span>
            <input class="input100 text-center" type="text" name="alamat">
          </div>
          <div class="masuk validate-input">
            <span class="focusInput text-center">No. Telp</span>
            <input class="input100 text-center" type="text" name="notelp">
          </div>
          <div class="validate-input masuks">
            <span class="focusInput text-center">Jenis Kelamin</span>
            <div class="row pt-5 ps-5 justify-content-center">
              <div class="col-8 hai">
                <input type="radio" name="jk" id="aa" value="0" checked>&nbsp;Pria&nbsp;&nbsp;&nbsp;
                <input type="radio" name="jk" id="ac" value="1">&nbsp;Wanita
              </div>
            </div>
          </div>
          <div class="success">
            <?php
              if (isset($success)) {
                if (strlen($success) > 0) {
                  echo $success;
                }
              }
            ?>
          </div>
          <div class="error">
            <?php
              if (isset($error)) {
                if (strlen($error) > 0) {
                  echo $error;
                }
              }
            ?>
          </div>
          <div class="btns">
            <button class="registBtn" type="submit" name="register">Register</button>
            <div class="daftar">
              <label style="margin-left:-40px; margin-top:10px">Already Have Account? </label><br>
              <button type="submit" name="login" formaction="login.php">Sign In &rarr;</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>