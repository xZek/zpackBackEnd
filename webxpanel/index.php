<?php

session_start();

?>
<?php require "../webxpanel/ajax/login.php"; ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Z-PACK  YONETICI  |  GIRIS YAP</title>
    

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/panel.min.css" rel="stylesheet" type="text/css" />


   <script src="/assets/js/705c13f970.js" crossorigin="anonymous"></script>
   <script src="/assets/js/jquery-3.4.1.js"></script>
   <script type="text/javascript" src="/assets/js/sweetalert2.js"></script>
   
   
  
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <b>YONETICI GIRISI
      </div>
      <div class="login-box-body">
         <form  method="post"> 
          <?php require "../webxpanel/ajax/error/usertxt_js.php"; ?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" id="username" maxlength="12" placeholder="Kullanici Adi" />
             </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="password" placeholder="******" maxlength="20" required=""/>
                </div>
        
            <div class="col-xs-4">
              <button name="login" class="btn btn-primary btn-block btn-flat">GIRIS YAP</button>
            </div>
          </div>
        </form>

      </div>
    </div>

 

   
  </body>
</html>