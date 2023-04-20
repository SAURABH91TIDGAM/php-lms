<?php

$host = 'localhost';
$dbname= 'myapp';
$username = 'root';
$password = "MYSQL_saurabh@5378*";


$connection = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die('connection error' . mysqli_connect_error());
}

//echo "connection sucessful";