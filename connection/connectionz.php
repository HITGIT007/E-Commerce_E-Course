
<?php

$db_username = 'root'; // Your MYSQL Username.
$db_password = ''; // Your MYSQL Password.
$db_name = 'mydb'; // Your Database name.
$db_host = 'localhost:3307';

$conDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or
die('Error: Could not connect to database.');

?>
