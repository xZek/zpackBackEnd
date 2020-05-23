<?php


$UID = $_SESSION['ID'];

////////////////////////////// DUZENLEME SORGUSU ////////////////////////////
if(isset($_POST["duzenle"]))
{
	$autoID = $_POST["id"];


		$sorgu = $conn->query("SELECT * FROM txt_user WHERE autoID LIKE '%$autoID%' AND fromID ='$UID'");
		$sayi = mysqli_num_rows($sorgu);
	  if($sayi < 1)
		{
			$error = true;
			$errormessage = "Dosya silinmiş Olabilir.";
		}else{

		}
		while($row = mysqli_fetch_array($sorgu)){
      echo "
      <form action='' method='post'>

    <input type='hidden' name='id' class='form-control' value='".$row['autoID']."'>


    <div class='input-group mb-3'>
    <div class='input-group-prepend'>
    <span class='input-group-text' id='basic-addon1'> <i class='fa fa-user icon'></i></span>
    </div>
    <input type='text' name='title' class='form-control' value='".$row['title']."'>	</div>
    <textarea name='description' id='editor1' rows='10' cols='10'>
      ".$row['description']."
    </textarea><br>
		<center>
			<select class='input-group-text' name='visible'>
						<option value='".$row['visible']."'>Görünür Durumu</option>
						<option value='0'>Sadece Ben</option>
						<option value='1'>Herkese Açık</option>
			</select>
<br>
    <button type='submit' name='save' class='btn btn-outline-secondary'><i class='fas fa-save'></i> KAYDET</button>
     </form>";
        }




    }


////////////////////////////// DUZENLEME SORGUSU ////////////////////////////
?>

<?php
///////////////////////// GUNCELLE ///////////////////////////

    if(isset($_POST["save"]))
		{
			$autoID = $_POST["id"];
      $title = $_POST["title"];
			$description = $_POST["description"];
      $visible = $_POST["visible"];
			if($title == "")
			{
				$error = true;
				$errormessage = "Baslik Girmedin !";
			}
			else if($description == ""){

				$error = true;
				$errormessage = "Açıklama Girmedin !";

			}
			elseif ($visible == "") {
				$error = true;
				$errormessage = "Görünürlük durumunu seçiniz.";
			}
			else if($autoID ==  "")
			{
				$error = true;
				$errormessage = "ID BOŞ OLAMAZ !.";
			}else{


      $guncelle = "UPDATE txt_user SET title='$title',  description='$description',  visible='$visible'  WHERE autoID='$autoID' AND fromID='$UID'";
			$calistir= mysqli_query($conn,$guncelle);
       if($calistir>0)
			{
				echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
			}else{
		 echo "<div class='alert alert-danger' role='alert'>Veriye Ulaşılamiyor";
			}


		}
	}
///////////////////////// GUNCELLE ///////////////////////////
	?>
