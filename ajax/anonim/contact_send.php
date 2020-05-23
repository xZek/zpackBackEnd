<?php


   if(isset($_POST["send_contact"]))
   {

     $IP    = $_SERVER["REMOTE_ADDR"];

     $name = trim($_POST['name']);
     $name = strip_tags($name);
     $name = htmlspecialchars($name);

     $email = trim($_POST['email']);
     $email = strip_tags($email);
     $email = htmlspecialchars($email);

     $subject = trim($_POST['subject']);

     $description = trim($_POST['description']);

     if($name == "")
     {
       $error = 1;
       $errormessage = "Ad Soyad Giriniz";
     }
     else if (strlen($name) < 3)
     {
       $error = true;
       $errormessage = "En az 3 karakter olmalıdır.";
    }
    else if (!preg_match("/^[a-zA-Z ]+$/",$name))
    {
       $error = true;
       $errormessage = "Alfabetik karakter kullanınız.";
     }
     else if($email == "")
     {
       $error = 1;
       $errormessage = "Email Giriniz";
     }
     if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
     $error = true;
    $errormessage = "Geçerli Bir Mail Adresi Giriniz.";
    }
    else if($subject == "")
    {
      $error = 1;
      $errormessage = "Bir Konu Giriniz";
    }
    else if($description == "")
    {
      $error = 1;
      $errormessage = "Açıklama Giriniz";
    }
    else if($IP == "")
    {
      $error = true;
      $errormessage = "Bu Ip Engellenmiştir.";
    }
    else{


       $sorgu = "INSERT INTO `contact`( `IP`, `name`, `email`, `subject`, `description`)
         VALUES ('$IP','$name', '$email', '$subject', '$description')";	if (mysqli_query($conn,$sorgu)) {
     //BASARI
     $send_contact = true;
        header("Refresh: 2; url=/web/dashboard/");
     }
     else {
       $error = true;
       $errormessage = "Sunucuya baglantıda bir sorun oluştu.";
     }
   }


   }

 ?>
