<?php



   if(isset($_POST["update"]))
   {
    /////////////////////// LOG'TA TUTABILMEK İÇİN GEREKLİ BİLGİLER //////////////////////

    $UID = $_SESSION['ID'];
    $procces =  "Kullanici Hesap Duzenleme- ID: ";
    $procces2 = $ID;
    $procces_write=$procces." ".$procces2;
    $who_didthis  = $_SESSION['username'];
   /////////////////////// LOG'TA TUTABILMEK İÇİN GEREKLİ BİLGİLER //////////////////////

    /////////////////////// KULLANICIDAN ALINAN BILGILER //////////////////////
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);


    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $adm = trim($_POST['adm']);
    $adm = strip_tags($adm);
    $adm = htmlspecialchars($adm);
/////////////////////// KULLANICIDAN ALINAN BILGILER //////////////////////




    /////////////////////// KULLANICIDAN GELEN VERİLERİN KONTROLÜ //////////////////////
    if($username == "")
    {
        echo "<div class='alert alert-warning' role='alert'>Kullanici adi boş bırakılamaz.</div>"; 
    }
    else if (strlen($username) < 3)
    {
        echo "<div class='alert alert-warning' role='alert'>En az 3 karakter olmalıdır.</div>"; 
    }
    else if($email == "")
    {
      echo "<div class='alert alert-warning' role='alert'>Email Giriniz.</div>"; 
    }
    else if($adm >= 3)
    {
       echo "<div class='alert alert-warning' role='alert'>Geçerli Bir yetki giriniz.</div>"; 
    }
    else if($adm == "")
    {
        echo "<div class='alert alert-warning' role='alert'>Yetki boş bırakılamaz</div>"; 
    }
 /////////////////////// KULLANICIDAN GELEN VERİLERİN KONTROLÜ //////////////////////
     
   
      $guncelle = "UPDATE kullanici SET username='$username', email='$email', adm ='$adm' WHERE ID='$ID'";
      	if (mysqli_query($conn,$guncelle)) {

     //BASARI

          //LOG EKLE
                $ekle = "INSERT INTO `activity_log`( `userID`, `procces`, `who_didthis`)
             VALUES ('$UID','$procces_write','$who_didthis')";
             $kaydet= mysqli_query($conn,$ekle);

          ////////////////////
    		echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
    	   echo '<meta http-equiv="refresh" content="1; URL=manage_user.php">';
	
     }
     else {
    	echo "<div class='alert alert-warning' role='alert'>HATA.</div>";	
     }
 }
  ?>