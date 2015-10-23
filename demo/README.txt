--- ipc view ---
$ipcs -m #for shared memory
$ipcs -s #for semaphore
$ipcs -q #for message queue

$ipcrm -m id #remove shared memory by id

--- system start config ---
$service nginx start
$service php-fpm start
$service mysqld start

--- create shared memory by php ---
$php shmCreate.php #only php script created shm can be r/w by c program

--- 2015-07-25 ---
