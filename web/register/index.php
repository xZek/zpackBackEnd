<?php require "../../ajax/login-register/register.php"; ?>
  <?php include "../header_2.php"; ?>
                            <h3 class="mb-0 my-2 register">KAYIT OL</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" id="register_check" action="" method="post">
                            <?php require "../../ajax/error/usertxt_js.php"; ?>
                                <div class="form-group">
                                    <label for="inputName">Kullanici Adi : </label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="username" maxlength="12" placeholder="Kullanici Adi">
                                      </div>
                                    <p><font size="1" color="grey">*En az (6) en fazla (12) karakterli olmalı ve özel karakter olmamalı</font></p>
                                <div class="form-group">
                                    <label for="inputEmail3">Email : </label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com" required="">
                                  </div>
                                  <p><font size="1" color="grey">*Şifrenizi unutmanız durumunda yenilemek için mail'e kod gelmektedir.</font></p>

                                <div class="form-group">
                                    <label for="inputPassword3">Şifre : </label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="******" maxlength="20" required="">
                                      </div>
                                    <p><font size="1" color="grey">*En az (6) en fazla (20) karakterli olmalı ve özel karakter olmamalı</font></p>
                                <div class="form-group">
                                    <label for="inputVerify3">Şifre Tekrar : </label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" maxlength="20" placeholder="******" required="">
                                </div>
                                <div class="form-group">
                                  <p><font size="2" color="grey">Kayıt olarak <a href="/rules/kullanici_sozlesmesi.html" target="_blank">Kullanıcı Sözleşmesi</a>, <a href="/rules/kisisel-veri-korumasi.html" target="_blank">Kişisel Verilerin Korunması</a>'nı kabul etmiş sayılıyorsunuz</font></p>

                                    <button name="register" class="btn btn-outline-success btn-lg float-right"><i class="fas fa-user-plus"> KAYIT OL</i></button>
                                  <button type="reset" class="btn btn-outline-info btn-lg btn-lg float-right"><i class="fas fa-sync-alt"> TEMIZLE</i></button>
                                  <br><br><br>
                                  <center>
                                    <p>Hesabınız var mı ? </p>
                         <a href="/web/login/">
                    <button type="button" class="btn btn-outline-info "><i class="fas fa-sign-in-alt"> GIRIS YAP</i></button>
                         </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
