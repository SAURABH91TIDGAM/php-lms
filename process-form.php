<?php
require "config.php";


function validating($phone){
    if(preg_match('/^[0-9]{10}+$/', $phone))
    {
        return True;
    }
    else{
        return false;
    }
}

$num=$_GET['id'];

echo $num;

$name = $_POST['name'];
$contact_number = $_POST['contact_number'];
$valid_number = validating($contact_number);
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$employment_status = $_POST['employment_type'];
$Loan_status = $_POST['existing_loan'];

if(isset($_GET['id']))
{
    if ($valid_number)
    {
        $sql_query = "UPDATE lead_data SET Lead_name='$name', Contact_number='$contact_number', Address='$address', City='$city',
                     State_name='$state',Employment_type='$employment_status', Loan_status='$Loan_status' where id='$num'";

        $data = mysqli_query($connection, $sql_query);

        if($data)
        {
            echo "updated successfully";
        }
        else
        {
            echo "failed";
        }

        header('location:index.php');
        echo "updated successfully";
    }
    else
    {
        echo "you provided invalid phone number. ";
        echo "<a href='index.php?update_id=$num'>GO BACK</a>";
    }
    if ($valid_number)
    {
        $sql_query = "UPDATE lead_data SET Lead_name='$name', Contact_number='$contact_number', Address='$address', City='$city',
                     State_name='$state',Employment_type='$employment_status', Loan_status='$Loan_status' where id='$num'";

        $data = mysqli_query($connection, $sql_query);

        if($data)
        {
            echo "updated successfully";
        }
        else
        {
            echo "failed";
        }

        header('location:index.php');
        //echo "updated successfully";
    }
    else
    {
        echo "you provided invalid phone number. ";
        echo "<a href='index.php?update_id=$num'>GO BACK</a>";
    }


}
else
{
    if($valid_number)
    {
        $sql = "INSERT INTO lead_data(Lead_Name, Contact_number, Address, City, State_name, Employment_type, Loan_status)
        VALUES (?,?,?,?,?,?,?)";

//var_dump($name,$contact_number,$address,$city,$state,$employment_status,$Loan_status);

        $stmt =mysqli_stmt_init($connection);

        if( ! mysqli_stmt_prepare($stmt,$sql)){
            die(mysqli_error($connection));
        };

        mysqli_stmt_bind_param($stmt, "sisssss",$name,$contact_number, $address, $city, $state, $employment_status, $Loan_status);

        mysqli_stmt_execute($stmt);

//echo "record saved";
        header('location:index.php');

    }

    else{
        echo "you did not provided valid phone number. ";
        echo "<a href='index.php'>GO BACK</a>";
    }
}





//print $_POST;