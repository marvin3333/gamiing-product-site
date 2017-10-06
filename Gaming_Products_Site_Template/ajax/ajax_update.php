<?php
 if(isset ($_POST(['id']))
 {
	 include("../inc/dbc_admin.php"); 
	 $table = $_POST['table'];
	 $id = $_POST['id'];
	 $title = $_POST['title'];
	 $message = $_POST['message'];
	 
	 $sql = "update bbunneym_gameSite.$table set " 
	        . "title = '$title' , "
			. "message='$message' "
			. "where id = $id";
			
	$result = mysql_query($sql , $con);
	
	if($result)
		echo "your content did update  <br/> ";
	else
		echo " there was an error  <br/>";
			
	 
 }



?>



