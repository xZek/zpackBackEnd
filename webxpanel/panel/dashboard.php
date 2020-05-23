<?php
$page = 'dashboard';
require_once "../ajax/header.php";

?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anasayfa</h1>
           
          </div>
            <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">UYE SAYISI</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                $query = $conn->query("SELECT COUNT(*) FROM `kullanici`");
	
                $say = mysqli_fetch_array($query);
	
                  echo $say[0];
                   ?>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-users  fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">METIN SAYISI</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      	   <?php
                $query = $conn->query("SELECT COUNT(*) FROM `txt_user`");
	
                $say = mysqli_fetch_array($query);
	            
	            $query2 = $conn->query("SELECT COUNT(*) FROM `txt_anonim`");
	
                $say2 = mysqli_fetch_array($query2);
                  echo $say[0] + $say2[0];
                   ?>


                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-pencil-ruler  fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">RAPOR SAYISI</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          	   <?php
                      $query = $conn->query("SELECT COUNT(*) FROM `report`");
	
                      $say = mysqli_fetch_array($query);
	
                        echo $say[0];
                           ?>        
                          </div>
                        </div>
                      
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">MESAJ SAYISI</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      	  <?php
                      $query = $conn->query("SELECT COUNT(*) FROM `contact`");
	
                      $say = mysqli_fetch_array($query);
	
                        echo $say[0];
                           ?>        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
         

       
          <div class="row">

          

            <div class="col-lg-12 mb-4">

     
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">SISTEM HAKKINDA</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="/webxpanel/assets/img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Z-Pack admin paneli v0.1 sürümüdür.Burada Yapılan tüm işlemler loglarla saklanmaktadır.
                     <br>Mevcut Rütbeniz : 
                     <?php   
                    if($_SESSION["adm"] == 1)
                     {
                      echo "<font color='purple'>Moderator</font>";
                     }
                     else{
                      echo "<font color='red'>Yönetici</font>";
                     } 
                     ?>
                 </p>
                 </div>
              </div>


            </div>
          </div>

        </div>
 

      </div>
   <?php

include "../ajax/footer.php";

?>