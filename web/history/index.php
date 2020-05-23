<?php include "../../ajax/connect.php"; ?>
<?php include "../header.php"; ?>
<?php include "../../ajax/user/txt_make.php"; ?>
<?php
if(isset($_SESSION["username"]))
{

}
else{
header("location:/index.php");
}
?>
<?php
 $own = $_SESSION['ID']; ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
        <th scope="col">Başlık</th>
      <th scope="col">Oluşturma Tarihi</th>
      <th scope="col">Düzenle</th>
      <th scope="col">Link Getir</th>
      <th scope="col">Sil</th>

    </tr>
  </thead>
  <tbody>
<?php
        $getTxt = $conn->query("select * from txt_user where fromID = '$own' ");
        $i=0;
          //Bu değişken içerisine çekilen tabloyu bir döngü ile b isimli dizi içerisine çekiyoruz.
          while ($txt=mysqli_fetch_array($getTxt)){


              //Dizi içerisine giriyoruz ve Tablo içerisinden çekilecek olan tüm sütunları tek tek değişken ierisine atıyoruz.
              $autoID = $txt['autoID'];
              $title = $txt['title'];
              $create_date = $txt['create_date'];
              $token = $txt['shareLink'];
              $i +=1;
        
             
    
             

  echo "<tr>

      <th scope='row'> $i </th>
      <td>$title</td>
      <td>$create_date </td>

      <form action='' method='post'>
      <input type='hidden' name='id' value='$autoID'>
     <input type='hidden' name='token' value='$token'>
   <td>  <button class='btn btn-info' name='duzenle'><i class='far fa-edit'></i></button></td>
     </form>
       <td><a href='/web/Link/index.php?token=$token' class='btn btn-success'><i class='fas fa-link'></i></a></td>
  <td><button class='btn btn-danger' type='submit'  onclick='veriSil($autoID)'><i class='far fa-trash-alt'></i></button></td>


    </tr>";

  }
   ?>
  <script>
  CKEDITOR.replace( 'editor1' );
  </script>
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
              url: "../../ajax/user/delete.php",//silme işlemi başka sayfada olacaksa dosya adı gir
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
  </tbody>
</table>
