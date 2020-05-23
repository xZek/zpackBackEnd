<?php
// URL ICIN RASTGELE KOD OLUSTURMA
function generateChars(){
 $chars = "1234567890abcdefghijKLMNOPQRSTuvwxyzABCDEFGHIJklmnopqrstUVWXYZ0987654321";
 $generateCode = '';
 for($i=0;$i<14;$i++)
 {
  $generateCode .= $chars{rand() % 72};
 }
 return $generateCode;
}
///////////////////////////////////

$generateCode=generateChars();

   if(isset($_POST["gonder"]))
   {

     $IP    = $_SERVER["REMOTE_ADDR"];
     $title = trim($_POST["title"]);
     $URL   = $generateCode;
     $description = trim($_POST["description"]);
     $visible = trim($_POST["visible"]);
     $shareLink =  uniqid('?_');

    if($title == "")
    {
      $error = true;
      $errormessage = "Baslik Giriniz.";
    }
    else if($description == ""){

      $error = true;
      $errormessage = "Açıklama Giriniz.";

    }
    else if($visible == ""){

      $error = true;
      $errormessage = "Görünürlük durumunu düzenleyiniz.";

    }
    else if($IP == "")
    {
      $error = true;
      $errormessage = "Bu Ip Engellenmiştir.";
    }
    else{


       $sorgu = "INSERT INTO `txt_anonim`( `IP`, `URL`, `shareLink`, `title`, `description`, `visible`)
         VALUES ('$IP','$URL', '$shareLink', '$title','$description','$visible')";	if (mysqli_query($conn,$sorgu)) {
     //BASARI
     $succes2 = true;
     $urlver = $URL;
     }
     else {
       $error = true;
       $errormessage = "Sunucuya baglantıda bir sorun oluştu.";
     }
   }


   }

 ?>
