<?php
$page='banned_user';
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
?><div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">KULLANICI SİL</h6>
            </div><div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SIRA</th>
                      <th>ID</th>
                      <th>KULLANICI ADI</th>
                      <th>EMAIL</th>
                      <th>KAYIT OLMA TARİHİ</th>
					  <th>YETKI</th>
                      <th>IŞLEM</th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
        $getTxt = $conn->query("select * from kullanici");
        $i=0;
          //Bu değişken içerisine çekilen tabloyu bir döngü ile b isimli dizi içerisine çekiyoruz.
          while ($txt=mysqli_fetch_array($getTxt)){


              //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
              $ID = $txt['ID'];
              $username = $txt['username'];
              $email = $txt['email'];
              $reg_date = $txt['reg_date'];
			  $adm = $txt['adm'];
              $i +=1;

 
  echo "<tr>
        <form action='' method='post'>
      <input type='hidden' name='id' value='$ID'>
      <td> $i </td>
      <td> $ID </td>
      <td>$username</td>
      <td>$email</td>
      <td>$reg_date</td>
      <td>"; 
       if($adm == 0)
            {
              echo "Normal Kulanıcı";
            }
	     else if($adm == 1)
		    {
		     echo "<font color='purple'>Moderator</font>";
		    }
		  else{
              echo "<font color='red'>Yönetici</font>";
            }       
            echo "</td> 
			</form>
       <td><button class='btn btn-danger' type='submit'  onclick='hesapsil($ID)'><i class='fas fa-user-slash'></i></button></td>
      </tr>";

     }
             ?>
    
                  </tbody>
                </table>
              </div>
         </div>

		 
		 <script>
    function hesapsil(id) {




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
              url: "../ajax/user_Delete.php",//silme işlemi başka sayfada olacaksa dosya adı gir
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
       <?php


include "../ajax/footer.php";

?>