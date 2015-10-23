<?php

//$con = mysql_connect("localhost","root","abc6838338");

// Obtain email and password from post header
$email = $_POST['myemail'];
$password = $_POST['mypassword'];

$query = "SELECT * FROM UserAcount where username='$email' AND password=sha('$password') LIMIT 1";

//echo "$query\n";


//connect to database
$con = mysql_connect("localhost","root","382395");
/* confirm connection */
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}
/* select a databse */
mysql_select_db("gprs",$con) or die(mysql_error());

$result = mysql_query($query);

$rowNum = mysql_num_rows($result);
  	
echo "$rowNum\n";

//close connection
mysql_close($con);
?>
