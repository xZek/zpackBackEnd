 <?php 
$page = "create_admin";
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
       <?php 
       require "../ajax/add_admin.php";
       
          ?>
 <style>
      select {
  width: 30%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
</style>
<form method='post'>
  
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">ADMIN EKLE</h6>
            </div> 

            <div class="card-body">
          
          <?php require "../ajax/error/usertxt_js.php"; ?>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>Kullanıcı Adı : </span>
</div>
<input type='text' name='username' class='form-control'  placeholder='Admin'maxlength='12'>
</div>
<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>Şifre : </span>
</div>
<input type='password' name='password' class='form-control' placeholder='********' maxlength='20'>
</div>

<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>Şifre Onayla : </span>
</div>
<input type='password' name='password_confirm' class='form-control' placeholder='********' maxlength='20'>
</div>

<div class='input-group mb-3'>
<div class='input-group-prepend'>
<span class='input-group-text' id='basic-addon1'>Email Adresi : </span>
</div>
<input type='email' name='email'  placeholder='mail@mail.com' class='form-control' maxlength='25'>
</div> <center> <label for="reason">YETKİ : </label>
      
          <center>
            <select name="adm">
              <option value="">Seciniz</option>
              <option value="1">Moderator</option>
              <option value="2">Yönetici</option>
            </select>
          </div>
        <button class='btn btn-success'  name='register' type='submit'><i class='fas fa-save'></i> ADMIN EKLE</button>
     </form>
  <br>
     </div></div>  
     <?php

include "../ajax/footer.php";

?>