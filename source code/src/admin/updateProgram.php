<?php
	session_start();
	include "dbConnect_UAGMS.php";
	
	if (isset($_POST['submit']))
	{
		global $conn;
		$programID = $_POST['programID'];
		$name = $_POST['name'];
		$desc1 = $_POST['desc1'];
		$desc2 = $_POST['desc2'];
		$desc3 = $_POST['desc3'];
		$desc4 = $_POST['desc4'];
		$desc5 = $_POST['desc5'];
		
		if(empty($_FILES['image']['name']))
		{
			$sql = "UPDATE program
			SET programName = '$name', desc1 = '$desc1', desc2 = '$desc2', desc3 = '$desc3', desc4 = '$desc4', desc5 = '$desc5' 
			WHERE programID = '$programID'";
			mysqli_query($conn, $sql);
		
			
			if (mysqli_query($conn, $sql))
			{   
				header('location: updateProgram.php?editID=1');
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
			
			$sql = "UPDATE program
			SET programName = '$name', desc1 = '$desc1', desc2 = '$desc2', desc3 = '$desc3', desc4 = '$desc4', desc5 = '$desc5', programIMG = '$path'
			WHERE programID = '$programID'"; 
			mysqli_query($conn, $sql);
			if (move_uploaded_file($_FILES['image']['tmp_name'], $path))
			{
				header('location: updateProgram.php?editID=1');
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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
                <a href="index.html" class="navbar-brand mx-4 mb-3">
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
                    <a href="indexAdmin.php" class="nav-item nav-link"><i class="fa fa-user-tag me-2"></i>Membership</a>
					<a href="updateWebsite.php" class="nav-item nav-link active"><i class="fa fa-laptop me-2"></i>Update Website</a>
                    <a href="manageMember.php" class="nav-item nav-link"><i class="fa fa-user-plus me-2"></i>Manage Member</a>
                    <a href="progress.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Progress Tracker</a>
                    <a href="History.php" class="nav-item nav-link"><i class="fa fa-file-invoice me-2"></i>Payment History</a>
                    <!--<a href="History.php" class="nav-item nav-link"><i class="fa fa-line-chart me-2"></i>Report</a>
                    <a href="History.php" class="nav-item nav-link"><i class="fa fa-bell-on me-2"></i>Announcement</a>-->
                    <a href="adminProfile.php" class="nav-item nav-link"><i class="fa fa-user-cog me-2"></i>My Profile</a>
                    <a href="logoutAdmin.php" class="nav-item nav-link"><i class="fa fa-sign-out me-2"></i>Sign Out</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
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
                            <a href="adminProfile.php" class="dropdown-item">My Profile</a>
                            <a href="logoutAdmin.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
				<div class="bg-secondary text-center rounded p-4">
						<div class="d-flex align-items-center justify-content-between mb-4">
							<h6 class="mb-4">PROGRAM UPDATE</h6>
						</div>
						<div class="table-responsive">
							<table class="table text-start align-middle table-bordered table-hover mb-0">
								<thead>
									<tr class="text-white">
										<th scope="col">Program ID</th>
										<th scope="col">Program Name</th>
										<th scope="col">Program Desc</th>
										<th scope="col"></th>
										<th scope="col"></th>
										<th scope="col"></th>
										<th scope="col"></th>
										<th scope="col">Program Image</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										global $conn;
										$sql = "SELECT * FROM program";
										
										$result = mysqli_query($conn, $sql);
										if ($result -> num_rows > 0)
										{
											while ($row = $result -> fetch_assoc())
											{
												echo "<tr style = 'text-align: left;'>
														<td>".$row['programID']."</td>
														<td>".$row['programName']."</td>
														<td>".$row['desc1']."</td>
														<td>".$row['desc2']."</td>
														<td>".$row['desc3']."</td>
														<td>".$row['desc4']."</td>
														<td>".$row['desc5']."</td>
														<td><img src = ".$row['programIMG']." style = 'width: 100%'></td>
														<td>
															<button><a href=\"updateProgram.php?editID=$row[programID]\">Update</a></button>
														</td>
													 </tr>";
											}
										}
									?>
								</tbody>
							</table>
						</div>
					<div class="row g-4">
						<div class="col-sm-12 col-xl-6">
							<div class="bg-secondary rounded h-100 p-4">
								<form action = "updateProgram.php" method = "POST"  enctype="multipart/form-data">
									<?php
										global $conn;
										$editID = $_GET['editID'];
										$sql = "SELECT * FROM program WHERE programID = $editID";
										
										$result = mysqli_query($conn, $sql);
										if ($result -> num_rows > 0)
										{
											while ($row = $result -> fetch_assoc())
											{
												$programID = $_GET['editID'];
												$programName = $row['programName'];
												$desc1 = $row['desc1'];
												$desc2 = $row['desc2'];
												$desc3 = $row['desc3'];
												$desc4 = $row['desc4'];
												$desc5 = $row['desc5'];
											}
										}		
											?>
									 <div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Program ID</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputFname" name = "programID" value = "<?php echo $programID ?>" readonly>
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Program Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputFname" name = "name" value = "<?php echo $programName ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Description 1</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputFname" name = "desc1" value = "<?php echo $desc1 ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Description 2</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputFname" name = "desc2" value = "<?php echo $desc2 ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Description 3</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputFname" name = "desc3" value = "<?php echo $desc3 ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Description 4</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputFname" name = "desc4" value = "<?php echo $desc4 ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Description 5</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputFname" name = "desc5" value = "<?php echo $desc5 ?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputFname" class="col-sm-2 col-form-label">Program Image</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" id="inputFname" name = "image">
										</div>
									</div>
									<button type="submit" class="btn btn-primary" style = "background-color: white"><a href = "updateWebsite.php" style = "font-color: white;">Cancel</a></button>
									<button type="submit" class="btn btn-primary" name = "submit">Update</button>
								</form>
							</div>
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
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
	<script src="https://kit.fontawesome.com/626fa0fc8f.js" crossorigin="anonymous"></script>
</body>

</html>