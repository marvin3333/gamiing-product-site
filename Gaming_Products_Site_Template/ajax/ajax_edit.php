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
<script src = "https://ajax.gooleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>

<script>
 $("document").ready(
      function()
	  {
		  $("#sendData").click(
		     function()
			 {  
			   var theId = $("#id").val();
			   var newTitle = $("#title").val();
			   var newContent = $("#message").val();
			   $.post("ajax/ajax_update.php",
			   { table:"home_page", id:theId, title:newTitle, message:newContent},
			   function(response, textStatus, jqXHR)
			   {
				   if(response)
				   {
				   $("#updatedResults").html("Response: " + response + "<b>" + textStatus +"</b>");
				   
				   $("updatedResults").append("<br><a href='home.php'> return to home</a>");
				   }
				   else
					   $("updatedResults").html("there was an error");
			   }
			   
			   
			   
			   
			   );
			 }
		  );
	    }
	  );
</script
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
	 <div id="updatedResults">
	    <?php
		   $id = $_GET['id'];
		   $table = $_GET['table'];
		   
		   include("inc/dbc_admin.php");
		   
		   
		   $sql = "select * from bbunneym_gameSite.$table where id='$id' ";
		   $result = mysql_query($sql, $con);
		   while($row = mysql_fetch_assoc($result))
		   {
			   echo '<input type="hidden" name="id" id ="id" value"' . $id . '">';
			   echo '<input type="hidden" name="table" id = "table" value"' . $table . '">';
			   echo '<p> <input type="text" name="title" id = "titel" value="' . $row['title'] . '"></p>';
			   echo '<p> <textarea name ="message" id="message" rows="20" cols="75">' . $row['message'] . '</textarea></p>';
			   
			   
		   }
		   
		
		
		?>
		
		<p> <input type="button" id = "sendData" name="btnSummit" value="Update"></p>
	
	</div>

	</section>



<?php include("inc/footer.inc") ;?>

</body>
</html>
