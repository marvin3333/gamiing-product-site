<?php
if(isset($_Post["btnSubmit"]))
{
     $email = $_POST["email"];
     $pwd = md5($_POST["password"]);
	
	  include ("inc/dbc_admin.php");
	  $sql = "insert into bbunneym_gameSite.users (email,password) values 
	         . "('$email' , '$pwd');";
			 
	$result = mysql_query($sql, $con);
	
	if($result)
		$msg = "<p><b>new user succefull inserted </b>" 
	          . "<br/> <a href = 'admin_login.php'>log in </a></p>";
	else
		$msg = "<p> error </p>";
}


?>




<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("inc/header.inc");?>

<?php include ("inc/nav.inc") ;?>

<div id="wrapper">


<?php include ("inc/aside.inc");>


	<section>
	<?phap include ("inc/dbc.php"); ?>
	<h2> registration form </h2>
	<form id="frmRegister" name = "frmRegister" method = "post" action=<? echo $_SERVER['PHP_SELF] ?>">
	<p> Email address <br/>
	<input type = "text" name="email" > </p>
	<p> Password <br/>
	<input type="password" name="password"></p>
	<p><input type = "submit" value="Submit" name="btnSubmit"> </p>
    </form>
	</?php 
	  if(isset ($msg))
		  echo $msg;
	  
	  ?>
	</section>

</div>

<?php include("inc/footer.inc") ;?>

</body>
</html>
