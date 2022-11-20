<?php 
require('helper.php');
unset($_SESSION["login"]);
$username = "";
$pass = "";
$error = "";
$success = "";

if(isset($_POST['login'])){
  if(isset($_POST['unameEmail']) && isset($_POST['pass'])){
    $username = $_POST['unameEmail'];
    $pass = $_POST['pass'];
    if($username == "" || $pass == ""){
      $error = "Data tidak boleh ada yang kosong";
    } else {
      if($username == "admin" && $username == "admin"){
        echo "<script>LOGIN AS ADMIN</script>";
      } else {
        $kueri = mysqli_query($con, "select * from customer where email_customer = '". $username . "' or username_customer = '".$username."'");
        $result_row = mysqli_fetch_array($kueri);
        if(!$result_row){
          $error = "Username/Email tidak terdaftar";
        } else {
          if($result_row['status_customer'] == 1){
            if ($result_row['password_customer'] == $pass) {
              $_SESSION["login"] = $result_row['id_customer'];
              // echo "<script>LOGIN AS USER</script>";
              header("Location: homeUser.php");
              // header("Location: index.php");
            } else {  
              $error = "Password salah";
            }
          } else {
            $error = "User ini sudah tidak aktif";
          }
        }
      }
    }
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <style>
        .success {
            color: green;
            margin-left : 80px;
            text-align : center;
        }

        .error {
            color: red;
            margin-left : 80px;
            text-align : center;
        }
    </style>
  </head>
  <body>
    <form action="" method="post">
      <div class="containers row">
        <div class="kiri col-5" data-tilt>
          <img src="assets/img.png" alt="img" id="image" class="justify-content-center d-flex ">
        </div>
        <div class="kanan col-5">
          <div class="judul text-center">Login</div>
            <div class="masuk validate-input">
              <span class="focusInput text-center" >Username / Email</span>
    					<input class="input100 text-center" type="text" name="unameEmail">
		    		</div>
				    <div class="masuk validate-input" data-validate="Enter password">
				      <span class="focusInput text-center" >Password</span>	
              <input class="input100 text-center" type="password" name="pass">
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
              <button class="loginBtn" type="submit" name="login">Login</button>
              <div class="daftar">
                Don't have account?
                <button type="submit" name="Register" formaction="register.php">
                  Create Account &rarr;
                </button>
                <button type="submit" name="back" formaction="register.php">
                  Back to Homepage. &rarr;
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>