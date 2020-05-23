<?php
include "../../ajax/connect.php";
include "../header.php";
$token = $_GET['token'];
$profil= $conn->query("SELECT * FROM txt_user WHERE shareLink LIKE '$token' AND visible =1");
$yaz = mysqli_fetch_array($profil);
$title = $yaz['title'];
$fromName = $yaz['fromName'];
$description = $yaz['description'];
$create_date = $yaz['create_date'];
$visible = $yaz['visible'];

if($visible == 0)
{
   $error = true;
   $errormessage = "Bu içerik gizlendi veya kaldırıldı.";
}
else{

}

 ?>  <?php require "../../ajax/error/usertxt_js.php"; ?>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ Kullanici : </span>
</div>
<input type='text'  class='form-control' value='<?php echo $fromName; ?>' disabled>	</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ Başlık : </span>
</div>
<input type='text'  class='form-control' value='<?php echo $title; ?>' disabled>	</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ Oluşturma Tarihi : </span>
</div>
<input type='text'  class='form-control' value='<?php echo $create_date; ?>' disabled>	</div>

<textarea name='description' id='editor1' rows='10' cols='10' disabled>
<?php echo $description; ?>
</textarea><br>
<center>
<script>
CKEDITOR.replace( 'editor1' );
</script>
<?php include "../report.php"; ?>
