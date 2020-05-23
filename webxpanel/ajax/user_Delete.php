<?php
//VERITABANI BAGLANTISI
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
$UID = $_SESSION['ID'];
$ID=$_POST["id"];
$procces =  "Hesap Silme Islemi";
$who_didthis  = $_SESSION['username'];
  $sil = "DELETE FROM kullanici WHERE ID='$ID'";  // ID İLE VERITABANINDA TABLOYU BULUR
  $calistir= mysqli_query($conn,$sil); //SILME ISLEMINI YAPAR
  if($calistir)
 {
       // EĞER BASARILI OLDUYSA LOG TABLOSUNA VERILERI İŞLER
    $ekle = "INSERT INTO `activity_log`( `userID`, `procces`, `who_didthis`)
         VALUES ('$UID','$procces','$who_didthis')";
   $kaydet= mysqli_query($conn,$ekle);
   echo "BASARI";  //SONUCU YAZDIRIR.
 }else{
 echo "HATA";
 }

 ?>
