<?php
	/* this script will work under the condition php script has setting a shared memory */


	/* connect to database */
	$con = mysql_connect("localhost","root","382395");
	/* confirm connection */
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	/* select a databse */
	mysql_select_db("gprs",$con) or die(mysql_error());
  	
	
	$key = ftok("/usr/share/nginx/html/ipc/dan",'z');

   	// Create 100 byte shared memory block with system id of 0xff3
   	$shm_id = shmop_open($key, "w", 0666, 100);
   	if (!$shm_id) {
   		echo "Couldn't access shared memory segment\n";
	}else {
		echo "shm id : " . $shm_id . "\n";
	}

	// Get shared memory block's size
	$shm_size = shmop_size($shm_id);
	echo "SHM Block Size: " . $shm_size . " has been accessed.\n";
	
	//connect to database and clear RealTimeData Table
	mysql_query("delete from RealTimeData");

	$msg = "SSart!";
	// Lets write a test string into shared memory
	$shm_bytes_written = shmop_write($shm_id, $msg, 0);
	if ($shm_bytes_written != strlen($msg)) {
		echo "Couldn't write the entire length of data\n";
	}
	
	while($msg[1] == 'S') {
		sleep(1);//sleep 1 second
		$msg = shmop_read($shm_id, 0, $shm_size);//check msg
		//echo $msg . "\n";
	}

	echo $msg . "\n";
	// Now lets read the string back
	//$my_string = shmop_read($shm_id, 0, $shm_size);
	//if (!$my_string) {
	//	echo "Couldn't read from shared memory block\n";
	//}
	//echo "The data inside shared memory was: " . $my_string . "\n";

	//Now lets delete the block and close the shared memory segment
	//if (!shmop_delete($shm_id)) {
	//	echo "Couldn't mark shared memory block for deletion.";
	//}
	shmop_close($shm_id);
				      
	/* construct query */
	$query_statement = "SELECT * FROM RealTimeData order by id";

	/* fetch result */
	$result = mysql_query($query_statement);

	$res = array();
	/* display results */
	while($row = mysql_fetch_object($result))
	{
		array_push($res,$row);
	}
	
	/* return data in json format */
	echo json_encode($res);
		
	//close connection
	mysql_close($con);
?>