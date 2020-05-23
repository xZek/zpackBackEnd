<?php
/*

        --> VERITABANI BAGLANTISI
        --> GIRIS YAPAN KULLANICININ SAYFADA DURDUGU SURELERI INSERT EDER


 */

include('database_connection.php');

session_start();

$query = "
UPDATE login_details
SET last_activity = now()
WHERE login_details_id = '".$_SESSION["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();

?>
