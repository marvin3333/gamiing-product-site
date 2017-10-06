<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type = "text/javascript">
//java scrip validation
  function checkForm()
  {
	  //window.alert("sometext");
	  //pull data from form
	  var name = document.frmContact.name.value;
	   var email = document.frmContact.email.value;
	    var message = document.frmContact.message.value;
		
		//clear out the error messages
		//nameMsg... is the id in the form
		document.getElementById("namespan").innerHTML = "";
		document.getElementById("emailspan").innerHTML = "";
		document.getElementById("messagespan").innerHTML = "";
		
		if(name == null || name == "")
		{
			document.getElementById("namespan").innerHTML = "****Your name can't be blank";
			document.frmContact.name.focus();
			return false; //return false stops the function
		}
		
		
		
		if(email == null || email == "")
		{
			document.getElementById("emailspan").innerHTML = "*****Your email can't be blank";
			document.frmContact.email.focus();
			return false;
		}
		
		if(message == null || message == "")
		{
			document.getElementById("messagespan").innerHTML = "****Your message  can't be blank";
			document.frmContact.message.focus();
			return false;
		}
		
		
		window.alert("no errors");
		//no errors
		return true;
	  
	  
  }//closes function

</script>
</head>

<body>
<?php include("inc/header.inc"); ?>

<?php include ("inc/nav.inc") ;?>

<div id="wrapper">


<?php include ("inc/aside.inc");?>


	<section>
	<h2> contact us </h2>
	<?php
	    if(isset($_POST['btnSendEmail']))
		{
			// get the form input
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$message = $_POST['message'];
			
			//set up the SMTP email properties
			$to = "bbunney@devry.edu";
			$subject = "Contact form submission";
			//$from = $email;
			$headers = "From: $email";
			
			
			
			
			
			//send the email
			try
			{
				mail($to, $subject, $message, $headers);
				$msg = "<b> email sent </b>";
			}
			catch(Exception $e)
			{
				$msg = "<b> ERROR:  " . $e->getMessage() . "</b><br/>";
				
			}
			
		}//closes if
	
	
	
	?>
	
	<?php
	   if(isset($msg))
	   {
		   $msg .="<br><a href = 'home.php'>return to home page </a>";
		   echo $msg;
		   
	   }//closes if
	
	?>
	<table align="left">
	   <form name = "frmContact" method="post" action="<?php $_SERVER['PHP_SELF']; ?>"
	      onsubmit = "return checkForm()">
		  <tr> <th> Name: </th>
		    <td> 
			   <input type="text" name="name" id="name" /> <br/>
			   <span style = "color:red" id = "namespan"> </span>
			 </td>
		</tr> 
			
			<tr> <th> Email: </th>
		    <td> 
			   <input type="text" name="email" id="email" /> <br/>
			   <span style ="color:red" id ="emailspan"> </span>
			 </td>
		</tr> 
		
		<tr> <th> phone: </th>
		    <td> 
			   <input type="text" name="phone" id="phone" /> <br/>
			  
			 </td>
		</tr> 
		
		
		<tr> <th> message: </th>
		    <td> 
			   <textarea name="message" id="message" ></textarea> <br/>
			  <span style = "color:red" id ="messagespan"> </span>
			 </td>
		</tr> 
		  <tr> 
		     <td></td>
			 <td> 
			    <input type ="submit" name ="btnSendEmail" value = "Send email message"/>
			 </td>
			</tr>
			
			</form>
	
	</table>

	</section>

</div>

<?php include("inc/footer.inc") ;?>

</body>
</html>
