<?php
session_start();
if(isset($_POST['btnSubmit']))
{
	$email = trim($_POST['txtEmail']); //no white space before and after data
	$pwd = md5(trim($_POST['txtPassword']));
	
	
	include("inc/dbc.php");
	$sql = "select * from bbunneym_gameSite.users where email = '$email' and password = '$pwd';";   /* check */
    $result = mysql_query ($sql, $con);
   if(mysql_num_rows ($result) == 0 )
        $msg = "<h2>  style = 'color: red;'> incorrect email or password </h2>";
    else
	{
		$_SESSION['user'] = $email;
		$msg = "<h2> login successful </h2>";

	}
	
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
	<h2> Admin Login</h2>
	<?php
	 if(isset ($msg)) 
		 echo $msg . "<br/>";
	
	?>
	
	<form method="post" name="frmlogin" action="<? $_SERVER['PHP_SELF']; ?>">
	<p> Email address: <br/> <input type="text" name="txtEmail"></p>
	<p>Password </br/> <input type ="password" name="txtPassword"></p>
	<p> <input type ="submit" name="btnSubmit" value="login"> </p>

	</section>

</div>

<?php include("inc/footer.inc") ;?>

</body>
</html>