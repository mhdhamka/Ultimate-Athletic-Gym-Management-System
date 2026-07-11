<?php
//error_reporting(0);

session_start();

// Connect to the database
include "dbConnect_UAGMS.php";

global $conn;

// Check for errors
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

if (isset($_POST['formApplication'])) {
    // Get the form data
    $serviceType = mysqli_real_escape_string($conn, $_POST['serviceType']);
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $mobileNo = mysqli_real_escape_string($conn, $_POST['mobileNo']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Get the customerID from the session data
    $customerID = $_SESSION['customerID'];

    // Insert the data into the MySQL table
    $sql = "INSERT INTO `membership` (`membershipID`, `serviceType`, `fullName`, `mobileNo`, `email`, `gender`, `date`) VALUES ('$customerID', '$serviceType', '$fullName', '$mobileNo', '$email', '$gender', '$date')";
    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript"> window. onload = function () { alert("You have joined the membership!"); } </script>'; 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>




<!DOCTYPE html>
<html>
<head>
  <title>Ultimate Athletics Fitness</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">


<script type = "text/javascript" src = "formValidation.js">
</script>
  <style>

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: white;
  display:flex;
  align-items:center;
  justify-content:center;
  background-image: url('assets/images/cta-bg.jpg');
}

* {
   padding:0;
  margin:0;
  box-sizing: border-box;
}


/* Add padding to containers */
.container {
  
  background: linear-gradient(-45deg, #dcd7e0, #fff);
  display:flex;
  flex-direction: column;
  justify-content:space-evenly;
  padding: 35px;
  background-color: white;
  font-family: 'Poppins', sans-serif;
  margin-top: 50px;
  width: 1000px;
}


input[type=text], input[type=password], input[type=email],select[id="state"], input [id="gender"]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: white;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
  background-color:white;
  outline: none;
}


hr {
  border: 1px solid #ffffff;
  margin-bottom: 25px;
}


.option{
  display: inline-flex;
  align-items: center;
  justify-content: space-evenly;

}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  box-shadow:0 7px 15px rgba(22,5,107,.3)

}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.clear {
  padding: 14px 20px;
  background-color: #f44336;
}

.submit {
  background-color: #16056b;
  padding: 14px 20px;

}


.clear, .submit {
  float: left;
  width: 50%;
}



a {
  color: dodgerblue;
}



  </style>

</head>
<body>
<form method="post" name="formApplication" onsubmit="return validate();"> 
<button type="button" onclick="location.href= 'index2Customer.php'">Return Home</button>
  <div class="container">
    <h1>Program Form Application <?php
    $customerID = $_SESSION['customerID'];
    echo $customerID;?></h1>
    <hr>

    <label for="apply" >Program:</label>
<select required name="serviceType">
  <option value="">--Program--</option>
  <option value="Membership">Eek! Online Program</option>
  <option value="Walk-In">Eek! Personal Program</option>
</select><br>


    <input type="text" placeholder="Full Name" name="fullName" id="fullName" style="text-transform: capitalize;" value="<?php echo $_SESSION['fullName']; ?>">
    <input type="text" placeholder="Mobile Number" name="mobileNo" id="mobileNo" value="<?php echo $_SESSION['mobileNo']; ?>">
    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>">
    <input type="text" placeholder="Address" name="address" id="address" value="<?php echo $_SESSION['address'];?>">


     
   <p>Gender</p>
  
   <div class = "option" >
      
   <input type="radio" name="gender" id="male" value="Male" <?php echo ($_SESSION['gender'] == 'Male') ? 'checked' : ''; ?>>
   <label for="male">Male</label>
   <input type="radio" name="gender" id="female" value="Female" <?php echo ($_SESSION['gender'] == 'Female') ? 'checked' : ''; ?>>
   <label for="female">Female</label>
   <br>
   <p>Date:</p>
   <input type="date" id="currentDate" name="date" readonly>

<script>
  document.getElementById("currentDate").value = new Date().toISOString().split("T")[0];
</script>
  
  </div><br>

  
    
    <hr>


    <div class="check-box">

      <button type="reset" class="clear">Clear</button>
      <button type="submit" name="formApplication" value="formApplication" class="submit">Submit</button>
  </div>
</div>
</form>
   <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/slideshow.js"></script>
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>
</html>