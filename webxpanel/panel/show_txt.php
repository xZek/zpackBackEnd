 <?php
$page='show_txt';
require_once "../ajax/header.php";
if($_SESSION["adm"] == 2)
{
 
}else{
  echo "   <div class='card shadow mb-4'>
            <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
              <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
                <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>
                   <div class='card shadow mb-4'>
                <div class='card-header py-3'>
              <h1 class='m-0 font-weight-bold text-primary'>YETERSİZ YETKI</h1></div></div>";
exit();
}
?>
<style>
  .anon{ display : none;  }
</style>
 <script type="text/javascript" src="/webxpanel/assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
         $(document).ready(function(){
           $(".kayitli").click(function(){
             $(".kyt").show();
             $(".anon").hide();
             $(".kayitli").addClass('active');
             $(".anonim").removeClass('active');
           });
           $(".anonim").click(function(){
             $(".anon").show();
             $(".kyt").hide();
             $(".anonim").addClass('active');
             $(".kayitli").removeClass('active');
           });
         });
       </script>

  <!-- Page Heading -->
        <CENTER>
          <button class="btn btn-info kayitli active">KAYITLI KULLANICILARIN YAZDIGI METINLER</button> 
          <button class="btn btn-info anonim">ANONIM  KULLANICILARIN YAZDIGI METINLER</button>
        </CENTER>
        <br>
          <!-- DataTales Example -->
          <div class="kyt">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">KAYITLI KULLANICILARIN YAZDIĞI METİNLER</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SIRA</th>
                      <th>İSİM</th>
                      <th>BAŞLIK</th>
                      <th>AÇIKLAMA</th>
                      <th>LİNK</th>
                      <th>OLUŞTURMA TARİHİ</th>
                      <th>GÖRÜNÜM</th>
                      <th>IŞLEM</th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
        $getTxt = $conn->query("select * from txt_user");
        $i=0;
          //Bu değişken içerisine çekilen tabloyu bir döngü ile b isimli dizi içerisine çekiyoruz.
          while ($txt=mysqli_fetch_array($getTxt)){


              //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
              $autoID = $txt['autoID'];
              $from = $txt['fromName'];
              $title = $txt['title'];
              $description = $txt['description'];
              $create_date = $txt['create_date'];
              $token = $txt['shareLink'];
              $visible = $txt['visible'];
              $i +=1;

 
  echo "<tr>
        <form action='' method='post'>
      <input type='hidden' name='id' value='$autoID'>
      <td> $i </td>
      <td> $from </td>
      <td>$title</td>
      <td>";
      if (strlen($description)>20) {
     echo substr($description,0,20)."...";
      } else {
      echo $description;
       }echo"</td>

      <td><a href='/web/Link/index.php?token=$token' target='_blank'>İnceleme Linki</td>
      <td>$create_date </td>
      <td>"; 
       if($visible == 0)
            {
              echo "Görünüm Kapalı";
            }else{
              echo "Herkeze Açık";
            }       
            echo "</td> </form>
       <td><button class='btn btn-danger' type='submit'  onclick='veriSil($autoID)'><i class='far fa-trash-alt'></i></button></td>
      </tr>";

     }
             ?>
    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
         </div>
       
        <!-- /.container-fluid -->

     
 <div class="anon">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">ANONIM KULLANICILARIN YAZDIĞI METİNLER</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SIRA</th>
                      <th>IP</th>
                      <th>BASLIK</th>
                      <th>ACIKLAMA</th>
                      <th>INCELEME LINKI</th>
                      <th>OLUSTURMA TARIHI</th>
                      <th>GORUNUM</th>
                      <th>IŞLEM</th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
        $getTxt = $conn->query("select * from txt_anonim");
        $i=0;
          //Bu değişken içerisine çekilen tabloyu bir döngü ile b isimli dizi içerisine çekiyoruz.
          while ($txt=mysqli_fetch_array($getTxt)){


              //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
              $ID = $txt["ID"];
              $from = $txt['IP'];
              $title = $txt['title'];
              $description = $txt['description'];
              $create_date = $txt['create_date'];
              $token = $txt['shareLink'];
              $visible = $txt['visible'];
              $i +=1;

 
  echo "<tr>
    <form action='' method='post'>
      <input type='hidden' name='id' value='$ID'>
      <td> $i </td>
      <td> $from </td>
      <td>$title</td>
      <td>";
      if (strlen($description)>20) {
     echo substr($description,0,20)."...";
      } else {
      echo $description;
       }echo"</td>
      <td><a href='/web/getLink/index.php?token=$token' target='_blank'>İnceleme Linki</td>
      <td>$create_date </td>
      <td>"; 
       if($visible == 0)
            {
              echo "Görünüm Kapalı";
            }else{
              echo "Herkeze Açık";
            }       
            echo "</td></form>
     <td><button class='btn btn-danger' type='submit'  onclick='veriSil2($ID)'><i class='far fa-trash-alt'></i></button></td>
      </tr>";

     }
             ?>
    
                  </tbody>
                </table>
          
            </div>
          </div>

        <!-- /.container-fluid -->
<script>
    function veriSil(id) {




         Swal.fire({
           title: 'Emin misin?',
           text: "Bu işlemi geri alamazsın!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
          cancelButtonText: 'Vazgeçtim',
          confirmButtonText: 'Sil Gitsin!'
         }).then((result) => {
           if (result.value) {
             $.ajax({
              type: "POST",
              url: "../ajax/delete_user.php",//silme işlemi başka sayfada olacaksa dosya adı gir
             data:{"id":id},
          });

          Swal.fire({
              icon: 'success',
              title: 'Silme İşlemi Başarıyla Gerçekleşti',
             showConfirmButton: false,
              timer: 1500
           })
             setTimeout(function(){
        location.reload();
             },1800);
           }
         })
       };
       function veriSil2(id) {




         Swal.fire({
           title: 'Emin misin?',
           text: "Bu işlemi geri alamazsın!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
          cancelButtonText: 'Vazgeçtim',
          confirmButtonText: 'Sil Gitsin!'
         }).then((result) => {
           if (result.value) {
             $.ajax({
              type: "POST",
              url: "../ajax/delete_anonim.php",//silme işlemi başka sayfada olacaksa dosya adı gir
             data:{"id":id},
          });

          Swal.fire({
              icon: 'success',
              title: 'Silme İşlemi Başarıyla Gerçekleşti',
             showConfirmButton: false,
              timer: 1500
           })
             setTimeout(function(){
        location.reload();
             },1800);
           }
         })
       };
</script>

      </div>
    </div>
  </div>
</div>
       <?php


include "../ajax/footer.php";

?>