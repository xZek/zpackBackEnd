 <?php
$page = 'show_contact';
require_once "../ajax/header.php";
$ID = $_GET['ID'];
$profil= $conn->query("SELECT * FROM contact WHERE ID='$ID'");
$yaz = mysqli_fetch_array($profil);

              $ID = $yaz['ID'];
              $IP = $yaz['IP'];
              $fromID = $yaz['fromID'];
              $name = $yaz['name'];
              $email = $yaz['email'];
              $subject = $yaz['subject'];
              $description = $yaz['description'];
              $date = $yaz['date'];
              $done = $yaz['done'];
            

?>       
<style>
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
</style>
<form method='post'>
  
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">MESAJLAR</h6>
            </div> 

            <div class="card-body">
              <?php include "../ajax/contact_make.php";
            require "../ajax/error/usertxt_js.php"; ?>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ GONDEREN ADI : </span>
</div>
<input type='text'  class='form-control' value='<?php echo $name; ?>' disabled>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ E-MAİL : </span>
</div>
<input type='text'  class='form-control' value='<?php echo $email; ?>' disabled>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ TARİH : </span>
</div>
<input type='text'  class='form-control' value='<?php echo $date; ?>' disabled>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ KONU : </span>
</div>
<input type='text'  class='form-control' value='<?php echo $subject; ?>' disabled>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>Açıklama :</span>
</div>
<textarea name='description' id='editor1' rows='10' cols='10' disabled>
<?php echo $description; ?>
</textarea>   
</div>
  <center><button class='btn btn-success'  name='update' type='submit'><i class='fas fa-eye'></i> GÖRÜLDÜ</button>
     </center></form>
  <br></div></div> <?php

include "../ajax/footer.php";

?>