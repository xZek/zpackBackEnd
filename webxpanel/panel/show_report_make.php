<style>
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
 select {
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

</style>
 <?php
$page = 'show_report';
require_once "../ajax/header.php";
$ID = $_GET['ID'];
$profil= $conn->query("SELECT * FROM report WHERE ID='$ID'");
$yaz = mysqli_fetch_array($profil);
$fromToken = $yaz['fromToken'];
$reason = $yaz['reason'];
$description = $yaz['description'];
$done = $yaz['done'];
$isUser = $yaz['isUser'];

?>       

<form method='post'>
	
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">RAPORLAR</h6>
            </div> 

            <div class="card-body">
              <?php include "../ajax/report_make.php";
            require "../ajax/error/usertxt_js.php"; ?>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ Link : </span>
</div>
<?php 
 if($isUser == 1)
            {
            echo " <input type='text'  class='form-control' value='http://localhost/web/Link/index.php?token=$fromToken'' disabled>";
            }else{
         echo " <input type='text'  class='form-control' value='http://localhost/web/getLink/index.php?token=$fromToken'' disabled>";  
          }
            ?>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>Nedeni :</span>
</div><input type='text'  class='form-control' value='
<?php 
   if($reason == 1)
            {
              echo "Spam Gönderi";
            }
            else if($reason == 2)
            {
              echo "İzinsiz Bilgilerin Paylaşılması.";
            }
            else if($reason == 3)
            {
              echo "Uygunsuz İçerik";
            }
            else
            {
               echo "Diğer";
           }
           ?>'' disabled>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>Açıklama :</span>
</div>
<textarea name='description' id='editor1' rows='10' cols='10' disabled>
<?php echo $description; ?>
</textarea>   
</div><center>
         <label for="reason">DURUM : </label>
      
          <center>
            <select name="done">
              <option value="1">Herhangi bir sorun yoktur.</option>
              <option value="2">Silme işlemini onayla</option>
            </select>
          </div>

        <button class='btn btn-success'  name='update' type='submit'><i class='fas fa-save'></i> Kaydet</button>
     </form>
  <br>
     </div></div>  
     <?php

include "../ajax/footer.php";

?>