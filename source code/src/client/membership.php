<?php include ("../config/db_cUAGMS.php");
session_start();


if (isset($_POST['formApplication'])) {
    // Get the form data
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $mobileNo = mysqli_real_escape_string($conn, $_POST['mobileNo']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    // Get the clientID from the session data
    $clientID = $_SESSION['clientID'];

    // Insert the data into the MySQL table
   $select = mysqli_query($conn, "SELECT * FROM `membership` WHERE fullName = '$fullName' AND mobileNo = '$mobileNo'") or die('query failed');

	if(mysqli_num_rows($select) > 0)
	{
		echo '<script type="text/javascript"> window. onload = function () { alert("You already a member for this month!"); } </script>'; 
	}
	else
	{

		$sql = "INSERT INTO `membership` (`membershipID`, `clientID`, `fullName`, `mobileNo`, `date`, `membershipStatus`) VALUES ('$clientID','$clientID', '$fullName', '$mobileNo', '$date',  'Pending')";
		if (mysqli_query($conn, $sql)) 
		{
			$sql = "UPDATE client
					SET member = 'Pending'
					WHERE clientID = '$clientID'";
			if (mysqli_query($conn, $sql))
			{  
				$success = false;
				echo '<script type="text/javascript"> window. onload = function () { alert("You have joined the membership!"); } </script>';
				header('location: viewMembershipclient.php.#tabs-1');
			}
			else
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Ultimate Athletics Fitness</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../../assets/css/styleindex.css">

    <script type = "text/javascript" src = "formValidation.js"></script>

  <style>

/* Add padding to containers */
.container1 {
  
  background: linear-gradient(-45deg, #dcd7e0, #fff);
  display:flex;
  flex-direction: column;
  justify-content:space-evenly;
  padding: 0px 30px 0px 30px;
  background-color: white;
  font-family: 'Poppins', sans-serif;
  margin-top: 20px;
  height: 400px;
  width: 700px;
}


input[type=text], input[type=password], input[type=email],select[id="state"], input [id="gender"]{
  width: 70%;
  padding: 5px;
  margin: 5x 0 5px 0;
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
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo"><img src="../../assets/images/logo.png"  width="90" height="90"></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                        <li class="scroll-to-section"><a href="../client/dashboard.php">Home</a></li>
                            <li class="scroll-to-section"><a href="../client/dashboard.php.#features">Why Us</a></li>
                            <li class="scroll-to-section"><a href="../client/dashboard.php.#program">Program</a></li>
                            <li class="scroll-to-section"><a href="../client/dashboard.php.#service">Services</a></li>
                            <li class="scroll-to-section"><a href="../client/dashboard.php.#facilities">Facilities </a></li>
                            <li class="scroll-to-section"><a href="../client/dashboard.php.#trainers">About us</a></li>
                            <li class="scroll-to-section"><a href="../client/dashboard.php.#contact-us">Contact Us</a></li> 

                                <div class="icons">
                                    <div class="dropdown">
                                    <img src="../../assets/images/profile.png"  width="40" height="40" class= "rounded-circle">
                                      <div class="dropdown-content">
                                        <a href="../client/profile.php">Profile</a>
                                        <a href="../client/membership.php">Membership</a>
                                        <a href="../client/personalTracker.php">Personal Tracker</a>
                                        <a href="../client/payment.php">Payment</a>
                                        <a href="../public/logout.php" name="logout">Log Out</a>
                                      </div>
                                    </div>
                                </div>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


   

    <!-- ***** Membership Start ***** -->
    <section class="section" id="program" style = "background-image: url('../../assets/images/schedule-bg.jpg') ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2 style="color:white;">Membe<em>rship</em></h2>
                        <img src="../../assets/images/line-dec.png" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
              <ul>
                  <li><a href='#tabs-1'><img src="../../assets/images/tabs-first-icon.png" alt="">View Membership</a></li>
                  <li><a href='#tabs-2'><img src="../../assets/images/tabs-first-icon.png" alt="">Join Membership</a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>

    <!-- ***** View Membership Start ***** -->
                  <article id='tabs-1'>
                    <label for="memberid">Membership ID:</label><p>
                    <?php 
                    // Get the session ID
                    $clientID = $_SESSION['clientID'];

                    // Select the data from the database based on the session ID
                    $query = "SELECT * FROM `membership` WHERE `clientID` = '$clientID'";

                    // Execute the query
                    $result = mysqli_query($conn, $query);

                    // Store the result in a variable
                    $membershipID = mysqli_fetch_assoc($result);

                    // Echo the data
                    if (isset($clientID) && isset($membershipID['membershipID'])) {
                    echo $membershipID['clientID'];
                    } else {
                        echo "Not Available"; }
                    ?></p>

                    <label for="name">Name:</label><p><?php
                    // Get the session ID
                    $clientID = $_SESSION['clientID'];

                    // Select the data from the database based on the session ID
                    $query = "SELECT * FROM `membership` WHERE `clientID` = '$clientID'";

                    // Execute the query
                    $result = mysqli_query($conn, $query);

                    // Store the result in a variable
                    $fullName = mysqli_fetch_assoc($result);

                    // Echo the data
                    if (isset($fullName) && isset($fullName['fullName'])) {
                    echo $fullName['fullName'];
                    } else {
                        echo "Not Available"; }
                    ?>
                    </p>
                    
                    <label for="programdate">Start Date:</label><p><?php 
                    // Get the session ID
                    $clientID = $_SESSION['clientID'];

                    // Select the data from the database based on the session ID
                    $query = "SELECT * FROM `membership` WHERE `clientID` = '$clientID'";

                    // Execute the query
                    $result = mysqli_query($conn, $query);

                    // Store the result in a variable
                    $date = mysqli_fetch_assoc($result);

                    // Echo the data
                    if (isset($date) && isset($date['date'])) {
                    echo $date['date'];
                    } else {
                        echo "Not Available"; }
                    ?></p>
                    <label for="programdate">Expired Date:</label><p><?php
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
                    echo $expiryDate['expiryDate']; 
                    echo "<br><h5 style='color:white'>Duration:</h5><p>1 Month (30 days)</p>";


                    } else {
                        echo "Not Available";
                        echo "<br><h5 style='color:white'>Duration:</h5><p>Not Available</p>";

                    }
                    ?></p>
					<label for="programdate">Membership Status: </label><p><?php
                    // Get the session ID
                    $clientID = $_SESSION['clientID'];

                    // Select the data from the database based on the session ID
                    $query = "SELECT * FROM `membership` WHERE `clientID` = '$clientID'";

                    // Execute the query
                    $result = mysqli_query($conn, $query);

                    // Store the result in a variable
                    $membershipStatus = mysqli_fetch_assoc($result);

                    // Echo the data
                    if (isset($membershipStatus) && isset($membershipStatus['membershipStatus'])) {
                    echo $membershipStatus['membershipStatus'];
                    } else {
                        echo "Not Available"; }
                    ?></p>
                  
                    <br>
              

                  </article>
                
    <!-- ***** View Membership End ***** -->
    
    <!-- ***** Join Membership start ***** -->
        <article id='tabs-2'>
        <h3 style="color:white;text-align:center">Membership Form Application: <h3>
        <form method="post" name="formApplication" onsubmit="return validate();"> 
        <div class="container1">
        <hr>
        <h4>Your client ID: <?php
        $clientID = $_SESSION['clientID'];
        echo $clientID;?></h4>

        <h4>Name:
        <input type="text" placeholder="Full Name" name="fullName" id="fullName" style="text-transform: capitalize;" value="<?php echo $_SESSION['fullName']; ?>"readonly></input></h4>
        <h4>Phone No:
        <input type="text" placeholder="Mobile Number" name="mobileNo" id="mobileNo" value="<?php echo $_SESSION['mobileNo']; ?>"readonly></input></h4>

        <h4>Date:
        <input type="date" id="currentDate" name="date"></h4>

        <script>
        document.getElementById("currentDate").value = new Date().toISOString().split("T")[0];
        </script>
        <hr>
        </div><br>
            <div class="check-box">
            <button type="reset" class="clear">Clear</button>
            <button type="submit" name="formApplication" value="formApplication" class="submit" >Submit</button>
        </div>
        </div>
        </form>
        <br><br>

        </article>
    </section>
    </div></div></div></section>
    <!-- ***** Join Membership End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <p>With 8 years experience of Ultimate Athelicts Gym, we are now ready to compliment our service and program. We offer personal coach and private class. Do contact us to get know us. </p>
            <div class="social">
              <a href="https://www.facebook.com/uagkotasamarahan"><img src="../../assets/images/fb.png"  width="30" height="30"></span></a>
              <a href="https://www.instagram.com/ultimateathleticsgym/"><img src="../../assets/images/ig.png"  width="30" height="30"></span></a>
              <a href="https://www.tiktok.com/@ultimateathleticsgym"><img src="../../assets/images/tiktok.png"  width="30" height="30"></span></a>
            </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2022 Ultimate Athletics FITNESS - Distributed by TME3413 Group 6 Castor</p>

                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../../assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="../../assets/js/scrollreveal.min.js"></script>
    <script src="../../assets/js/waypoints.min.js"></script>
    <script src="../../assets/js/jquery.counterup.min.js"></script>
    <script src="../../assets/js/imgfix.min.js"></script> 
    <script src="../../assets/js/mixitup.js"></script> 
    <script src="../../assets/js/accordions.js"></script>
    <script src="../../assets/js/slideshow.js"></script>
    <!-- Global Init -->
    <script src="../../assets/js/custom.js"></script>

  </body>
</html>