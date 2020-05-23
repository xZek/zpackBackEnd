<?php

/*

      VERITABANI BAGLANTISI YAPILIR
      BAN KONTROLU YAPILIR
      SOHBET KURALLARINA UYMAYAN KELIME VARSA 1SAATLIK BAN ATILIR
      ARRAY'LERE GÖRE  KULLANICI MESAJI ILETILIR
      EN SONDA VERİ GÖSTERIMI YAPILIR
*/

include('database_connection.php');
session_start();


/////////////////////////////// KULLANICI HESAP BANI VARMI KONTROLU /////////////////////////////////////


$banned_time = strtotime(get_user_banned($_SESSION['ID'], $connect));  //VERITABANINDAKI GUNCEL ZAMANI ALIR
$server_time =  time(); //SERVER SAATINI ALIR
if($banned_time > $server_time)  //EĞER KULLANICI BAN SAATI SERVERDEN BUYUKSE DONGUYE GIRER
{
  $errormessage = 'Tekrar Erişim : '.get_user_banned($_SESSION['ID'], $connect).'';
  echo "<div class='alert alert-danger' role='alert'>";
    echo  $errormessage;
    echo "</div>";
exit(); //ÇIKIŞ
}


/////////////////////////////// KULLANICI HESAP BANI VARMI KONTROLU /////////////////////////////////////




if($_POST["action"] == "insert_data")
{
 $data = array(
  ':from_user_id'  => $_SESSION["ID"],
  ':chat_message'  => $_POST['chat_message'],
  ':status'   => '1'
);

//KUFUR HAZNESI
if(strstr($_POST['chat_message'], 'fuck'))
{
  $banned_time = date("Y.m.d  H:i:s", time() + 3660);
  $errormessage = 'Tekrar Erişim : '.$banned_time.'';
  echo "<div class='alert alert-danger' role='alert'>";
    echo $errormessage;
    echo "</div>";
    $query = $connect->prepare("UPDATE kullanici SET
           banned_time = :banned_time
         WHERE ID = :ID");
  $update = $query->execute(array(
       "banned_time" => $banned_time,
       "ID" => $_SESSION["ID"]
  ));
  exit();
}

 $query = "
 INSERT INTO chat_message
 (from_user_id, chat_message, status)
 VALUES (:from_user_id, :chat_message, :status)
 ";

 $statement = $connect->prepare($query);

 if($statement->execute($data))
 {

  echo fetch_group_chat_history($connect);
 }

}

if($_POST["action"] == "fetch_data")
{
 echo fetch_group_chat_history($connect);
}

?>
