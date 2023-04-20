<?php

 require "config.php";

//$row_id=$_GET['delete_id'];
//echo $row_id;

if (isset($_GET['delete_id'])){
    $row_id=$_GET['delete_id'];
    $sql_query="delete from lead_data where id = $row_id";
    $result=mysqli_query($connection,$sql_query);
    if($result){
//        echo "deleted successfully";
        header('location:index.php');
    }
    else{
        die(mysqli_error($connection));
    }
}
