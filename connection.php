<?php
 
/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */
 
$databaseHost = 'localhost';
$databaseName = 'courseapp';
$databaseUsername = 'root';
$databasePassword = '';
 
/* Attempt to connect to MySQL database */
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//check connection
/*
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    echo'DATABASE CONNECTED';
}
*/
?>