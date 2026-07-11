<?php
	include ("../config/db_cUAGMS.php");
	$username = $email = $password = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (isset($_POST['submit'])) {
		global $conn;
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

	
		/*$phonevalid = "/(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$/";
		$passwordvalid = "~/^(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])(?=(.*\d){6})(?!.* )/~";*/

		/*if (ctype_space($username)) {
			$fullNameError = "*First Name cannot be Blank!*";
            }
            else{
            	if (!preg_match("/^([A-Z]){1}([a-z]){1,}$/", trim($fullName))) {
            	$fullNameError = "*First Character must be Uppercase and Follow by Lowercase!*";
            	}
            	if (preg_match($number,trim($fullName))) {
				$fullNameError = "*First Name cannot be Numbers!*";
            	}
            }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "*Invalid email Format!*";
            }

        /*if(!preg_match($phonevalid, $phonenumber)){
        	$phoneError = "*Invalid Phone Number!*";
        }
		
		if(!preg_match($passwordvalid, $password)){
        	$passwordError = "*Password must contain ONE upppercase, ONE lowercase,\nONE special character, numbers and no space!*";
        }

		if ($password2 != $password) {
			$password2Error = "*Confirm Password does not match!*";
		}*/

				
				
				/*if($conn->connect_error){
				echo "$conn->connect_error";
				die("Connection Failed : ". $conn->connect_error);
				} else {*/
				global $conn;
				$sql = "INSERT INTO admin(adminUsername, adminEmail, adminPassword)
						VALUES('$username', '$email', '$password')";

				if (mysqli_query($conn, $sql))
				{   
					$success = false;
				}
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				header("location: signinAdmin.php");
		}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ultimate Athletics Gym Management Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">

                    <div class="top_link"><a href="../public/index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return Home</a></div>

                    <br>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="../public/registerAdmin.php" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>
						<form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="username" placeholder="jhondoe">
								<label for="floatingText">Username</label>
							</div>
							<div class="form-floating mb-3">
								<input type="email" class="form-control" name="email" placeholder="name@example.com">
								<label for="floatingInput">Email address</label>
							</div>
							<div class="form-floating mb-4">
								<input type="password" class="form-control" name="password" placeholder="Password">
								<label for="floatingPassword">Password</label>
							</div>
							<button type="submit" name = "submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
						</form>
                        <p class="text-center mb-0">Already have an Account? <a href="../public/loginAdmin.php">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/chart/chart.min.js"></script>
    <script src="../../lib/easing/easing.min.js"></script>
    <script src="../../lib/waypoints/waypoints.min.js"></script>
    <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../js/main.js"></script>
</body>

</html>