<?php

$host = 'localhost';
$dbname= 'myapp';
$username = 'root';
$password = "MYSQL_saurabh@5378*";


$connection = mysqli_connect($host, $username, $password, $dbname);

if (!$connection)
{
    $sql_query = "CREATE DATABASE myapp";
    if (mysqli_query($connection, $sql_query))
    {
        $sql_query = "CREATE TABLE Persons (id int,Lead_name text,Contact_number bigint,Address varchar(255),City text,State_name text,Employment_type text,Loan_status text)";
        if(!mysqli_query($connection,$sql_query)){
            echo "error creating table".mysqli_error();
        }
        else
        {
            echo "created table successfully";
        }
    }
    else
    {
        echo "Error creating database: " . mysqli_error($connection);
    }
}
//echo "connection sucessful";