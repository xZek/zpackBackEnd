<?php



   if(isset($_POST["update"]))
   {
         
     
     $done = $_POST["done"];

   
      $guncelle = "UPDATE report SET done='$done' WHERE ID='$ID'";
      	if (mysqli_query($conn,$guncelle)) {
     //BASARI
    		echo "<div class='alert alert-success' role='alert'>Basarıyla Kaydedilmiştir.</div>";
    	   echo '<meta http-equiv="refresh" content="1; URL=show_report.php">';
	
     }
     else {
    	echo "<div class='alert alert-warning' role='alert'>HATA.</div>";	
     }
 }
  ?>