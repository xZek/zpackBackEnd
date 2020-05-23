s<?php

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
$procces =  "Anonim yazi Silme";
$who_didthis  = $_SESSION['username'];
$reason = $_POST["reason"];
  $sil = "DELETE FROM txt_anonim WHERE ID='$id'";
  $calistir= mysqli_query($conn,$sil);
  if($calistir)
 {

    $ekle = "INSERT INTO `activity_log`( `userID`, `procces`, `who_didthis`)
         VALUES ('$UID','$procces','$who_didthis')";
   $kaydet= mysqli_query($conn,$ekle);
   echo "BASARI";
 }else{
 echo "HATA";
 }

 ?>
