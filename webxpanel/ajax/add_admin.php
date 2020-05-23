<?php
error_reporting(0);
ob_start();

if(isset($_POST["register"]))
{
	  $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

		$password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);
    $password2 = trim($_POST['password_confirm']);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $adm = trim($_POST['adm']);
    $adm = strip_tags($adm);
    $adm = htmlspecialchars($adm);

    if($username == "")
    {
      $error = 1;
      $errormessage = "Kullanici Adi Giriniz";
    }
    else if (strlen($username) < 3)
    {
      $error = true;
      $errormessage = "En az 3 karakter olmalıdır.";
   }

    else {
      $query = "SELECT username FROM kullanici WHERE username='$username'";
      $result = mysqli_query($conn,$query);
      $count = mysqli_num_rows($result);
      if($count!=0){
       $error = true;
       $errormessage = "Bu kullanıcı adı kullanılıyor.";
      }
    }
     if($password == "")
    {
      $error = 1;
      $errormessage = "Sifre Giriniz";
    }
    else if(strlen($password) < 6)
    {
      $error = true;
      $errormessage = "Şifre en az 6 karakterli olmalıdır.";
    }
    else if($password != $password2)
    {
      $error = true;
      $errormessage = "Şifreler Uyuşmuyor";
    }
    else if($email == "")
    {
      $error = 1;
      $errormessage = "Email Giriniz";
    }
    else if($adm >= 3)
    {
       $error = 1;
       $errormessage = "Geçerli Bir yetki giriniz";
    }
    else if($adm == "")
    {
      $error = 1;
      $errormessage =  "Yetki boş bırakılamaz";
    }
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $errormessage = "Geçerli Bir Mail Adresi Giriniz.";
} else {
  $query = "SELECT email FROM kullanici WHERE email='$email'";
  $result = mysqli_query($conn,$query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $errormessage = "Bu Mail Kullanılıyor.";
  }
  }
	//KAYIT OL PHP'DEKİ ADM'NIN BOŞ BIRAKILMAMASI ŞARTI DIŞINDA TÜM ŞARTLAR AYNIDIR 
 if($error != true)
{

    $password_code = hash('sha256', $password);
    $sql = "INSERT INTO `kullanici`( `username`, `password`, `email`, `adm`)
     		VALUES ('$username','$password_code','$email','$adm')";	if (mysqli_query($conn, $sql)) {
		//KOSUL DOGRUYSA YAZAR
       $register = 1;
         header("Refresh: 2; url=/webxpanel/dashboard/");
		}
    else{
      $error = true;
      $errormessage = "Bir Sorun Oluştu";
    }


}
mysqli_close($conn);
}

ob_end_flush();
?>
