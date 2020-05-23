<?php
session_start();
if(!isset($_SESSION["username"]))
{
 //header("location: /web/login/");
}

 ?>
<script>
// LOCAL STORAGE KISMINDAKI VERIYI SAKLAR
 localStorage.clear();
</script>


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
        <?php

        if(!isset($_SESSION["username"]))
        {
          echo "<a class='btn btn-sm btn-outline-secondary' href='/web/register/'>";
          echo "<svg id='i-user' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='24' height='24' fill='none'
           stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>";
          echo "<path d='M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22
           11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z' /> </svg>";

          echo "  Kayıt Ol</a>";

          echo "<a class='btn btn-sm btn-outline-secondary' href='/web/login/'>";
          echo "<svg id='i-signin' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='24';
         height='24' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
        <path d='M3 16 L23 16 M15 8 L23 16 15 24 M21 4 L29 4 29 28 21 28' />
         </svg>";
       echo "Giriş Yap </a>";

    }
    else
    {
      echo "<a class='btn btn-sm btn-outline-secondary' href='#'>";
      echo "<svg id='i-user' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='24' height='24' fill='none'
       stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>";
      echo "<path d='M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22
       11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z' /> </svg>";
      echo "Hoşgeldiniz Sayın : ";
      echo $_SESSION["username"];
      echo "</a>";
    echo "<a class='btn btn-sm btn-outline-secondary' href='/web/logout/'>";
    echo "<svg id='i-signin' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='24'
   height='24' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
  <path d='M3 16 L23 16 M15 8 L23 16 15 24 M21 4 L29 4 29 28 21 28' />
   </svg>
  Çıkış Yap </a>";
    }
    ?>



      </div>
    </div>
  </header>


    <div class="testxx topBotomBordersOut">
      <nav class="nav d-flex justify-content-between">


        <?php

        if(!isset($_SESSION["username"]))
        {
          echo "<a class='p-2 text-muted' href='/'>Anasayfa</a>";
          echo "<a class='p-2 text-muted' href='/web/write_anonim'>Yazı Ekle</a>";
        }
        else{
              echo "<a class='p-2 text-muted' href='/web/dashboard'>Anasayfa</a>";
              echo "<a class='p-2 text-muted' href='/web/write_user'>Yazı Ekle</a>";
              echo "<a class='p-2 text-muted' href='/web/history'>Kutuphane</a>";
              echo "<a class='p-2 text-muted' href='/web/chat'>Sohbet Grubu</a>";
        }
        ?>
        <a class="p-2 text-muted" href="/web/searchlink">Link Sorgula</a>
        <a class="p-2 text-muted" href="/web/contact">İletisim</a>

      </nav>
    </div>
    <div class="testx">
      <hr>

  </div>


  <div class="jumbotron p-4 p-md-7 text-white rounded bg-dark">
    <div class="col-md-12 px-5">
    <center>  <h1 class="display-6 font-italic">Z-PACK ONLINE METIN PAYLASIM PLATFORMU</h1>
      <p class="lead my-3">Z-Pack online bir metin paylaşım platformudur.Metin yazma ve düzenlemeyi kolaylaştırmak için gerekli tüm özelliklere sahiptir</p>
    </div></center>
  </div>

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4 col-md-12 px-5" align="center">
        <img src="/assets/images/disk.png" height="150" width="150">
        <h3>Büyük dosya ve uzun hat desteği</h3>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 col-md-12 px-5"  align="center">
        <img src="/assets/images/backup.png" height="160" width="160">  <h2>Otomatik Yedekleme desteği</h2>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 col-md-12 px-5" align="center">
        <img src="/assets/images/pass.png" height="150" width="150">  <h2>Ücretsiz Erişim</h2></center>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->



</main><!-- /.container -->



<footer class="blog-footer">
<a href=""><p> Created Z-PACK |2020| </p></a>

</footer>


</body></html>
