<?php


   if(isset($_POST["gonder"]))
   {

     $UID = $_SESSION["ID"];
     $UName = $_SESSION["username"];
     $title =trim($_POST["title"]);
     $description = trim($_POST["description"]);
     $visible =trim($_POST["visible"]);
     $shareLink =  trim(uniqid('_'));
    if($title == "")
    {
      $error = true;
      $errormessage = "Baslik Giriniz.";
    }
    else if($description == ""){

      $error = true;
      $errormessage = "Açıklama Giriniz.";

    }
    else if($visible == "")
    {
      $error = true;
      $errormessage = "Görünüm Durumunu düzenleyiniz.";
    }
    else if($UID == "" && $UName == "")
    {
      $error = true;
      $errormessage = "Giriş Yapmadan Yazı Kaydedemezsiniz.";
    }
    else{


       $sorgu = "INSERT INTO `txt_user`( `fromID`, `fromName`, `title`, `description`, `shareLink`, `visible`)
         VALUES ('$UID','$UName','$title','$description', '$shareLink', '$visible')";	if (mysqli_query($conn,$sorgu)) {
     //BASARI
     $succes = true;
     }
     else {
       $error = true;
       $errormessage = "Sunucuya baglantıda bir sorun oluştu.";
     }
   }


   }

 ?>
