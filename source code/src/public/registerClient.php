<?php include ("../config/db_cUAGMS.php");

if(isset($_POST['register'])){
  $fullName = $_POST['fullName'];
  $username = $_POST['username'];
  $mobileNo = $_POST['mobileNo'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];

  global $conn;
  $select = mysqli_query($conn, "SELECT * FROM `client` WHERE fullName = '$fullName' AND mobileNo = '$mobileNo'") or die('query failed');

  if(mysqli_num_rows($select) > 0){
    echo '<script type="text/javascript"> window. onload = function () { alert("USER ALREADY EXIST! PLEASE LOG IN TO CONTINUE."); } </script>'; 
  }else{
    mysqli_query($conn, "INSERT INTO `client`(`fullName`, `username`, `mobileNo`, `email`, `password`, `gender`, `address`)
    VALUES('$fullName', '$username', '$mobileNo', '$email', '$password', '$gender', '$address')");
    echo '<script type="text/javascript"> window. onload = function () { alert("REGISTERED SUCCESSFULLY!"); } </script>'; 
  }


}
?>

<?php 

if(isset($message)){
  foreach($message as $message){
    echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
  }
}


?>
<!DOCTYPE php>
<php>
<head>
  <title>Ultimate Athletics Fitness</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">

<script>
    function validate(){

    if(!document.getElementById("pswd1").value==document.getElementById("pswd2").value)alert("Passwords do no match");
    return document.getElementById("pswd1").value==document.getElementById("pswd2").value;
   return false;
    }
</script>

<script type = "text/javascript" src = "formValidation.js">
</script>
  <style>
.message{
  position: sticky;
  top:0; left:0; right:0;
  padding:15px 10px;
  background-color: var(--white);
  text-align: center;
  z-index: 1000;
  box-shadow: var(--box-shadow);
}


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

.register {
  background-color: #16056b;
  padding: 14px 20px;

}


.clear, .register {
  float: left;
  width: 50%;
}



a {
  color: dodgerblue;
}



  </style>

</head>
<body>
<form method="post" name="reg_form" onsubmit="return validate();"> 

  <div class="container">
    <h1>Register</h1>
    <p>Already have an account? <a href="../public/loginClient.php">Login</a></p><br>
    <hr>

  
    <input type="text" placeholder="Full Name" name="fullName" id="fullName" style="text-transform: capitalize;" required>

    <p><small><i>Username must contain at least one upppercase, lowercase, special character, numbers & no space </i></small></p> 
    <input type="text" placeholder="Enter Username" name="username" id="username" Required>


   <p><small><i>Format mobile: 601234567891</i></small></p> 
     <input type="text" placeholder="Mobile" name="mobileNo" id="mobileNo" required>

     <p><small><i>Format email: azreen_unimas@gmail.com </i></small></p> 
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

     <p><small><i>Password atleast 6 length, contain one upppercase, lowercase, special character, numbers & no space</i></small></p>
    
     <input type = "password" placeholder=" Password" name="password" id = "pswd1"  required> 
     <input type = "password" placeholder=" Confirm Password" name="pswd2" id = "pswd2"  required>

 

  <p>Gender</p>
  
  <div class = "option" >
      
    <input type="radio"  name="gender" id="gender" value="Male" required >Male
    <input type="radio" name="gender" id="gender" value="Female" >Female
  
  </div><br>

    <input type="text" placeholder="Enter Address" name="address" id="address" required>
  
    <hr>

    <div class="check-box">

      <button type="reset" class="clear">Clear</button>
      <button type="submit" name="register" class="register">Register</button>
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
</php>