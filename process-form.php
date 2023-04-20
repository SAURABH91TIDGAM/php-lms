<?php


function validating($phone){
    if(! preg_match('/^[0-9]{10}+$/', $phone))
    {
        die("Invalid Phone Number");
    }
}
$name = $_POST['name'];
$contact_number = $_POST['contact_number'];
validating($contact_number);


$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$employment_status = $_POST['employment_type'];
$Loan_status = $_POST['existing_loan'];

require "config.php";



$sql = "INSERT INTO lead_data(Lead_Name, Contact_number, Address, City, State_name, Employment_type, Loan_status)
        VALUES (?,?,?,?,?,?,?)";


$stmt =mysqli_stmt_init($connection);

if( ! mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($connection));
};

mysqli_stmt_bind_param($stmt, "sisssss",$name,$contact_number, $address, $city, $state, $employment_status, $Loan_status);

mysqli_stmt_execute($stmt);

//echo "record saved";
header('location:index.php');



//print $_POST;