<?php
include "../../webxpanel/ajax/connect.php";
session_start();

if($_SESSION["adm"] == 1)
{
  //MODERATOR YETKILI
}
else if ($_SESSION["adm"] == 2) {
  //EN UST YONETICI
}
else{
header("location:/webxpanel/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Z-PACK</title>
 <!-- Custom fonts for this template-->
  <link href="/webxpanel/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="/webxpanel/assets/css/sb-admin-2.min.css" rel="stylesheet">
   <script src="/assets/js/jquery-3.4.1.js"></script>
   <script type="text/javascript" src="/assets/js/sweetalert2.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
        <img src="/webxpanel/assets/img/logo-white.png" height="70" width="70">
        </div>
        <div class="sidebar-brand-text mx-2"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($page=='dashboard') {echo 'active';} ?>">
        <a class="nav-link" href="/webxpanel/panel/dashboard.php">
        <i class="fas fa-home"></i>
          <span>Anasayfa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Kullanici İşlemleri
      </div>

     <?php if ($_SESSION["adm"] == 2)
     {
      echo "<li class='nav-item "; 
       if($page=="show_txt") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/webxpanel/panel/show_txt.php'>
         <i class='fas fa-file-word'></i>
          <span>Yazilan Metinler</span>
        </a>
      </li>";
     }
     else{

     } ?>
      
            <li class="nav-item <?php if($page=='show_report') {echo 'active';} ?>">
        <a class="nav-link" href="/webxpanel/panel/show_report.php">
      <i class="fas fa-exclamation-circle"></i>
          <span>Raporlar</span>
        </a>
      </li>
       
              <li class="nav-item <?php if($page=='show_contact') {echo 'active';} ?>" >
        <a class="nav-link" href="/webxpanel/panel/show_contact.php">
      <i class="fas fa-comments"></i>
          <span>Mesajlar</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     <?php if ($_SESSION["adm"] == 2)
     {
      echo "
      <!-- Heading -->
      <div class='sidebar-heading'>
        Yönetim Düzenleme
      </div>";

          echo "<li class='nav-item "; 
       if($page=="create_admin") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/webxpanel/panel/create_admin.php'>
      <i class='fas fa-user-plus'></i>
          <span>Admin Ekle</span>
        </a>
      </li>";
        echo "<li class='nav-item "; 
       if($page=="manage_user") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/webxpanel/panel/manage_user.php'>
       <i class='fas fa-users-cog'></i>
          <span>Admin / Kullanici Düzenle</span>
        </a>
      </li>
          

              ";
			  echo "<li class='nav-item "; 
       if($page=="banned_user") {
        echo "active";
        } echo "'>
        <a class='nav-link' href='/webxpanel/panel/banned_user.php'>
        <i class='fas fa-user-times'></i>
          <span>Kullanici Sil</span>
        </a>  <!-- Divider -->
      <hr class='sidebar-divider d-none d-md-block'>

      </li>";
    }
    ?>
    
      <!-- Sidebar Toggler (Sidebar) -->
      <div class='text-center d-none d-md-inline'>
        <button class='rounded-circle border-0' id='sidebarToggle'></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id='content-wrapper' class='d-flex flex-column'>

      <!-- Main Content -->
      <div id='content'>

        <!-- Topbar -->
        <nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow'>

          <!-- Sidebar Toggle (Topbar) -->
          <button id='sidebarToggleTop' class='btn btn-link d-md-none rounded-circle mr-3'>
            <i class='fa fa-bars'></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class='navbar-nav ml-auto'>

      
           
            </li>


           

           

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["username"]; ?></span>
                <img class="img-profile rounded-circle" src="/webxpanel/assets/img/logo.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if ($_SESSION["adm"] == 2)
                 {
                 echo "
                <a class='dropdown-item' href='log.php'>
                  <i class='fas fa-list fa-sm fa-fw mr-2 text-gray-400'></i>
                 Loglar
                </a>  
                 <div class='dropdown-divider'></div>";
              } ?>
             
                <a class="dropdown-item" href="/webxpanel/panel/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Çıkış Yap
                </a>
              </div>
            </li>

          </ul>

        </nav> <div class="container-fluid">