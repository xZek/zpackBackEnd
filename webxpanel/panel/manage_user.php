 <?php 
$page = "manage_user";
require_once "../ajax/header.php";
if($_SESSION["adm"] == 2)
{
 
}else{
  echo "   <div class='card shadow mb-4'>
            <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
              <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
                <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
                   <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>";
exit();
}

?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">KULLANICILARI DUZENLE</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SIRA</th>
                      <th>ID</th>
                      <th>KULLANICI ADI</th>
                      <th>MAİL</th>
                      <th>KAYIT TARİHİ</th>
                      <th>YETKI</th>
                      <th>İŞLEM</th>
                    </tr>
                  </thead>
                  <tbody>
                                <?php
        $getTxt = $conn->query("select * from kullanici");
        $i=0;

          while ($txt=mysqli_fetch_array($getTxt)){


              $ID = $txt['ID'];
              $username = $txt['username'];
              $email = $txt['email'];
              $reg_date = $txt['reg_date'];
              $adm = $txt['adm'];
           
              $i +=1;


             
                echo "<tr>
            <td> $i</td>
            <td> $ID </td>
            <td> $username </td>
            <td> $email</td>
            <td> $reg_date</td>
            <td>";
             if($adm == "0")
              {
                echo "Normal Kullanici";
              }
              else if($adm == "1")
              {
                echo "<font color='purple'>Moderator</font>";
              }
              else{
                echo "<font color='red'>Yonetici</font>";
              }
              echo "</td>
              
              <td><a href='manage_user2.php?ID=$ID'><button class='btn btn-success' type='submit'><i class='fas fa-edit'></i> DÜZENLE</button></a></td>
            </tr>";


            }
?>
</tbody></table></div></div></div>
<?php

include "../ajax/footer.php";

?>