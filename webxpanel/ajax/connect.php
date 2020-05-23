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


  $errormessage=null;
  $error=null;
  $succes2=null;
  $succes=null;
  $loginsuc=null;
  $register=null;
  $send_contact=null;
?>
