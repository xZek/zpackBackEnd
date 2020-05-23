<?php
if(isset($_SESSION["username"]))
{
 //header("location: /index.php");
}

 ?>
<!-- LOGIN VE REGISTER İŞLEMI İÇİN OLAN HEADER YAPISIDIR !!!! -->


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
   <link href="/assets/css/background.css" rel="stylesheet">
      <link href="/assets/css/index.css" rel="stylesheet">
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
 <center> <img src="/assets/images/logo-white.png" height="100" width="100"></center>
  <div class="container py-5">
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card border-secondary">                    <div class="card-header">
