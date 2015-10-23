<?php
	//connect database
	$con = mysql_connect("localhost","root","382395");
	//confirm connection
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	//select databse
	mysql_select_db("gprs",$con) or die(mysql_error());
	
	//fetch result
	$result = mysql_query("SELECT * FROM demo");

	$res = array();
	//display results
	while($row = mysql_fetch_object($result))
	{
		array_push($res,$row);
		//echo $row['d'] . " " . $row['t'];
		//echo "<br />";//line feed
		//echo json_encode(Array('obj'=>$row));
		//$i++;
	}
	//$dan = json_encode($res);
	
	//return data in json format
	echo json_encode($res);
		
	//$de = json_decode($dan);

	//print $de[0]->{'t'};
	//close connection
	mysql_close($con);
?>
