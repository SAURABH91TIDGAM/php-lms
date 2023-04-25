<?php

global $connection;
require "config.php";

$val = mysqli_query($connection,'select 1 from `create_demo`');

if($val !== FALSE)
{
    print("Exists");
}else {
    print("Doesn't exist,now creating ... ");
    $query = "CREATE TABLE create_demo (
                          ID int(11) AUTO_INCREMENT,
                          Lead_name varchar(255) NOT NULL,
                          Contact_number int,
                          Address varchar(255) NOT NULL,
                          City varchar(255) NOT NULL,
                          State_name varchar(255) NOT NULL,
                          Employment_type varchar(255) NOT NULL,
                          Loan_status varchar(255) NOT NULL,
                          PRIMARY KEY  (ID)
                          )";
    $result = mysqli_query($connection, $query);
    if($result){
        echo "table created successfully";
    }
}