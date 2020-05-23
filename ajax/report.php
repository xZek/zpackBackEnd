<?php


   if(isset($_POST["report"]))
   {

     $fromToken = $token;
     $reason =trim($_POST["reason"]);
     $description = trim($_POST["description"]);
     $isUser = $_POST["isUser"];

    if($reason == "")
    {
      $error = true;
      $errormessage = "Bir neden seciniz.";
    }
    else if($description == ""){

      $error = true;
      $errormessage = "Açıklama Giriniz.";

    }



    else{


       $sorgu = "INSERT INTO `report`( `fromToken`, `reason`, `description`, `isUser`)
         VALUES ('$fromToken','$reason','$description', '$isUser')";	if (mysqli_query($conn,$sorgu)) {
     //BASARI
     $send_contact = true;
     }
     else {
       $error = true;
       $errormessage = "Sunucuya baglantıda bir sorun oluştu.";
     }
   }


   }

 ?>
