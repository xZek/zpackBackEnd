<?php include "../header.php"; ?>
<?php include "../../ajax/connect.php"; ?>
<?php require "../../ajax/link_search.php"; ?>


<form action="" method="post">
    <?php require "../../ajax/error/usertxt_js.php"; ?>
    <br><br>
    <hr>
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="link" class="form-control" placeholder="Verilen Kod'u Giriniz" aria-label="Verilen Kod'u Giriniz" aria-describedby="basic-addon1">
  </div>

  <center>
    <button type="submit" name="ara" class="btn btn-outline-secondary"><i class="fas fa-search"></i> ARA</button>


<script>
CKEDITOR.replace( 'editor1' );
</script>
