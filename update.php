<?php
$num=$_GET['update_id'];
require'config.php';
$sql_query = "select * from lead_data where id='$num'";
$result=mysqli_query($connection, $sql_query);
$row=mysqli_fetch_assoc($result);
$name=$row['Lead_name'];
$number=$row['Contact_number'];
$address=$row['Address'];
$city=$row['City'];
$SN=$row['State_name'];
$ET=$row['Employment_type'];
$loan=$row['Loan_status'];
?>




<!DOCTYPE html>
<html>
<head>
    <title>Lead Management System</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Lead Management  System</h1>
<h2>form to Add lead</h2>

<form action="process-update.php?update_id=<?=$num?>"  method="post">
    <div>
        <label for="name"> Full Name </label>
        <input type="text" id="name" name="name" value=<?php echo $name;?>>
    </div>
    <br>
    <div>
        <label for="contact number">Mobile Number</label>
        <input type="number" id="contact number" name="contact_number" value=<?php echo $number?>>
    </div>
    <br>
    <div>
        <label for="address"> Address </label>
        <textarea id="address" name="address"><?php echo $address?></textarea>
    </div>
    <br>
    <div>
        <label for="city"> City </label>
        <select id="city" name="city">
            <option value="delhi"<?php if($city ==='delhi'){ echo "selected";} ?>>Delhi</option>
            <option value="mumbai" <?php if($city ==='mumbai'){ echo "selected";} ?>>Mumbai</option>
            <option value="chennai"<?php if($city ==='chennai'){ echo "selected";} ?>>Chennai</option>
            <option value="kolkata"<?php if($city ==='kolkata'){ echo "selected";} ?>>Kolkata</option>
            <option value="gurugram"<?php if($city ==='gurugram'){ echo "selected";} ?>>Gurugram</option>
            <option value="pune"<?php if($city ==='pune'){ echo "selected";} ?>>Pune</option>
            <option value="bengaluru"<?php if($city ==='bengaluru'){ echo "selected";} ?>>Bengaluru</option>
            <option value="ahemdabad"<?php if($city ==='ahemdabad'){ echo "selected";} ?>>Ahemdabad</option>
            <option value="nagpur"<?php if($city ==='nagpur'){ echo "selected";} ?>>Nagpur</option>
        </select>

        <label for="state">State</label>
        <select id="state" name="state">
            <option value="delhi"<?php if($SN ==='delhi'){ echo "selected";} ?>>Delhi</option>
            <option value="maharashtra"<?php if($SN ==='maharashtra'){ echo "selected";} ?>>Maharashtra</option>
            <option value="tamil nadu"<?php if($SN ==='tamil nadu'){ echo "selected";} ?>>Tamil Nadu</option>
            <option value="west bengal"<?php if($SN ==='west bengal'){ echo "selected";} ?>>west bengal</option>
            <option value="haryana"<?php if($SN ==='haryana'){ echo "selected";} ?>>Haryana</option>
            <option value="karnataka"<?php if($SN ==='karnataka'){ echo "selected";} ?>>Karnataka</option>
            <option value="Gujarat"<?php if($SN ==='Gujarat'){ echo "selected";} ?>>Gujarat</option>
        </select>

    </div>
    <br>
    <div>
        <legend>Employment Type</legend>
        <label><input type="radio" value="salaried" name="employment_type"<?php if($ET === "salaried" ){ echo "checked";} ?>>Salaried</label>
        <label><input type="radio" value="Self employed" name="employment_type"<?php if($ET === "Self employed" ){ echo "checked";} ?>>Self employed</label>
        <label><input type="radio" value="unemployed" name="employment_type"<?php if($ET === "unemployed" ){ echo "checked";} ?>>Not employed</label>

    </div>
    <br>
    <div>

        <legend>Existing Loan</legend>
        <label><input type="radio" name="existing_loan" value="no"<?php if($loan === "no" ){ echo "checked";} ?>>no</label><br>
        <label><input type="radio" name="existing_loan" value="yes"<?php if($loan === "yes" ){ echo "checked";} ?>>yes</label><br>

    </div>

    <br>

    <button type="update">Update</ah></button>


</form>



</body>



</html>