
<?php

session_start();
if(!isset($_SESSION["username"]))
{
 //header("location: /web/login/");
}
 ?>

    <html lang="tr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Z3k Online Yazi Kaydetme">
    <meta name="author" content="saving txt file,metin kaydet,metin kaydedici,online yazi kaydet">
    <meta name="generator" content="">
    <title>Z-PACK ONLINE METIN PAYLASIM PLATFORMU</title>


      <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script type="text/javascript" src="/assets/js/sweetalert2.js"></script>
   <script src="/assets/ckeditor/ckeditor.js"></script>
   <script src="https://kit.fontawesome.com/705c13f970.js" crossorigin="anonymous"></script>
   <!-- JS -->

    <!-- Bootstrap core CSS -->
   <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <!-- Bootstrap core CSS -->

      <!-- My Css -->
   <link href="/assets/css/index.css" rel="stylesheet">
    <link href="/assets/css/button.css" rel="stylesheet">
      <!-- My Css -->


    </head>
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

<script type="text/javascript">
$(window).on("load",function(){
   $(".loader-wrapper").fadeOut("slow");
});
</script>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">

      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#"><img src="/assets/images/logo.png" height="50" width="50"></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
      </div>
    </div>
<?php include "../../ajax/connect.php"; ?>
<?php require "../../ajax/confirm.php"; ?>


<form action="" method="post">
    <?php require "../../ajax/error/usertxt_js.php"; ?>
    <br><br>
    <hr>
    <center><h1>MAIL UZERINDEN GELEN KODU GIRINIZ</h1>
    
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="key" class="form-control" placeholder="Verilen Kod'u Giriniz" aria-label="Verilen Kod'u Giriniz" aria-describedby="basic-addon1">
  </div>

  <center>
    <button type="submit" name="confirm" class="btn btn-outline-secondary"><i class="fas fa-check-circle"></i> ONAYLA</button>
</form>
