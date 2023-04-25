<?php

$host = 'localhost';
$dbname= 'myapp';
$username = 'root';
$password = "MYSQL_saurabh@5378*";


global $connection;
$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection)
{
    $sql_query = "CREATE DATABASE myapp";
    if (mysqli_query($connection, $sql_query))
    {
        echo "database created successfully";
    }
    else
    {
        echo "Error creating database: " . mysqli_error($connection);
    }
}
//echo "connection successful";