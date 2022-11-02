<?php
$server = 'localhost';
$username = 'postgres';
$password = '123';
$db_name = 'myCustomMap';
$dbconn = pg_connect("host=$server port=5432 dbname=$db_name user=$username password=$password");

?>