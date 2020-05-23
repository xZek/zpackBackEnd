
<?php




////////////////////////////// ARAMA KISMI SORGUSU ////////////////////////////
if(isset($_POST["ara"]))
{
	$link = $_POST["link"];
	if(empty($link)){
		$error = true;
		$errormessage = "Aranacak Kelime Boş Olamaz.";

	}else{
		$sorgu = $conn->query("SELECT * FROM txt_anonim WHERE URL LIKE '%$link%'");
		$sayi = mysqli_num_rows($sorgu);
	  if($sayi < 1)
		{
			$error = true;
			$errormessage = "Kod Bulunamadı.";
		}else{

		}
		while($listele = mysqli_fetch_array($sorgu)){



////////////////////////////// ARAMA KISMI SORGUSU ////////////////////////////
?>


      <?php
////////////////////////////// ARAMA SONUÇLARI /////////////////////////////////
			echo "
      <form action='' method='post'>

		<input type='hidden' name='url' class='form-control' value='".$listele['URL']."'>

			<div class='input-group mb-3'>
			<div class='input-group-prepend'>
			<span class='input-group-text' id='basic-addon1'> <i class='fas fa-link'></i></span>
			</div>
			<input type='text' name='title' class='form-control' value='http:/www.zpack.space/web/getLink/index.php?token=".$listele['shareLink']."' disabled>	</div>

	<div class='input-group mb-3'>
	<div class='input-group-prepend'>
	<span class='input-group-text' id='basic-addon1'> <i class='fa fa-user icon'></i></span>
	</div>
	<input type='text' name='title' class='form-control' value='".$listele['title']."'>	</div>
	<textarea name='description' id='editor1' rows='10' cols='10'>
      ".$listele['description']."
	</textarea>
	<center><br>
		<select class='input-group-text' name='visible'>
					<option value='".$listele['visible']."'>Görünür Durumu</option>
					<option value='0'>Sadece Ben</option>
					<option value='1'>Herkese Açık</option>
		</select>
		<br>
	<button type='submit' name='guncelle' class='btn btn-outline-secondary'><i class='fas fa-save'></i> KAYDET</button>
	<button type='submit' name='sil' class='btn btn-outline-danger'><i class='far fa-trash-alt'></i> SIL</button>
     </form>";
    	  }
  }
  }
////////////////////////////// ARAMA SONUÇLARI /////////////////////////////////
  ?>

<?php
///////////////////////// ARAMA SONUÇLARINI GUNCELLE ///////////////////////////

    if(isset($_POST["guncelle"]))
		{
			$URL = $_POST["url"];
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
			elseif ($visible =="") {

				$error = true;
				$errormessage = "Görünürlüğü seçiniz !";

			}
			else if($URL ==  "")
			{
				$error = true;
				$errormessage = "Url Boş Bırakamazsın !.";
			}else{
      $guncelle = "UPDATE txt_anonim SET title='$title',  description='$description', visible='$visible'  WHERE URL='$URL'";
			$calistir= mysqli_query($conn,$guncelle);
      if($calistir>0)
			{
				echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
			}else{
		 echo "<div class='alert alert-danger' role='alert'>Veriye Ulaşılamiyor";
			}


		}
	}
///////////////////////// ARAMA SONUÇLARINI GUNCELLE ///////////////////////////
	?>

	<?php
	///////////////////////// ARAMA SONUÇLARINI GUNCELLE ///////////////////////////

	    if(isset($_POST["sil"]))
			{
				$URL = $_POST["url"];

 			   $sil = "DELETE FROM txt_anonim WHERE URL='$URL' ";
 			   $calistir= mysqli_query($conn,$sil);
 			   if($calistir)
 			  {
 			  		echo "<div class='alert alert-success' role='alert'>Basarıyla Silinmiştir.</div>";
 			  }else{
					echo "<div class='alert alert-danger' role='alert'>Veriye Ulaşılamiyor";
     }
	 }
	///////////////////////// ARAMA SONUÇLARINI GUNCELLE ///////////////////////////
		?>
