<?php

/*
  <!================ BURADA BULUNANLAR ==============!>
    --> VERITABANI BAGLANTISI
    --> GELEN ID'DEN KULLANICI ADI ÇAĞIRMA
    --> RANK - BAN  KONTROLU
    --> SOHBET'TEKI KULLANICILARIN KARAKTER SINIRLAMASI
    --> GRUP SOHBET GEÇMIŞI
  <!================ BURADA BULUNANLAR ==============!>
*/

$connect = new PDO("mysql:host=localhost;dbname=db14_txt_online;charset=utf8mb4", "db14_zpack", "Zeki1234");

date_default_timezone_set('Europe/Istanbul');


function fetch_user_last_activity($user_id, $connect) //EN SON AKTIF OLDUGU SAAT GETIRILEREK
                                                      // BAN DURUMUNDAKI KONTROL SAĞLANIR
{
 $query = "
 SELECT * FROM login_details
 WHERE user_id = '$user_id'
 ORDER BY last_activity DESC
 LIMIT 1
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['last_activity'];
 }
}

function get_user_name($user_id, $connect) //ID'DEN KULLANICI ADI BILGISI GETIRILIR
{
 $query = "SELECT username FROM kullanici WHERE ID = '$user_id'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['username'];

 }
}
function get_user_rank($user_id, $connect) //ADM TABLOSUNDAKI VERIYI GETIRIR
{
 $query = "SELECT adm FROM kullanici WHERE ID = '$user_id'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['adm'];

 }

}
function get_user_banned($user_id, $connect)
{
 $query = "SELECT banned_time FROM kullanici WHERE ID = '$user_id'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['banned_time'];

 }

}
function fetch_group_chat_history($connect)
{

 $query = "
 SELECT * FROM chat_message
 WHERE to_user_id = '0'
 ORDER BY timestamp DESC
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '<ul class="list-unstyled">
 <!-- KURALLAR -->
 <div class="container2 darker">
 <img src="/assets/images/logo.png" alt="Avatar" class="right">
 <b class="text-success">Z-PACK SOHBET SISTEMI KURALLARI :</b>
 <p>♦ Spam Atmak Yasaktır</p>
 <p>♦ Küfür Etmek Yasaktır</p>
 <p>♦ Ahlaksızca Konuşmak Yasaktır</p>
 <p>♦ Siyaset Konuşmak Yasaktır</p>
 <p>♦ Sosyal Medya Hesaplarının Paylaşılması Yasaktır</p>
 <p>♦ Bunları yapmak <font color="red">KALICI SOHBET YASAĞI</font> sebebidir.
  (<a href="/web/contact/" target="_blank">Raporlamak için tıklayınız</a>)</p>
<p>♦ Konuya nedeni yazarak şikayetci olduğunuz kısmı ekran goruntusunun
 linkini göndermeniz yeterlidir. </p></div>
 <!-- KURALLAR -->';
 foreach($result as $row)
 {
  // EĞER KULLANICI SOHBET BANI VAR İSE //
  $banned_time = strtotime(get_user_banned($row['from_user_id'], $connect));  //VERITABANINDAKI GUNCEL ZAMANI ALIR
  $server_time =  time(); //SERVER SAATINI ALIR
 if($row["from_user_id"] == $_SESSION["ID"] &&  $banned_time > $server_time)  //EĞER KULLANICI BAN SAATI SERVERDEN BUYUKSE DONGUYE GIRER
 {
   $errormessage = 'Tekrar Erişim : '.get_user_banned($row['from_user_id'], $connect).'';
   echo "<div class='alert alert-danger' role='alert'>";
     echo  $errormessage;
     echo "</div>";
     exit();
 }
  $icerik_kisitla = substr($row['chat_message'],0,50); //MAKSIMUM 50 KARAKTER VERITABANINDAN CEKILIR
  //BU ICERIK KISITLAMASI MOD  VE ADMINLER ICIN GEÇERLI DEĞİLDİreq


  $user_name = '';


  //KENDI YAZDIGI BU ŞEKİLDE GORUR [NORMAL KULLANICI]
  if($row["from_user_id"] == $_SESSION["ID"] && $_SESSION["adm"] < 1)
  {
   $user_name = '<b class="text-success">Sen</b>';
   $div_class= '<div class="container2">
     <img src="/assets/images/user-beta.png" alt="Avatar">';
   $whosend = '<p>'.$user_name.' : '.$icerik_kisitla.'</p>';
   $time = '  <span class="time-right"><font color="green">'.$row['timestamp'].'</font></span></div>';
  }
  //KENDI  YAZDIGINI BU ŞEKILDE GORUR  [MOD]
  else if($row["from_user_id"] == $_SESSION["ID"] && $_SESSION["adm"] == 1)
  {

   $user_name = '<b class="text-success">[MOD] '.get_user_name($row['from_user_id'], $connect).'</b>';
   $div_class= '<div class="container2">
     <img src="/assets/images/mod.png" alt="Avatar">';
   $whosend = '<p>'.$user_name.' : '.$row['chat_message'].'</p>';
   $time = '  <span class="time-right"><font color="green">'.$row['timestamp'].'</font></span></div>';
  }
  //KULLANICILAR YAZDIGINI BU ŞEKILDE GORUR [MOD]
  else if(get_user_rank($row['from_user_id'], $connect) == 1)
  {
   $user_name = '<b class="text-default"><font color="purple">[MOD]</font> '.get_user_name($row['from_user_id'], $connect).'</b>';
   $div_class= '<div class="container2 darker">
     <img src="/assets/images/mod.png" alt="Avatar" class="right">';
   $whosend = '<div align="right"><p>'.$user_name.' <font color="purple"><h6></div> '.$row['chat_message'].'</font></h6></p>';
   $time = '  <span class="time-right"><font color="green">'.$row['timestamp'].'</font></span></div>';
  }
  //KENDI  YAZDIGINI BU ŞEKILDE GORUR  [DEV]
  else if($row["from_user_id"] == $_SESSION["ID"] && $_SESSION["adm"] == 2)
  {
   $user_name = '<b class="text-success">[DEV] '.get_user_name($row['from_user_id'], $connect).' </b>';
   $div_class= '<div class="container2">
     <img src="/assets/images/admın_1.png" alt="Avatar">';
   $whosend = '<p>'.$user_name.' <font color="red"><h6>'.$row['chat_message'].'</h6></font></p>';
   $time = '  <span class="time-right"><font color="green">'.$row['timestamp'].'</font></span></div>';
  }
  //KULLANICILAR  YAZDIGINI BU ŞEKILDE GORUR [DEV]
  else if(get_user_rank($row['from_user_id'], $connect) == 2)
  {
   $user_name = '<b class="text-default"><font color="blue">[DEV] </font>'.get_user_name($row['from_user_id'], $connect).'</b>';
   $div_class= '<div class="container2">
     <img src="/assets/images/admın_1.png" alt="Avatar" class="right">';
   $whosend = '<div align="right"><p>'.$user_name.'  </div><font color="red"><h6>'.$row['chat_message'].'</h6></font></p>';
   $time = '  <span class="time-right"><font color="green">'.$row['timestamp'].'</font></span></div>';
  }
  else
  {
  //NORMAL KULLANICILAR İÇİN
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
   $div_class= '<div class="container2 darker">
           <img src="/assets/images/user-beta.png" alt="Avatar" class="right">';
   $whosend = '<p><div align="right">'.$user_name.' </div> '.$icerik_kisitla.'</p>';
   $time = '  <span class="time-right"><font color="dark">'.$row['timestamp'].'</font></span></div>';
  }


  $output .= '

     '.$div_class.'
     '.$whosend.'
         '.$time.'
         ';

 }
 $output .= '</ul>';
 return $output;


}

$errormessage=null;

?>
