<?php
//LOGIN ISLEMI
ob_start();
 require_once "../../ajax/connect.php";
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
 $sql = "SELECT * FROM kullanici WHERE username = '".$username."' AND password = '".$password_code."'";
 $result = mysqli_query($conn, $sql);
 $num_row = mysqli_num_rows($result);
 if($num_row > 0)
 {

  $data = mysqli_fetch_array($result);
  $_SESSION["username"] = $data["username"];
  $_SESSION["email"] = $data["email"];
  $_SESSION["ID"] = $data["ID"];
  $_SESSION["adm"] = $data["adm"]; //CHAT YETKILENDIRME
  $_SESSION["confirm"] = $data["confirm"];
  if(!$_SESSION["confirm"])
  {
    $error = true;
    $errormessage = "Mail i onaylayınız.";
  }
  else{
      $loginsuc=true;
  header("Refresh:3; url=/web/dashboard/");

}

}else{
   $error = true;
   $errormessage = "Kullanici Adi veya Şifre Hatali.";
 }
}
ob_end_flush();
?>
