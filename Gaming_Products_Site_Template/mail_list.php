
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
	<h2> the mailing list </h2>
	<table width= "100%" cellpadding ="5">
	<tr>
	   <th>Name</th>
	   <th>Phone</th>
	   <th>Email</th>
	   <th>Comments</th>
	   </tr>
	   <?php 
	     include ("inc/dbc.php");
		 $query = "select * from bbunneym_gameSite.mailing_list";
		 $result = mysql_query($query, $con);
		 
		 if($result == false)
			 echo  "<p> error  " . mysql_error($con) . "</p>";
		 
		if(mysql_num_rows($result) == 0)
			 echo  "<p> no data in email list </p>";
		 
		while($row = mysql_fetch_assoc($result))
		 {
			 echo "<tr>";
			 echo "<td> ". $row['name'] . "</td>";
			 echo "<td> ". $row['phone']  . "</td>";
			 echo "<td> ". $row['email'] . "</td>";
			 echo "<td> ". $row['comments'] . "</td>";
			 echo "</tr>";
			 
		 } 
		 ?>

	</section>

</div>

<?php include("inc/footer.inc") ;?>

</body>
</html>