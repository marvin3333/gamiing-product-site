<?php
//if submit button has  been clicked.....
if(isset($_POST["btnSubmit"]))
{
	//retrieve data from form
     $name = $_POST["txtName"];
	$phone = $_POST["txtPhone"];
	$email = $_POST["txtEmail"];
	$comments = $_POST["txtComments"];
	
	if($name =="")
		$nameMsg = "<br/><span style = 'color:red;'>no blank names....</span>";
	
	else if($phone =="")
		$phoneMsg = "<br/><span style = 'color:red;'>no blank phone #....</span>";
	
	else if($email =="")
		$emailMsg = "<br/><span style = 'color:red;'>no blank emaail ....</span>";
	else
	{
		
		include ("inc/dbc_admin.php");
		/*$query = "insert into bbunneym_gameSite.mailing_list"
		        ."(name, phone, email, comments)"
				."values ('$name', '$phone','$email','$comments');"; *//*check*/
				
				$query = "insert into bbunneym_gameSite.mailing_list (name, phone, email, comments) values ('$name', '$phone','$email','$comments')"; /*check*/
				
				$success = mysql_query ($query, $con);
				if($success)
					$insert="<h2>thanks <h2>";
				else
				{
					$errorMsg = "error ";
					//$errorMsg = mysql_error($con);
					$insert="There was an error: $errorMsg";
					exit($inserted);
					
				}
					
					
		
		
	}
}


?>



<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<script type = "text/javascript">
//java scrip validation
  function validateForm()
  {
	  //pull data from form
	  var name = document.form1.txtName.value;
	   var phone = document.form1.txtPhone.value;
	    var email = document.form1.txtEmail.value;
		
		//clear out the error messages
		//nameMsg... is the id in the form
		document.getElementById("nameMsg").innerHTML = "";
		document.getElementById("phoneMsg").innerHTML = "";
		document.getElementById("emailMsg").innerHTML = "";
		
		if(name == null || name == "")
		{
			document.getElementById("nameMsg").innerHTML = "****Your name can't be blank";
			return false; //return false stops the function
		}
		
		if(phone == null || phone == "")
		{
			document.getElementById("phoneMsg").innerHTML = "****Your phone can't be blank";
			return false;
		}
		
		if(email == null || email == "")
		{
			document.getElementById("emailMsg").innerHTML = "*****Your email can't be blank";
			return false;
		}
		
		//no errors
		return true;
	  
	  
  }

</script>


</head>

<body>
<?php include("inc/header.inc"); ?>

<?php include ("inc/nav.inc") ;?>

<div id="wrapper">


<?php include ("inc/aside.inc");?>


	<section>
	
	<h2> Mailing list sign up</h2>
	<?php 
	  if(isset($inserted))
		  echo $inserted;
	  else
	  {
	  ?>
	<!-- use post for security data hide-->
	<!-- action where do you want data to go-->
	
	<form method = "post" action = <?php echo $_SERVER["PHP_SELF"] ?>"
	            name ="form1" onSubmit= "return validateForm();">
		<p> 
          <label> Name </label> <br/>		
          <input type="text" id="txtName" name="txtName">
          <?php 
             if(isset($nameMsg))
                  echo $nameMsg;				 
				
			?>
          <br/><span id ="nameMsg" style ="color:red"></span>
		 </p>
		 
		 <p>
		  <label> Phone </label> <br/>		
          <input type="text" id="txtPhone" name="txtPhone">
          <?php 
             if(isset($phoneMsg))
                  echo $phoneMsg;				 
				
			?>
          <br/><span id ="phoneMsg" style ="color:red"></span>
		 </p>
		 
		 <p>
		   <label> Email Address </label> <br/>		
           <input label type="text" id="txtEmail" name="txtEmail">
           <?php 
             if(isset($emailMsg))
                  echo $emailMsg;				 
				
			?>
           <br/><span id ="emailMsg" style ="color:red"></span>
		 </p>
		 
		 <p>
		   <label>comments </label>
		   <textarea id="txtComments"  name="txtComments"></textarea> <br/>
		 </p>
		 
		 <p>
		 <input type ="submit" name="btnSubmit" id="btnSubmit">
		 </p>
		 
		 
		 
         		  
	</form>
	<?php } ?>

	</section>

</div>

<?php include("inc/footer.inc"); ?>

</body>
</html>