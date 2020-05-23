<?php



   if(isset($_POST["update"]))
   {
  

   
      $guncelle = "UPDATE contact SET done=1 WHERE ID='$ID'";
      	if (mysqli_query($conn,$guncelle)) {
     //BASARI
    		echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
    	   echo '<meta http-equiv="refresh" content="1; URL=show_contact.php">';
	
     }
     else {
    	echo "<div class='alert alert-warning' role='alert'>HATA.</div>";	
     }
 }
  ?>  