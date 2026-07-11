<?php session_start();?>

<?php include ("../config/db_cUAGMS.php");

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  global $conn;
  $sql = mysqli_query($conn, "SELECT * FROM `client` WHERE username = '$username' AND password = '$password'") or die('query failed');

  if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
    $_SESSION['clientID'] = $row['clientID'];
    $row['clientID'] = $clientID;
    $clienID = $_SESSION['clientID'];
    $_SESSION['clientID'] = $clientID;


    $_SESSION['fullName'] = $row['fullName'];
    $row['fullName'] = $fullName;
    $fullName = $_SESSION['fullName'];
    $_SESSION['fullName'] = $fullName;


    $_SESSION['username'] = $row['username'];
    $row['username'] = $username;
    $username = $_SESSION['username'];
    $_SESSION['username'] = $username;


    $_SESSION['mobileNo'] = $row['mobileNo'];
    $row['mobileNo'] = $mobileNo;
    $mobileNo = $_SESSION['mobileNo'];
    $_SESSION['mobileNo'] = $mobileNo;


    $_SESSION['email'] = $row['email'];
    $row['email'] = $email;
    $email = $_SESSION['email'];
    $_SESSION['email'] = $email;


    $_SESSION['gender'] = $row['gender'];
    $row['gender'] = $gender;
    $gender = $_SESSION['gender'];
    $_SESSION['gender'] = $gender;

    $_SESSION['address'] = $row['address'];
    $row['address'] = $address;
    $address = $_SESSION['address'];
    $_SESSION['address'] = $address;



    $_SESSION['clientID'] = $clientID;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    echo "Client ID: ";
		echo $_SESSION['client'] = $row['clientID'];
		echo "<br>";
		echo "Full Name: ";
		echo $_SESSION['client'] = $row['fullName'];
		echo "<br>";
		echo "User Name: ";
		echo $_SESSION['client'] = $row['username'];
		echo "<br>";
		echo "Email Address: ";
		echo $_SESSION['client'] = $row['email'];
		echo "<br>";
		echo "Password: ";
		echo $_SESSION['client'] = $row['password'];
		echo "<br>";
		echo "Gender: ";
		echo $_SESSION['client'] = $row['gender'];
    header("Location:../client/dashboard.php");
  }else{
    echo '<script type="text/javascript"> window. onload = function () { alert("INVALID USERNAME OR PASSWORD!"); } </script>'; 
  }
}

?>




<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>Ultimate Athletics Fitness</title>

<style>
img{
  width: 100%;
}
.login {
    height: 1050px;
    width: 100%;
    background-image: url('assets/images/background.png');
  
}
.login_box {
    width: 1050px;
    height: 600px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #fff;
    border-radius: 10px;
    box-shadow: 1px 4px 22px -8px #0004;
    display: flex;
    overflow: hidden;
}
.login_box .left{
  width: 41%;
  height: 100%;
  padding: 25px 25px;
  
}
.login_box .right{
  width: 59%;
  height: 100%  
}
.left .top_link a {
    color: #452A5A;
    font-weight: 400;
}
.left .top_link{
  height: 20px
}
.left .contact{
  display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    height: 100%;
    width: 73%;
    margin: auto;
}
.left h3{
  text-align: center;
  margin-bottom: 40px;
}
.left input {
    border: none;
    width: 80%;
    margin: 15px 0px;
    border-bottom: 1px solid #4f30677d;
    padding: 7px 9px;
    width: 100%;
    overflow: hidden;
    background: transparent;
    font-weight: 600;
    font-size: 14px;
}
.left{
  background: linear-gradient(-45deg, #dcd7e0, #fff);
}
.submit {
    border: none;
    padding: 16px 90px;
    border-radius: 8px;
    display: block;
    margin: auto;
    margin-top: 120px;
    background: #ed2939;
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0px 9px 15px -11px rgba(88,54,114,1);
    transition: 0.3s;
}

.submit:hover {
    background: #c91f2e;
    transform: scale(1.03);
}

.submit i {
    margin-right: 8px;
}

.right {
  background-color: #fff ;
  color: #fff;
  position: relative;
}

.right .right-text{
  height: 100%;
  position: relative;
  transform: translate(0%, 45%);
}
.right-text h2{
  display: block;
  width: 100%;
  text-align: center;
  font-size: 50px;
  font-weight: 500;
}
.right-text h5{
  display: block;
  width: 100%;
  text-align: center;
  font-size: 19px;
  font-weight: 400;
}

.right .right-inductor{
  position: absolute;
  width: 70px;
  height: 7px;
  background: #fff0;
  left: 50%;
  bottom: 70px;
  transform: translate(-50%, 0%);
}
.top_link img {
    width: 28px;
    padding-right: 7px;
    margin-top: -3px;
}

.admin-btn {
    border: 2px solid #ed2939;
    padding: 10px 35px;
    border-radius: 8px;
    display: block;
    margin: auto;
    background: transparent;
    color: #ed2939;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: 0.3s;
}

.admin-btn:hover {
    background: #ed2939;
    color: white;
}

.admin-btn i {
    margin-right: 8px;
}



</style>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
  <section class="login">
    <div class="login_box">
      <div class="left">
        <div class="top_link"><a href="../public/index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return Home</a></div>
        <div class="contact">

          <form method="post">
            <h3>LOG IN</h3>
            <input type="username" placeholder="USERNAME" name="username">
            <input type="password" placeholder="PASSWORD" name="password"><br>
            <span class="psw">Forgot <a href="resetPassword.php">password?</a></span>

            <button class="submit" name="login" id="login">
                <i class="fa fa-user"></i> LOG IN
            </button>
            <hr>
            <span class="psw">Not yet has an account? Register <a href="../public/registerClient.php">here</a></span>

            <br><br>

            <a href="../public/loginAdmin.php">
                <button type="button" class="admin-btn">
                    <i class="fa fa-user-shield"></i> Admin Login
                </button>
            </a>

          </form>
        </div>
      </div>
      <div class="right">
        <img src="../../assets/images/logo.png" alt="">
        
      </div>
    </div>
  </section>
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