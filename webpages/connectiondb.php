<?php
$mysql_hostname = "localhost";
$mysql_user = "dduser";
$mysql_password = "Solution123+";
$mysql_database = "designdok_dbb";

$con = mysqli_connect($mysql_hostname,$mysql_user,$mysql_password,$mysql_database);

/*
// Check connection
if (mysqli_connect_errno()){ echo "Failed to connect to MySQL: " . mysqli_connect_error();}
else{ echo "connected";}
*/
?>