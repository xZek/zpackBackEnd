 <?php 
 $page = 'show_contact';
require_once "../ajax/header.php";


?>
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">MESAJLAR</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SIRA</th>
                      <th>IP</th>
                      <th>GONDEREN ID</th>
                      <th>GONDEREN ADI</th>
                      <th>MAİL</th>
                      <th>KONU</th>
                      <th>ACIKLAMA</th>
                      <th>TARIH</th>
                      <th>İŞLEM</th>
                    </tr>
                  </thead>
                  <tbody>
                  	  <?php
        $getTxt = $conn->query("select * from contact WHERE done=0 ");
        $i=0;

          while ($txt=mysqli_fetch_array($getTxt)){


              $ID = $txt['ID'];
              $IP = $txt['IP'];
              $fromID = $txt['fromID'];
              $name = $txt['name'];
              $email = $txt['email'];
              $subject = $txt['subject'];
              $description = $txt['description'];
              $date = $txt['date'];
              $done = $txt['done'];
              $i +=1;

              echo "<tr>
      <td> $i </td>
      <td> $IP </td>
      <td> $fromID </td>
      <td> $name </td>
      <td> $email </td>
      <td> $subject</td>";
        echo "<td>";
      if (strlen($description)>20) {
     echo substr($description,0,20)."...";
      } else {
      echo $description;
       }echo"</td>
      <td> $date</td>
      <td><a href='show_contact_make.php?ID=$ID'><button class='btn btn-success' type='submit'><i class='fas fa-eye'></i> Görüntüle</button></a></td>";

      
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