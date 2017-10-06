<?php

session_start();
$user = $_SESSION['user'];
if(!isset($user))
{
	header("location: admin_login.php");
}


?>




<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("inc/header.inc"); ?>

<?php include ("inc/nav.inc") ;?>

<div id="wrapper">


<?php include ("inc/aside.inc");?>


	<section>
	<h2>update home page</h2>
	<?php
	
	    if(isset($_POST['btnSubmit']))
		{
			include("inc/dbc_admin.php");
			
			$table = $_POST['table'];
			$id = $_POST ['id'];
		    $title = $_POST['title'];
			$message = $_POST['message'];
			
			$sql = "update bbunneym_gameSite.$table set title= '$title', message = '$message' where id = '$id'";
			  
		   $result - mysql_query($sql, $con);
				   
				   if($result != 0)
					   $msg = "<h2> your content was successfully updated. </h2>";
		}
	
	
	
	?>
	<form  method = "post" action = "<?php $_SERVER['PHP_SELF']; ?>">
	    <?php
		   $id = $_GET['id'];
		   $table = $_GET['table'];
		   
		   include("inc/dbc_admin.php");
		   
		   
		   $sql = "select * from bbunneym_gameSite.$table where id='$id' ";
		   $result = mysql_query($sql, $con);
		   while($row = mysql_fetch_assoc($result))
		   {
			   echo '<input type="hidden" name="id" value"' . $id . '">';
			   echo '<input type="hidden" name="table" value"' . $table . '">';
			   echo '<p> <input type="text" name="title" value="' . $row['title'] . '"></p>';
			   echo '<p> <textarea name ="message" rows="20" cols="75">' . $row['message'] . '</textarea></p>';
			   
			   
		   }
		   
		
		
		?>
		
		<p> <input type="submit" name=btnSummit" value="Update"></p>
	
	</form>

	</section>

</div>

<?php include("inc/footer.inc") ;?>

</body>
</html>
