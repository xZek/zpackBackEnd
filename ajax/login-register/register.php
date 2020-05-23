<?php
//register.php
ob_start();
 require_once "../../ajax/connect.php";
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

    $Confirm_code = uniqid(); // Mail'e gonderilcek onaylama kodu




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
 if($error != true)
{
    $password_code = hash('sha256', $password);




////////////// ONAY MAİLİ GONDERİR //////////////
       include 'class.phpmailer.php';

       $mail = new PHPMailer();
       $mail->IsSMTP();
       $mail->SMTPAuth = true;
       $mail->Host = 'smtp.gmail.com';
       $mail->Port = 587;
       $mail->SMTPSecure = 'tls';
       $mail->Username = 'zpackspace@gmail.com';
       $mail->Password = 'XXXXXXXXXX';
       $mail->SetFrom($mail->Username, 'zpack');
       $mail->AddAddress($email, 'Zekeriya Uysal');
       $mail->CharSet = 'UTF-8';
       $mail->Subject = 'Hesabımı Onayla';
       $onay = '
<html>
<body>
<br>
Hesap Onaylama:<br><br>
___________________________________________________________________<br>
<br>
Kullanıcı Adı: '.$username.'<br>
Email: '.$email.'<br>
Aktivasyon Kodu : '.$Confirm_code.'<br>
Link : https://zpack.space/web/confirm/ <br>
<br>
<br>
<font color="red">Link üzerinden verilen kodu giriniz.Sonrasında hesabınız aktif olucaktır.</font><br>

____________________________________________________________________<br>
<br>
<br>
<br>
Best Regard Z-Pack
</body>
</html>
';
       $mail->MsgHTML($onay);
       if($mail->Send()) {
         $sql = "INSERT INTO `kullanici`( `username`, `password`, `email`, `email_hash`)
             VALUES ('$username','$password_code','$email', '$Confirm_code')";	if (mysqli_query($conn, $sql)) {

            $register = 1;
           }
         else{
               $error = true;
               $errormessage = "Kayit Esnasında Sorun Oluştu";
                }
             } else {
               $error = true;
               $errormessage = "Bir Sorun Oluştu";
                  }

		}




mysqli_close($conn);
}

ob_end_flush();
?>
