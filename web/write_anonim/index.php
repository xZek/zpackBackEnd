<?php include "../header.php"; ?>
<?php include "../../ajax/connect.php"; ?>
<?php require "../../ajax/anonim/txt_sender.php"; ?>
<style>

</style>
  <div class="container marketing">




    <form name="txtform" method="post">

    <?php require "../../ajax/error/usertxt_js.php"; ?>

      <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text" id="basic-addon1"> <i class="fa fa-user icon"></i></span>
    </div>
    <input type="text" name="title" class="form-control" placeholder="Baslik Giriniz" aria-label="Baslik Giriniz" aria-describedby="basic-addon1">
  </div>

             <textarea name="description" id="editor1" rows="100" cols="100">

             </textarea>
          <center><br>
            <select class="input-group-text" name="visible">
                  <option value="">Görünür Durumu</option>
                  <option value="0">Sadece Ben</option>
                  <option value="1">Herkese Açık</option>
            </select>
  <br>
          <button type="submit" name="gonder" class="btn btn-outline-secondary"><i class="fas fa-save"></i> KAYDET</button>
         </form>
         <script>
       CKEDITOR.replace( 'editor1' );
         </script>
  </div>

<?php include "../footer.php"; ?>
