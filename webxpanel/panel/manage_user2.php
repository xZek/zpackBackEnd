 <?php 
$page = "manage_user";
require_once "../ajax/header.php";
if($_SESSION["adm"] == 2)
{
 $ID = $_GET['ID'];
$profil= $conn->query("SELECT * FROM kullanici WHERE ID='$ID'");
$yaz = mysqli_fetch_array($profil);

          
              $ID = $yaz['ID'];
              $username = $yaz['username'];
              $email = $yaz['email'];
              $reg_date = $yaz['reg_date'];
              $adm = $yaz['adm'];

 
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
      
<style>
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
   select {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
} 
</style>
<form method='post'>
  
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">KULLANICI DUZENLE</h6>
            </div> 

            <div class="card-body">
              <?php include "../ajax/manage_user.php";
            require "../ajax/error/usertxt_js.php"; ?>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ Kullanici Adi : </span>
</div>
<input type='text' name='username' class='form-control' value='<?php echo $username; ?>'>
</div>

<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ E-Mail : </span>
</div>
<input type='text' name='email' class='form-control' value='<?php echo $email; ?>'>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'> @ Kayit Tarihi : </span>
</div>
<input type='text' name='email' class='form-control' value='<?php echo $reg_date; ?>' disabled>
</div>
<center> <label for="reason">YETKİ : </label>
      
          <center>
            <select name="adm">
              <option value="<?php echo $adm; ?>">Seciniz</option>
              <option value="0">Normal Kullanici</option>
              <option value="1">Moderator</option>
              <option value="2">Yönetici</option>
            </select>
            <br><br>
          </center>
   <td><button class='btn btn-success' name='update' type='submit'><i class='fas fa-save'></i> KAYDET</button></td>
 </div></div></form>
<?php

include "../ajax/footer.php";

?>