<?php
	session_start();
	include ("../config/db_cUAGMS.php");
	
	if (isset($_POST['submit']))
	{
		global $conn;
		$clientID = $_POST['clientID'];
		$program = $_POST['program'];
		$no = $_POST['no'];
		$date = $_POST['date'];
		$routine = $_POST['routine'];
		
		$sql = "INSERT INTO progression(clientID, program, sessionNo, sessionDate, sessionRoutine)
				VALUES('$clientID','$program', '$no', '$date', '$routine')";

		if (mysqli_query($conn, $sql))
		{   
			$success = false;
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	
	if (isset($_POST['submit2']))
	{
		global $conn;
		$clientID = $_POST['clientID'];
		$program = $_POST['program'];
		$no = $_POST['no'];
		$date = $_POST['date'];
		$weight = $_POST['weight'];
		$chest = $_POST['chest'];
		$rarm = $_POST['rarm'];
		$larm = $_POST['larm'];
		$rthigh = $_POST['rthigh'];
		$lthigh = $_POST['lthigh'];
		$waist = $_POST['waist'];
		$hips = $_POST['hips'];
		
		$sql = "INSERT INTO progresstracker(clientID, program, sessionNo, sessionDate, weight, chest, rightArm, leftArm, rightThigh, leftThigh, waist, hips)
				VALUES('$clientID','$program', '$no', '$date', '$weight', '$chest', '$rarm', '$larm', '$rthigh', '$lthigh', '$waist', '$hips')";

		if (mysqli_query($conn, $sql))
		{   
			$success = false;
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

    <!-- omized Bootstrap Stylesheet -->
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
                <a href="../admin/dashboard.php.php" class="navbar-brand mx-4 mb-3">
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
                    <a href="../admin/dashboard.php.php" class="nav-item nav-link"><i class="fa fa-user-tag me-2"></i>Membership</a>
					<a href="../admin/updateWebsite.php" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Update Website</a>
                    <a href="../admin/manageMember.php" class="nav-item nav-link"><i class="fa fa-user-plus me-2"></i>Manage Member</a>
                    <a href="../admin/progress.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Progress Tracker</a>
                    <a href="../admin/history.php" class="nav-item nav-link"><i class="fa fa-file-invoice me-2"></i>Payment History</a>
                    <!--<a href="../admin/History.php" class="nav-item nav-link"><i class="fa fa-line-chart me-2"></i>Report</a>
                    <a href="../admin/History.php" class="nav-item nav-link"><i class="fa fa-bell-on me-2"></i>Announcement</a>-->
                    <a href="../admin/profile.php" class="nav-item nav-link"><i class="fa fa-user-cog me-2"></i>Profile</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="../admin/dashboard.php.php" class="navbar-brand d-flex d-lg-none me-4">
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
                            <a href="../public/logoutAdmin.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Membership details Start -->
			<div class="container-fluid pt-4 px-4">
				<div class="bg-secondary text-center rounded p-4">
					<div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Program Members</h6>
                    </div>
					<table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">client ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Program</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									$clientID = $_GET['updateID'];
									global $conn;
									$sql = "SELECT * FROM client WHERE clientID = $clientID";
									$result = mysqli_query($conn, $sql);

									if ($result -> num_rows > 0)
									{
										while ($row = $result -> fetch_assoc())
										{
											echo "<tr style = 'text-align: center;'>
													<td>".$row['clientID']."</td>
													<td>".$row['fullName']."</td>
													<td>".$row['programJoined']."</td>
												 </tr>";
											 $program = $row['programJoined'];
										}
									}
								?>
                            </tbody>
                        </table>
				</div>
			</div>
			
			<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">VIEW SESSION PROGRESSION</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <?php 
								$clientID = $_GET['updateID'];
								$sessionNo = 1;
								
								global $conn;
								$sql = "SELECT * FROM progression WHERE clientID = '$clientID'";
								$result = mysqli_query($conn, $sql);
								
								if ($result !== false && $result->num_rows > 0)
								{
									while ($row = $result -> fetch_assoc())
									{
										echo "<thead>
												<tr class='text-white'>
													<th scope='col'>Session ".$row['sessionNo']."</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Date</td>
													<td>".$row['sessionDate']."</td>
												</tr>
												<tr>
													<td>Routine</td>
													<td>".$row['sessionRoutine']."</td>
												</tr>
											</tbody>";
											 $sessionNo = $sessionNo+1;
									}
								}
								else
								{
									echo "<thead>
												<tr class='text-white'>
													<th scope='col'>Session</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Date</td>
													<td></td>
												</tr>
												<tr>
													<td>Routine</td>
													<td></td>
												</tr>
											</tbody>
											<span>client does not have existing session.</span>";
								}
							?>
                        </table>
                    </div><br>
					<form method = "POST" action = "../admin/updateprogress.php?updateID=<?php echo $clientID ?>">
						<div class="row mb-3">
							<div class="col-sm-10">
								<input type="hidden" class="form-control" id="inputRoutine" name = "clientID" value = "<?php echo $clientID ?>">
							</div>
							<div class="col-sm-10">
								<input type="hidden" class="form-control" id="inputRoutine" name = "program" value = "<?php echo $program ?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputno" class="col-sm-2 col-form-label">Session No</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "no" value = "<?php echo $sessionNo ?>">
							</div>
						</div>
						 <div class="row mb-3">
							<label for="inputDate2" class="col-sm-2 col-form-label">Session Date</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" id="inputDate1" name = "date">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">Session Routine</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "routine">
							</div>
						</div>
						<button><a href="../admin/viewprogress.php?viewID=<?php echo $clientID ?>">Cancel</a></button>
						<button type="submit" class="button5" name = "submit">Add Session</button>
					</form>
                </div>
            </div>
			
			<div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">VIEW PROGRESS TRACKER</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
							<?php 
								$clientID = $_GET['updateID'];
								$sessionNo = 1;
								
								global $conn;
								$sql = "SELECT * FROM progresstracker WHERE clientID = '$clientID'";
								$result = mysqli_query($conn, $sql);
								
								if ($result !== false && $result->num_rows > 0)
								{
									while ($row = $result -> fetch_assoc())
									{
										echo "<thead>
											<tr class='text-white'>
												<th scope='col'>Session ".$row['sessionNo']."</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Date: ".$row['sessionDate']."</td>
												<td>Weight</td>
												<td>Chest</td>
												<td>R. Arms</td>
												<td>L. Arms</td>
												<td>R. Thigh</td>
												<td>L. Thigh</td>
												<td>Waists</td>
												<td>Hips</td>
											</tr>
											<tr>
												<td>Measurements				</td>
												<td>".$row['weight']." KG</td>
												<td>".$row['chest']." CM</td>
												<td>".$row['rightArm']." CM</td>
												<td>".$row['leftArm']." CM</td>
												<td>".$row['rightThigh']." CM</td>
												<td>".$row['leftThigh']." CM</td>
												<td>".$row['waist']." CM</td>
												<td>".$row['hips']." CM</td>
											</tr>
										</tbody>";
										$sessionNo = $sessionNo+1;
									}
								}
								else
								{
									echo "<thead>
											<tr class='text-white'>
												<th scope='col'>Session</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Date: </td>
												<td>Weight</td>
												<td>Chest</td>
												<td>R. Arms</td>
												<td>L. Arms</td>
												<td>R. Thigh</td>
												<td>L. Thigh</td>
												<td>Waists</td>
												<td>Hips</td>
											</tr>
											<tr>
												<td>Measurements</td>
												<td> KG</td>
												<td> CM</td>
												<td> CM</td>
												<td> CM</td>
												<td> CM</td>
												<td> CM</td>
												<td> CM</td>
												<td> CM</td>
											</tr>
										</tbody>
										<span>client does not have existing progress.</span>";
								}
							?>
                        </table>
                    </div>
					<form method = "POST" action = "updateprogress.php?updateID=<?php echo $clientID ?>">
						<div class="row mb-3">
							<div class="col-sm-10">
								<input type="hidden" class="form-control" id="inputRoutine" name = "clientID" value = "<?php echo $clientID ?>">
							</div>
							<div class="col-sm-10">
								<input type="hidden" class="form-control" id="inputRoutine" name = "program" value = "<?php echo $program ?>">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputno" class="col-sm-2 col-form-label">Session No</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "no" value = "<?php echo $sessionNo ?>">
							</div>
						</div>
						 <div class="row mb-3">
							<label for="inputDate2" class="col-sm-2 col-form-label">Session Date</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" id="inputDate1" name = "date">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">Weight (KG)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "weight">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">Chest (CM)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "chest">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">R. Arm (CM)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "rarm">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">L. Arm (CM)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "larm">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">R. Thigh (CM)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "rthigh">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">L. Thigh (CM)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "lthigh">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">Waist (CM)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "waist">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputRoutine" class="col-sm-2 col-form-label">Hips (CM)</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputRoutine" name = "hips">
							</div>
						</div>
						<button><a href="../admin/viewprogress.php?viewID=<?php echo $clientID ?>">Cancel</a></button>
						<button type="submit" class="button5" name = "submit2">Add Progress</button>
					</form>
                </div>
            </div>
            <!-- Membership details End -->

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