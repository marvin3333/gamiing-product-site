<?php
session_start();
$cart = $_COOKIE['MyGameProducts'];
if (isset ($_POST['clear']))// clear the shopping cart
{
	$expire = time() - 60 * 60 * 24  * 365; 
	setcookie ("MyGameProducts" ,$cart , $expire);
	header ("Location:my_cart.php");
	
	
}//closes if

if($cart && $_GET['id']) //add product to chart
{
	$cart .= ',' . $_GET['id'];
	$expire = time() + 60 * 60 * 24  * 365;
	setcookie("MyGameProducts" , $cart , $expire);
	header("Location:my_cart.php");
    	
	
}//closes if


if(!$cart && $_GET['id'])// start a new cart
{
	$cart = $_GET['id'];
	$expire = time() + 60 * 60 * 24  * 365;
	setcookie("MyGameProducts" , $cart , $expire);
	header("Location:my_cart.php");
    	
	
}//closes if

if($cart && $_GET['remove_id']) //remove item froom chart
{
	$remove_item = $_GET['remove_id'];
	$arr = explode(",", $cart);
	unset($arr[$remove_item -1]);
	$new_cart = implode(",", $arr);
	$new_cart = rtrim($new_cart, ",");
	$expire = time() + 60 * 60 * 24  * 365;
	setcookie("MyGameProducts" , $new_cart , $expire);
	header("Location:my_cart.php");
	
	
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
	<h2> My cart </h2>
	<table width = "100%">
	 <tr>
	    <th> Item name </th>
		<th> description </th>
		<th> price </th>
		<th> action </th>
	 
	 
	 </tr>
	<?php
	
	   $cart = $_COOKIE['MyGameProducts'];
	   if($cart)
	   {
		   $i = 1;
		   include("inc/dbc.php");
		   $items = explode(",", $cart);
		   
		   foreach($items as $item)
		   {
			   $sql = "select * from bbunneym_gameSite.products where id = '$item'";
			   $result = mysql_query($sql , $con);
			   if($result == false)
				   echo "Error executing query";
			   else
			   {
				   while($row = mysql_fetch_assoc($result))
				   {
					   echo "<tr>";
					   echo "<td align = 'left'>" . $row['title'] . "</td>";
					   
					   echo "<td align = 'left'>" . $row['description'] . "</td>";
					   echo "<td align = 'left'>" . $row['price'] . "</td>";
					   echo "<td align = 'left'><a href='my_cart.php?remove_id=" . $i ."'>remove </a></td></tr>";
					   echo "</tr>";
				   }//close while loop
				   $i++;
				   
				   
			   }//close else
			   
		   }
		   
	   }
	
	?>
	
	</table>
	</br>
	<form method = "post" action = "my_cart.php">
	 <input type = "submit" name="clear" value="Empty cart" style = "margin-left: 40px">
	 </form>

	</section>

</div>

<?php include("inc/footer.inc") ;?>

</body>
</html>
