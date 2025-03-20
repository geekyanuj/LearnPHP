<?php
$server = "localhost";
$dbname = "my_db";
$username = "root";
$password = '';

$connection = new mysqli($server, $username, $password, $dbname);

// if ($connection->connect_errno) {
//     echo " DB Connection: Failed to connect to database";
// } else {
//     echo " DB Connection: Successfully connected";
// }
