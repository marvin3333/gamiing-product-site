<?php
$host = "localhost";
$userName= "bbunneym_wrt";
$password = "password410";
$database = "bbunneym_gameSite";

$con = mysql_connect($host, $userName, $password, $database);


if ($con == false)
	 echo"<p> Error connectionn to " .$database.  "</p>";
 else
	  echo "<p> successfully connected to " .$database. "</p>";

?>