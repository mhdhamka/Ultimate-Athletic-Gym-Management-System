<?php
session_start();

include ("../config/db_cUAGMS.php");

global $conn;

// Check for errors
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$clientID = $_SESSION['clientID'];
$fullName = $_SESSION['fullName'];
$mobileNo = $_SESSION['mobileNo'];
$email = $_SESSION['email'];
$address = $_SESSION['address'];

// Check if the form was submitted
if (isset($_POST['update'])) {
  // Escape special characters to prevent SQL injection
  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $mobileNo = mysqli_real_escape_string($conn, $_POST['mobileNo']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $clientIMG = mysqli_real_escape_string($conn, $_POST['clientIMG']);
  $gender = $_POST['gender'];

  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";

  // Build the update query
  $query = "UPDATE `client` SET 
  fullName = '$fullName', 
  mobileNo = '$mobileNo', 
  email = '$email', 
  gender = '$gender',
  address = '$address', 
  clientIMG = '$clientIMG' 
  WHERE clientID = '$clientID'"; 

  // Execute the query
  if (mysqli_query($conn, $query)) {
    // Update the session variables with the new user information
    $_SESSION['fullName'] = $fullName;
    $_SESSION['mobileNo'] = $mobileNo;
    $_SESSION['email'] = $email;
    $_SESSION['gender'] = $gender;
    $_SESSION['address'] = $address;
    $_SESSION['clientIMG'] = $clientIMG;
    
  
    echo '<script type="text/javascript"> window. onload = function () { alert("Record updated successfully!"); } </script>'; 
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
}

// Get the client's information from the database
$query = "SELECT * FROM client WHERE clientID = '{$_SESSION['clientID']}'";
$result = mysqli_query($conn, $query);
$client = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Ultimate Athletics Fitness</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">



<script type = "text/javascript" src = "formValidation.js"></script>

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
  margin-top: 80px;
  width: 700px;
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
  margin-top: 10px;
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

.saveprofile {
  background-color: #16056b;
  padding: 14px 20px;

}


.clear, .saveprofile {
  float: left;
  width: 50%;
}

.avatar {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
  border-radius: 50%;
}

a {
  color: dodgerblue;
}

.upload-btn {
    background:#ed2939;
    color:white;
    padding:8px 15px;
    border-radius:20px;
    font-size:13px;
    cursor:pointer;
}

.upload-btn:hover {
    background:#c91f2e;
}


  </style>

</head>
<body>
<form method="post" 
      name="update" 
      enctype="multipart/form-data"
      onsubmit="return validate();">

  <div class="container">
  <div class="top_link"><a href="../client/dashboard.php" style=" color: #452A5A;
    font-weight: 400;"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="" style="width: 28px; padding-right: 7px; margin-top: -3px;">  Return home</a></div>
    
    <br><h1 style="text-align:center"> Profile </h1>

 <?php

if (!empty($client['clientIMG'])) {
    $profileImage = "../../" . $client['clientIMG'];
} 
else {
    $profileImage = "../../assets/images/profile.png";
}

?>

<img src="<?php echo $profileImage; ?>"
     class="avatar"
     width="150"
     height="150"
     style="object-fit:cover; border-radius:50%;">
    <br>

    <br>

    <label for="upload" class="upload-btn">
        Change Photo
    </label>

    <input type="file" 
          id="upload"
          name="clientIMG"
          style="display:none;">

    <h3>Username: <?php
    $username = $_SESSION['username'];
    echo $username;?> 
    </h3>
	
	<br>
    <h3>Client ID: <?php
    $clientID = $_SESSION['clientID'];
    echo $clientID;?> 
    </h3>

    <br>
    <h3><?php
    // Select the membership ID from the `membership` table
    $sql = "SELECT membershipID FROM membership WHERE `clientID` = '$clientID'";
    $result = mysqli_query($conn, $sql);

    // Print the membership ID
    if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "Membership ID: " . $row["membershipID"] . "<br>";
    }
  } else {
    echo "Membership: Register Your Membership <a href='viewMembershipCustomer.php.#tabs-2'>HERE</a>!";

  }
    ?></h3> <h4>

   <?php
    // Get the session ID
    $clientID = $_SESSION['clientID'];

    // Select the data from the database based on the session ID
    $query = "SELECT * FROM `membership` WHERE `clientID` = '$clientID'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Store the result in a variable
    $expiryDate = mysqli_fetch_assoc($result);

    // Echo the data
    if (isset($expiryDate) && isset($expiryDate['expiryDate'])) {
      echo "Your membership will expire on " . $expiryDate['expiryDate'];
    } 

    ?></h4> 

    <br>
    
    <h3>Full Name:  
    <?php
    $fullName = $_SESSION['fullName'];
    echo $fullName;?>
    </h3>
    <input type="text" placeholder="Click Here To Edit" name="fullName" id="fullName" value="<?php echo $fullName?>" >
      
   <h3>Phone number: 
   <?php
    $mobileNo = $_SESSION['mobileNo'];
    echo $mobileNo;?>
   </h3>
    <input type="text" placeholder="Click Here To Edit" name="mobileNo" id="mobileNo" value="<?php echo $mobileNo ?>" >

    <h3>Email:  
    <?php
    $email = $_SESSION['email'];
    echo $email;?>
    </h3>
    <input type="text" placeholder="Click Here To Edit" name="email" id="email" value="<?php echo $email?>" >

    <h3>Gender: 
    <?php
      $gender = $_SESSION['gender'];
      echo $gender;?>
      <br>
    </h3>
    <div class = "option" >
    <!-- Check if the gender is male -->
  <?php if ($_SESSION['gender'] == 'Male'): ?>
    <!-- Display the male radio input field as readonly -->
    <input type="radio" name="gender" id="male" value="Male" checked > Male <br>
    <input type="radio" name="gender" id="female" value="Female" > Female
  <?php else: ?>
    <!-- Display the female radio input field as readonly -->
    <input type="radio" name="gender" id="male" value="Male" > Male
    <input type="radio" name="gender" id="female" value="Female" checked > Female
  <?php endif; ?>
  </div>
    <br>

    <h3>Address:
    <?php
    $address = $_SESSION['address'];
    echo $address;?>
    </h3>
    <input type="text" placeholder="Click Here To Edit" name="address" id="address" value="<?php echo $address?>" >
  
  </div><br>

      <button type="reset" class="clear">Cancel</button>
      <button type="submit" name ="update" value = "update" class="saveprofile">Save</button>

</div><br><br>
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