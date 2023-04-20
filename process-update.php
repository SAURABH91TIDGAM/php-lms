<?php

require "config.php";

$num=$_GET['update_id'];

//echo $num;

function validating($phone){
    if(! preg_match('/^[0-9]{10}+$/', $phone))
    {
        die("Invalid Phone Number");
    }
}


$name = $_POST['name'];
$contact_number = filter_input(INPUT_POST,"contact_number",FILTER_VALIDATE_INT);
validating($contact_number);

$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$employment_status = $_POST['employment_type'];
$Loan_status = $_POST['existing_loan'];
//
//echo $num;
//
$sql_query = "UPDATE lead_data SET Lead_name='$name', Contact_number='$contact_number', Address='$address', City='$city',
                     State_name='$state',Employment_type='$employment_status', Loan_status='$Loan_status' where id='$num'";

//var_dump($name,$contact_number,$address,$city,$state,$employment_status,$Loan_status);

//$stmt =mysqli_stmt_init($connection);
//
//if( ! mysqli_stmt_prepare($stmt,$sql_query)){
//    die(mysqli_error($connection));
//};
//
//mysqli_stmt_bind_param($stmt, "sisssss",$name,$contact_number, $address, $city, $state, $employment_status, $Loan_status);
//
//mysqli_stmt_execute($stmt);
$data = mysqli_query($connection, $sql_query);

if($data){
    echo "updated successfully";
}
else{
    echo "failed";
}

header('location:index.php');

//echo "updated successfully";



//print $_POST;