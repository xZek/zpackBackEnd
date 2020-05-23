<?php include "../header.php"; ?>
<?php include "../../ajax/connect.php"; ?>
<?php include "../../ajax/anonim/contact_send.php"; ?>

<div class="container py-5">
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card border-secondary">
                    <div class="card-header">  <center><h3 class="mb-0 my-2 login">İLETİŞİM FORMU</h3></center>
                    </div>
                    <div class="card-body">
                        <form class="form" method="post">
                          <?php require "../../ajax/error/usertxt_js.php"; ?>

                              <div class="input-group mb-3">
                              <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                              </div>
                                <input type="text" class="form-control" name="name"  maxlength="25" placeholder="Ad Soyad">
                                        </div>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email"  maxlength="25" placeholder="Mail">
                                   </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-star"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="subject"  maxlength="25" placeholder="Konu">
                             </div>
                             <textarea name="description" id="editor1" rows="100" cols="100">
                               Açıkalama Giriniz
                             </textarea>
                            <div class="form-group">

                              <br>
                              <center>

                  <button type="submit" name="send_contact" class="btn btn-outline-secondary "><i class="fas fa-share"></i> GÖNDER</button>
                           </div>
                            </div>
                        </form>

                        <script>
                      CKEDITOR.replace( 'editor1' );
                        </script>
                    </div>
   </div>

      <div class="col-md-10 mx-auto">  <br>
                  <?php include "../footer.php"; ?>
</div>
