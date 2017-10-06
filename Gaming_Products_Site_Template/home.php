<?php

  session_start();
  $user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("inc/header.inc"); ?>

<?php include ("inc/nav.inc"); ?>

<div id="wrapper">


<?php include ("inc/aside.inc"); ?>

	<section>
	<?php include ("inc/dbc.php");
	     
		 //prepare and execute query
	     $query = "select * from bbunneym_gameSite.home_page order by id desc;";
		 $result = mysql_query($query, $con);
		 
		 
		 //no result means something is wrong..could run query
		 if($result == false)
		    echo "<p> error executing query </p>";
		
		//check to see if we got any data back
		if(mysql_num_rows($result) ==0)
			echo "<p> no data returned </p>";
		
		//pull data one row at a time
		while($row = mysql_fetch_assoc($result))
		{
			if(isset($user))
			{
				echo "<div style = 'float:right; padding: 10px'>";
				echo "<a href = 'ajax_edit.php?id= " . $row["id"] . "$table = home_page'> Edit </a>";/*check*/
				echo "</div>";
			}
			echo "<h2>" . $row["title"] . "</h2>";
			echo "<p>" . $row["message"] . "</p>";
			
		}//closes while loop
		
		//clean up memory close connection
		mysql_free_result($result);
		mysql_close ($con);
	
	?>
	

	</section>

</div>

<?php include("inc/footer.inc"); ?>

</body>
</html>
