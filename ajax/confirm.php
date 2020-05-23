<?php
if(isset($_POST["confirm"]))
{
  	$key = $_POST["key"];
  $done = 1;



	if(empty($key)){
		$error = true;
		$errormessage = "Hata";

	}else{

    $sorgu = $conn->query("SELECT * FROM kullanici WHERE email_hash LIKE '%$key%'");
    $sayi = mysqli_num_rows($sorgu);
    if($sayi < 1)
    {
      $error = true;
      $errormessage = "Kod Bulunamadı.";
    }else{

      $guncelle = "UPDATE kullanici SET confirm='1' WHERE email_hash='$key'";
      	if (mysqli_query($conn,$guncelle)) {

          $confirm = true;
          header("Refresh:3; url=/web/dashboard/");
        }else{
          $error = true;
          $errormessage = "Sorun Oluştu.";
        }

    }

}
}

     ?>
