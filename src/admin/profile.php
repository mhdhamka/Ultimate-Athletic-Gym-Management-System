<?php
	session_start();
	include ("../config/db_cUAGMS.php");
	
	if (isset($_POST['submit']))
	{
		global $conn;
		$adminID = $_POST['adminID'];
		$username = $_POST['username'];
		$password = $_POST['password'];
        $email = $_POST['email'];
		
		if(empty($_FILES['image']['name']))
		{
			$sql = "UPDATE admin
					SET adminUsername = '$username', adminPassword = '$password', adminEmail = '$email'
					WHERE adminID = '$adminID'";
			mysqli_query($conn, $sql);
		
			
			if (mysqli_query($conn, $sql))
			{   
				header('location: ../admin/profile.php');
			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}			
		} 
		else
		{
			$image = $_FILES['image']['name'];
			$path = "assets/images/".basename($image);
			
			$sql = "UPDATE admin
					SET adminUsername = '$username', adminPassword = '$password', adminEmail = '$email', adminIMG = '$path'
					WHERE adminID = '$adminID'";
			mysqli_query($conn, $sql);
			
			if (move_uploaded_file($_FILES['image']['tmp_name'], $path))
			{
				header('location: ../admin/profile.php');
			}
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
    <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
	
	<style>
		.container {
		  position: relative;
		  width: 100%;
		}

		.image {
		  display: block;
		  width: 100%;
		  height: auto;
		}

		.overlay {
		  position: absolute;
		  top: 0;
		  bottom: 0;
		  left: 0;
		  right: 0;
		  height: 100%;
		  width: 100%;
		  opacity: 0;
		  transition: .5s ease;
		  background-color: grey;
		}

		.container:hover .overlay {
		  opacity: 0.5;
		}

		.text {
		  color: white;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}

        .cancel-btn {
            background-color: white;
            color: #ed563b;
            border: 2px solid #ed563b;
            padding: 8px 20px;
            border-radius: 5px;
            font-weight: 500;
            transition: 0.3s;
        }

        .cancel-btn:hover {
            background-color: #ed563b;
            color: white;
        }
	</style>
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
		<?php
			global $conn;
			$sql = "SELECT * FROM admin WHERE logStatus = 1;";
			$result = mysqli_query($conn, $sql);
			
			if ($result -> num_rows > 0)
			{
				while ($row = $result -> fetch_assoc())
				{
					$username = $row["adminUsername"];
					$img = $row['adminIMG'];
				}
			}
		?>


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="indexAdmin.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo $img ?>" alt="" style="width: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
							<span class="d-none d-lg-inline-flex">
								<?php echo $username ?>
							</span></h6>
                        <span>Admin</span>
                    </div>
                </div>
                 <div class="navbar-nav w-100">
                    <a href="../admin/dashboard.php" class="nav-item nav-link"><i class="fa fa-user-tag me-2"></i>Membership</a>
					<a href="../admin/updateWebsite.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Update Website</a>
                    <a href="../admin/manageMember.php" class="nav-item nav-link"><i class="fa fa-user-plus me-2"></i>Manage Member</a>
                    <a href="../admin/progress.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Progress Tracker</a>
                    <a href="../admin/history.php" class="nav-item nav-link"><i class="fa fa-file-invoice me-2"></i>Payment History</a>
                    <!--<a href="../admin/History.php" class="nav-item nav-link"><i class="fa fa-line-chart me-2"></i>Report</a>
                    <a href="../admin/History.php" class="nav-item nav-link"><i class="fa fa-bell-on me-2"></i>Announcement</a>-->
                    <a href="../admin/profile.php" class="nav-item nav-link active"><i class="fa fa-user-cog me-2"></i>Profile</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="indexAdmin.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="<?php echo $img ?>" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">
								<?php echo $username ?>
							</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="../admin/profile.php" class="dropdown-item">Profile</a>
                            <a href="../public/logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="center">
                    <div class="col-sm-12 col-xl-6">
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Update Profile Information</h6>
                            <form method = "POST" action = "../admin/profile.php" enctype="multipart/form-data">
								<?php
									global $conn;
									$sql = "SELECT * FROM admin WHERE logStatus = 1";
									$result = mysqli_query($conn, $sql);
									
									if ($result -> num_rows > 0)
									{
										while ($row = $result -> fetch_assoc())
										{
											$adminID = $row['adminID'];
											$username = $row['adminUsername'];
											$email = $row['adminEmail'];
											$password = $row['adminPassword'];
											$img = $row['adminIMG'];
										}
									}
									else
									{
										echo "Error: " . $sql . "<br>" . mysqli_error($conn);
									}
								?>
								<div class="row mb-3">
									<center><img class="rounded-circle" src="<?php echo $img ?>" style="width: 30%;">
                                </div><br>
								<div class="row mb-3">
                                    <label for="inputFname" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
										<input type="hidden" class="form-control" id="inputFname" name = "adminID" value = "<?php echo $adminID ?>">
										<input type="text" class="form-control" id="inputFname" name = "username" value = "<?php echo $username ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputFname" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputFname" name = "email" value = "<?php echo $email ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputLname" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputLname" name = "password" value = "<?php echo $password ?>">
                                    </div>
                                </div>
								<div class="row mb-3">
                                    <label for="inputFname" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="inputFname" name = "image">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>

                                <button type="button" class="btn cancel-btn" onclick="window.location.href='../admin/dashboard.php';">
                                    Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Ultimate Athletics Gym Management</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
	<script src="https://kit.fontawesome.com/626fa0fc8f.js" crossorigin="anonymous"></script>
</body>

</html>