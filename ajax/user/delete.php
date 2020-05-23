<?php


$servername = "localhost";
$username = "root";
$password = "";
$db="txt_online";
	$conn = mysqli_connect($servername, $username, $password,$db);
  if (!$conn) {
     echo "<div class='alert alert-danger' role='alert'>";
      die("Bağlantı Hatasi: " . mysqli_connect_error());
      echo "</div>";
  }

  session_start();
  if(!isset($_SESSION["username"]))
  {
   //header("location: /web/login/");
  }

$UID = $_SESSION['ID'];
$id=$_POST["id"];

  $sil = "DELETE FROM txt_user WHERE autoID='$id' AND fromID='$UID'";
  $calistir= mysqli_query($conn,$sil);
  if($calistir)
 {
   echo "BASARI";
 }else{
 echo "HATA";
 }
          ?>
