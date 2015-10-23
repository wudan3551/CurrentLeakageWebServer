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
	
	//construct query
	$s = $_REQUEST['startData'];
	$e = $_REQUEST['endData'];
	$query_statement = "SELECT * FROM demo where d between ";
	$query_statement .= "\"" . $s . "\"";
	$query_statement .= " and " . "\"" . $e . "\"";
	$query_statement .= " order by d desc,t desc";
	//echo $query_statement;//for debug

	//fetch result
	$result = mysql_query($query_statement);

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
