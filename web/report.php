
  <?php require "../../ajax/report.php"; ?>
    <?php require "../../ajax/error/usertxt_js.php"; ?>
<style>


button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.container {
  padding: 16px;
}

.reportform {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
  padding-top: 60px;
}


.reportform-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}


.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}


.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


}
</style>
</head>
<body>
<button onclick="document.getElementById('reportform').style.display='block'" class="btn-danger"><i class="fas fa-exclamation-triangle"></i> RAPORLA</button>

<div id="reportform" class="reportform">

  <form class="reportform-content animate" name="reportform" method="post">

      <span onclick="document.getElementById('reportform').style.display='none'" class="close" title="Close reportform">&times;</span>

      <div class="container"><?php
if(!isset($_SESSION["username"]))
{
 echo "<center><h1>GIRIS YAPMALISINIZ</center></h1>";
 echo "<a href='/web/login/'><input type='button'  class='btn-info' value='GIRIS YAP' /></a>";
 exit();
}

 ?>
        <form action="/action_page.php">

          <?php
           if($fromName == "")
           {
            echo "<input type='hidden' name='isUser' value='0'>";
           }
           else{
             echo "<input type='hidden' name='isUser' value='1'>"; 
           }
          ?>
        <div class="row">
          <div class="col-25">
            <label for="reason">Raporlama Nedeniniz : </label>
          </div>
          <div class="col-75">
            <select name="reason">
              <option value="1">Spam Gönderi</option>
              <option value="2">İzinsiz Kişisel bilgilerin paylaşılması</option>
              <option value="3">Uygunsuz İçerik</option>
              <option value="4">Diğer</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="description">Açıklama Giriniz : </label>
          </div>
          <div class="col-75">
            <textarea id="subject" name="description" placeholder="Açıklama.." style="height:200px"></textarea>
          </div>
        </div>
        <br>
    
          <button type="submit" name="report" class="btn-danger "><i class="fas fa-share"></i> GÖNDER</button>


        </form>
      </div>


    </div>

<script>

var reportform = document.getElementById('reportform');


window.onclick = function(event) {
    if (event.target == reportform) {
        reportform.style.display = "none";
    }
}
</script>
