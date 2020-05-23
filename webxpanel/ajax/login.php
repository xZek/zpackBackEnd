<?php
ob_start();
 require_once "./ajax/connect.php";
if(isset($_POST["login"]))
{
 $username = mysqli_real_escape_string($conn, $_POST["username"]);
 $password = mysqli_real_escape_string($conn, $_POST["password"]);
 if($username == "")
 {
   $error = true;
   $errormessage = "Kullanici Adini Giriniz.";
 }
 if($password == "")
 {
   $error = true;
   $errormessage = "Sifre Giriniz.";
 }
 $password_code = hash('sha256', $password);
 $sql = "SELECT * FROM kullanici WHERE username = '".$username."' AND password = '".$password_code."' AND adm>=1";
 $result = mysqli_query($conn, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row > 0)
 {

  $data = mysqli_fetch_array($result);
  $_SESSION["username"] = $data["username"];
    $_SESSION["email"] = $data["email"];
      $_SESSION["ID"] = $data["ID"];
      $_SESSION["adm"] = $data["adm"];
       if($_SESSION["adm"] >= 1)
      {
          $loginsuc=true;
          header("Refresh: 2; url=/webxpanel/panel/dashboard.php");
      }
     
 }
 else{
   $error = true;
   $errormessage = "Giriş Hatalı.";
 }
}
ob_end_flush();
?>
