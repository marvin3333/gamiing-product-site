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
	<h2>Products</h2>
	<table width = "100%">
	<tr>
	   <th>item name</th>
	   <th>description</th>
	   <th>price</th>
	   <th>buy</th>
	 </tr>
	 <?php include("inc/dbc.php");
	   // $sql = "select * from bbunneym_gameSite.products order by id";
	   $sql = "select * from bbunneym_gameSite.products";
	    $results = mysql_query ($sql, $con);
		if($results == false)
			echo "<p>Error executing query</p>";
		if(mysql_num_rows($result) == 0)
			echo "<tr><td colspan = '4'> NO products to display </td></tr>";
		else
		{
			while($row = mysql_fetch_assoc($result))
			{
				echo "<tr>";
				   echo "<td align = 'center'>" . $row['title'] . "</td>";
				   echo "<td align = 'center'>" . $row['description'] . "</td>";
				    echo "<td align = 'center'>" . $row['price'] . "</td>";
					 echo "<td align = 'center'><a href = 'my_cart.php?id=" . $row['id'] . "'> Add to chart</a></td>";
				
				echo"</tr>";
				
				
				
			}
			
			
			
		}
	 ?>
	 
	 
	 </table>
	

	</section>

</div>

<?php include("inc/footer.inc") ;?>

</body>
</html>
