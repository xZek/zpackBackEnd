 <?php
$page = 'show_report';
require_once "../ajax/header.php";

?>
  
     <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">RAPORLAR</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SIRA</th>
                      <th>LINK</th>
                      <th>RAPOR NEDENI</th>
                      <th>AÇIKLAMA</th>
                      <th>DURUM</th>
                      <th width="14%">IŞLEM</th>
                    </tr>
                  </thead>
                  <tbody>
                  	      <?php
        $getTxt = $conn->query("select * from report WHERE done=0 ");
        $i=0;

          while ($txt=mysqli_fetch_array($getTxt)){


              $ID = $txt['ID'];
              $token = $txt['fromToken'];
              $reason = $txt['reason'];
              $description = $txt['description'];
              $done = $txt['done'];
              $isUser = $txt['isUser'];
              $i +=1;

  echo "<tr>
      <td> $i </td>
      ";
         if($isUser == 1)
            {
              echo " <td><a href='/web/Link/index.php?token=$token' target='_blank'>Şikayet Edilen İçerik</a> </td>";
            }else{
              echo " <td><a href='/web/getLink/index.php?token=$token' target='_blank'>Şikayet Edilen İçerik</a> </td>";
            }
         if($reason == 1)
            {
              echo " <td>Spam Gönderi</td>";
            }
            else if($reason == 2)
            {
              echo "<td>İzinsiz Bilgilerin Paylaşılması.</td>";
            }
            else if($reason == 3)
            {
              echo "<td>Uygunsuz İçerik.</td>";
            }
            else
            {
               echo "<td>Diğer</td>";  
            }
            echo "<td>";
      if (strlen($description)>20) {
     echo substr($description,0,20)."...";
      } else {
      echo $description;
       }echo"</td>
     <td>";
         if($done == 0)
            {
              echo "<font color='red'><center>İşlem Bekliyor</font></center>";
            }else if($done == 1)
            {
              echo "Herhangi Bir sorunla karşılaşılmadi";
            }
            else
            {
              echo "Sorun Çözüldü silme onayı bekliyor";    
            }
            echo "
       </td>
       <td><a href='show_report_make.php?ID=$ID'><button class='btn btn-success' type='submit'><i class='fas fa-eye'></i> Görüntüle</button></a></td>
      </tr>";

     }
             ?>   
         </tbody>
     </table>
 </div>
</div>
</div>
<?php

include "../ajax/footer.php";

?>