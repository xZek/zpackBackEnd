 <?php 

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
              <h6 class="m-0 font-weight-bold text-primary">LOGLAR</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SIRA</th>
                      <th>userID</th>
                      <th>KULLANICI</th>
                      <th>İŞLEM</th>
                      <th>TARİH</th>
                    </tr>
                  </thead>
                  <tbody>
                  	 	  <?php
        $getTxt = $conn->query("select * from activity_log");
        $i=0;

          while ($txt=mysqli_fetch_array($getTxt)){


             
              $userID = $txt['userID'];
              $who_didthis = $txt['who_didthis'];
              $procces = $txt['procces'];
              $date = $txt['date'];
              $i +=1;

                echo "<tr>
      <td> $i </td>
      <td> $userID </td>
      <td> $who_didthis </td>
      <td> $procces </td>
      <td> $date </td>";
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