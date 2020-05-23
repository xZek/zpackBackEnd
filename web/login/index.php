<?php

session_start();
if(isset($_SESSION["username"]) && $_SESSION["confirm"] == 1)
{
 header("location:/web/dashboard/index.php");
}
?>
<?php require "../../ajax/login-register/login.php"; ?>
<?php include "../header_2.php"; ?>
            <h3 class="mb-0 my-2 login">GIRIS YAP</h3>
                        </div>
                        <div class="card-body">
                            <form class="form"  action="" method="post">
                              <?php require "../../ajax/error/usertxt_js.php"; ?>
                                <div class="form-group">
                                    <label for="inputName">Kullanici Adi : </label>
                                  <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                  </div>
                                    <input type="text" class="form-control" name="username" id="username" maxlength="12" placeholder="Kullanici Adi">
                                            </div>

                                <div class="form-group">
                                    <label for="inputPassword3">Şifre : </label>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="******" maxlength="20">
                                        </div>
                                <div class="form-group">

                                    <button  name="login" class="btn btn-outline-dark btn-lg float-right"><i class="fas fa-sign-in-alt"> GIRIS YAP</i></button>
                                  <button type="reset" class="btn btn-outline-danger btn-lg btn-lg float-right"><i class="fas fa-sync-alt"> TEMIZLE</i></button>
                                  <br><br><br>
                                  <center>
                                    <p>Hesabınız var mı ? </p>
                         <a href="/web/register/">
                    <button type="button" class="btn btn-outline-success "><i class="fas fa-user-plus"> KAYIT OL</i></button>
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
