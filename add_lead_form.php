<!DOCTYPE html>
<html>
<head>
     <title>Lead Management System</title>
     <meta charset="UTF-8">
</head>
<body>
<h1>Lead Management  System</h1>
<h2>form to Add lead</h2>


<?php
     require 'config.php';

     $action_destination = "process-form.php";

     if(isset($_GET["update_id"]))
     {
          // we now know that we have to fetch the data from the database
          // for the respective ID parameter in the query URL

          $lead_id = $_GET["update_id"];

          $sql_query = "select * from lead_data where id='$lead_id'";
          $result=mysqli_query($connection, $sql_query);
          $row=mysqli_fetch_assoc($result);

          $name=$row['Lead_name'];
          $number=$row['Contact_number'];
          $address=$row['Address'];
          $city=$row['City'];
          $SN=$row['State_name'];
          $ET=$row['Employment_type'];
          $loan=$row['Loan_status'];

          $action_destination = "process-update.php";

     }
?>

     <form action="<?php echo $action_destination; ?>"  method="post">
          <div>
               <label for="name"> Full Name </label>
               <input type="text" id="name" name="name" value="<?php echo $name; ?>">
          </div>
          <br>
          <div>
               <label for="contact number">Mobile Number</label>
               <!-- TODO: add php value to html tag -->
               <input type="number" id="contact number" name="contact_number"> 
          </div>
          <br>
          <div>
               <label for="address"> Address </label>
               <!-- TODO: add php value to html tag -->
               <textarea id="address" name="address"></textarea>
          </div>
          <br>
          <div>
               <label for="city"> City </label>
               <!-- TODO: add php value to html tag -->
               <select id="city" name="city">
                    <option value="delhi">Delhi</option>
                    <option value="mumbai">Mumbai</option>
                    <option value="chennai">Chennai</option>
                    <option value="kolkata">Kolkata</option>
                    <option value="gurugram">Gurugram</option>
                    <option value="pune">Pune</option>
                    <option value="bengaluru">Bangaluru</option>
                    <option value="ahemdabad">Ahemdabad</option>
                    <option value="nagpur">Nagpur</option>
               </select>

               <label for="state">State</label>
               <!-- TODO: add php value to html tag -->
               <select id="state" name="state">
                    <option value="delhi">Delhi</option>
                    <option value="maharashtra">Maharashtra</option>
                    <option value="tamil nadu">Tamil Nadu</option>
                    <option value="west bengal">west bengal</option>
                    <option value="haryana">Haryana</option>
                    <option value="karnataka">Karnataka</option>
                    <option value="Gujarat">Gujarat</option>
               </select>

          </div>
          <br>
          <div>
              <legend>Employment Type</legend>
              <!-- TODO: add php value to html tag -->
               <label><input type="radio" value="salaried" name="employment_type" />Salaried</label>
               <label><input type="radio" value="Self employed" name="employment_type" />Self employed</label>
               <label><input type="radio" value="unemployed" name="employment_type" />Not employed</label>

          </div>
          <br>
          <div>

               <legend>Existing Loan</legend>
               <!-- TODO: add php value to html tag -->
               <label><input type="radio" name="existing_loan" value="no">no</label><br>
               <label><input type="radio" name="existing_loan" value="yes">yes</label><br>

          </div>

          <br>
          <button type="submit">Submit</button>
          <button type="reset">Reset</button>

     </form>



<div class="container">
     <table class="table">
          <thead>
          <tr>
               <th scope="col">Id</th>
               <th scope="col">Lead name</th>
               <th scope="col">Contact number</th>
               <th scope="col">Address</th>
               <th scope="col">City</th>
               <th scope="col">State</th>
               <th scope="col">Employment</th>
               <th scope="col">Existing loan</th>
          </tr>
          </thead>
          <tbody>
          <?php
          require "config.php";
          $query = "select * from lead_data";
          $result = mysqli_query($connection, $query);
          while($row=mysqli_fetch_assoc($result))
          {
               $id=$row['id'];
               $name=$row['Lead_name'];
               $number=$row['Contact_number'];
               $address=$row['Address'];
               $city=$row['City'];
               $state=$row['State_name'];
               $employment_status=$row['Employment_type'];
               $existing_loan=$row['Loan_status'];
               echo"
            <tr><th scope='row'>$id</th>
            <td>$name</td>
            <td>$number</td>
            <td>$address</td>
            <td>$city</td>
            <td>$state</td>
            <td>$employment_status</td>
            <td>$existing_loan</td>
            <td><button><a href='index.php?update_id=$id'>Update</a></button></td>
            <td><button><a href='index.php?delete_id=$id'>Delete</a></button></td>
            </tr>
            ";
          }

          ?>

          </tbody>
     </table>
</div>



</body>



</html>