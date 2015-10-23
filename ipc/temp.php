<?php

// Create a temporary file and return its path
$tmp = "./dan";

// Get the file token key
$key = ftok($tmp, 'a');//the second argument can be any number between 1 and 255

// Attach the SHM resource, notice the cast afterwards
//$id = shm_attach($key);

//if ($id === false) {
//    die('Unable to create the shared memory segment');
//}

	// Cast to integer, since prior to PHP 5.3.0 the resource id 
	// is returned which can be exposed when casting a resource
	// to an integer
$id =  $key;

echo $id . "\n" ;
?>
