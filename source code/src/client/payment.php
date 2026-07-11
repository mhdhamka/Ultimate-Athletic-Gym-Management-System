<?php
// Start the session
session_start();

// Connect to the database
include "dbConnect_UAGMS.php";

global $conn;

// Check for errors
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$date = date("Y-m-d");

// Check if the form was submitted
if (isset($_POST['Submit_1'])) {
  // Escape special characters to prevent SQL injection
  $customerID = mysqli_real_escape_string($conn, $_SESSION['customerID']);
  $method = mysqli_real_escape_string($conn, $_POST['method']);
  $for = mysqli_real_escape_string($conn, $_POST['for']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  //$proof = mysqli_real_escape_string($conn, $_POST['proof']);
  $amount = mysqli_real_escape_string($conn, $_POST['amount']);
  
	if(empty($_FILES['proof']['name']))
	{
		
		echo '<script type="text/javascript"> window. onload = function () { alert("No payment proof uploaded!"); } </script>'; 
	} 
	else
	{
		$proof = $_FILES['proof']['name'];
		$path = "assets/images/".basename($proof);
		
		$query = "INSERT INTO `payment` (`customerID`, `paymentMethod`, `paymentFor`, `paymentDate` , `paymentAmount`, `paymentProof`, `approvalStatus`)
					VALUES('$customerID', '$method', '$for', '$date', '$amount', '$path', 'Pending')"; 

		  // Execute the query
		if (mysqli_query($conn, $query))
		{
			echo '<script type="text/javascript"> window. onload = function () { alert("Payment submission successfully!"); } </script>';
		}
		else
		{
			echo "Error updating record: " . mysqli_error($conn);
		}
	}
}

if (isset($_POST['Submit_2'])) {
  // Escape special characters to prevent SQL injection
  $customerID = mysqli_real_escape_string($conn, $_SESSION['customerID']);
  $method = mysqli_real_escape_string($conn, $_POST['method']);
  $for = mysqli_real_escape_string($conn, $_POST['for']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $amount = mysqli_real_escape_string($conn, $_POST['amount']);

  // Build the update query
  $query = "INSERT INTO `payment` (`customerID`, `paymentMethod`, `paymentFor`, `paymentDate` , `paymentAmount`, `approvalStatus`)
  VALUES('$customerID', '$method','$for', '$date', '$amount', 'Pending')"; 

  // Execute the query
	if (mysqli_query($conn, $query))
	{
		echo '<script type="text/javascript"> window. onload = function () { alert("Payment submission successfully!"); } </script>'; 
		header('location: invoice.html');
	}
	else
	{
		echo "Error updating record: " . mysqli_error($conn);
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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/styleindex.css">

    <style>
      #tabs-3 table {
  width: 100%;
  padding: 10px;
  text-align: center;
  border: 2px solid #fff;
}

 #tabs-3 table tbody {
  border-top: 2px solid #fff; 
  padding: 10px;
}

 #tabs-3  table tbody tr {
  border-bottom: 2px solid #fff;
  padding: 10px;
}

 #tabs-3 table tbody tr td {
  border-right: 2px solid #fff;
  height: 80px;
  padding: 10px;
}

 #tabs-3 table tr td {
  color: #fff;
  font-size: 13px;
  text-transform: capitalize;
  font-weight: 500;
  letter-spacing: 0.20px;
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
                        <a href="index.html" class="logo"><img src="assets/images/logo.png"  width="90" height="90"></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                        <li class="scroll-to-section"><a href="index2Customer.php">Home</a></li>
                        <li class="scroll-to-section"><a href="index2Customer.php.#features">Why Us</a></li>
                            <li class="scroll-to-section"><a href="index2Customer.php.#program">Program</a></li>
                            <li class="scroll-to-section"><a href="index2Customer.php.#service">Services</a></li>
                            <li class="scroll-to-section"><a href="index2Customer.php.#facilities">Facilities </a></li>
                            <li class="scroll-to-section"><a href="index2Customer.php.#trainers">About us</a></li>
                            <li class="scroll-to-section"><a href="index2Customer.php.#contact-us">Contact Us</a></li> 

                               <form method="post"><div class="icons">
                                    <div class="dropdown">
                                    <img src="assets/images/profile.png"  width="40" height="40" class= "rounded-circle">
                                      <div class="dropdown-content">
                                      <a href="profileCustomer.php">My Profile</a>
                                        <a href="viewMembershipCustomer.php">Membership</a>
                                        <a href="personalTracker.php">Personal Tracker</a>
                                        <a href="paymentCustomer.php">Payment</a>
                                        <a href="logoutCustomer.php" name="logout">Log Out</a>
                                      </div>
                                    </div></form>
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

    <!-- ***** Online banking Start ***** -->
    <section class="section" id="program" style = "background-image: url('assets/images/schedule-bg.jpg') " >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2 style="color:white;">Pay<em>ment</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><img src="assets/images/tabs-first-icon.png" alt="">Online Banking</a></li>
                  <li><a href='#tabs-2'><img src="assets/images/tabs-first-icon.png" alt="">Pay Cash</a></a></li>
                  <li><a href='#tabs-3'><img src="assets/images/tabs-first-icon.png" alt="">Payment History</a></a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    
                      <h4 style="color:white;">Transfer Bank Account </h4>
                      <h5 style="color:white;"> 22063023208351 CIMB BANK ( Mohd Qisthee Bin Yahya )</h5><br>
                      <p>1. Transfer to number account above</p>
                      <p>2. Insert the actual amount</p>
                      <p>3. Screenshot or print the receipt after succesfull payment</p>
                      <p>4. Upload receipt</p>
                      <br>
                      
                      <h4 style="color:white; ">DuitNow QR Code</h4>
                      <p>1. Scan DuitNow QR below</p>
                      <p>2. Insert the total amount</p>
                      <p>3. Screenshot the receipt after successfull payment</p>
                      <p>4. Upload receipt</p>
                         
                      <img src="assets/images/bank.jpg" alt="method1" style="width: 450px; height: 500px;"><br><br>
                    
                  <!--**** Payment Form****-->
                    <form method="POST" name="Submit" onclick="return validate();" enctype="multipart/form-data">  
                     <h4 style="color:white;text-align:center ">Payment form: </h4>
                     <h5 style="color:white; "> Username: <?php $username = $_SESSION['username']; echo $username;?> </h5>
                     <br>
                     <h5 style="color:white; ">Method: 
                     <select name="method" id="method">
                        <option value="DuitNow QR">DuitNow QR</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        </select></h5>
                        <br>
                      <h5 style="color:white; ">For: 
                     <select name="for" id="for" required>
                        <option value="Walk-in">Walk-in</option>
                        <option value="Membership">Membership</option>
                        <option value="Eek! Personal Porgram">Eek! Personal Porgram</option>
                        <option value="Eek! Online Program">Eek! Online Program</option>
                        </select></h5>
                        <br>
                        <h5 style="color:white; "> Date:
                        <input type="date" name="date" required> </input></h5>
                        <br>
                        <h5 style="color:white; "> Amount:
                        <input type="text" name="amount" placeholder="RM" required> </input></h5>
                        <br>
                      <br><p>Click on the "Browse File" button to upload a file:</p>

                        
                      <div class="Neon Neon-theme-dragdropbox">
                      <input style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;" name="proof" id="filer_input2" multiple="multiple" type="file">
                      <div class="Neon-input-dragDrop"><div class="Neon-input-inner"><div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div><div class="Neon-input-text"><h3>Drag &amp; Drop files here</h3> <span style="display:inline-block; margin: 15px 0">or</span></div><a class="Neon-input-choose-btn blue">Browse Files</a></div></div>
                      </div><br>
                      <div class="main-button">
                        <input type = "submit" name = "Submit_1" id= "Submit_1" value = "Submit"></input> 
                      </div><br>
                  </form>
                <!--**** Payment Form****-->
                  </article>
    <!-- ***** Online Banking End ***** -->

    <!-- ***** Pay Cash Start ***** -->
                  <article id='tabs-2'>
                    
                    <h4 style="color:white;">Pay by Cash </h4>
                    <p>1. Insert the total amount</p>
                    <p>2. Click continue</p>
                    <p>3. Screenshot or print the invoice </p>
                    <p>4. Send invoice to cashier</p>
                   <!--**** Payment Form****-->
                   <form method="POST" name="Submit_2" onclick="return validate();">  
                     <h4 style="color:white;text-align:center ">Payment form: </h4>
                     <h5 style="color:white; "> Username: <?php $username = $_SESSION['username']; echo $username;?> </h5>
                     <br>
                     <h5 style="color:white; ">Method: 
                        <select name="method" id="method">
                            <option value="Pay by Cash">Pay by Cash</option>
                        </select></h5>
                        <br>
                      <h5 style="color:white; ">For: 
                      <select name="for" id="for">
                      <option value="Walk-in">Walk-in</option>
                        <option value="Membership">Membership</option>
                        <option value="Eek! Personal Porgram">Eek! Personal Porgram</option>
                        <option value="Eek! Online Program">Eek! Online Program</option>
                        </select></h5>
                        <br>
                        <h5 style="color:white; "> Date:
                        <input type="date" name="date" required> </input></h5>
                        <br>
                        <h5 style="color:white; "> Amount:
                        <input type="text" name="amount" placeholder="RM" required> </input></h5>
                        <br>
                      <div class="main-button">
                        <input type = "submit" name = "Submit_2" value = "Submit"></input> 
                      </div><br>
                  </form>
                <!--**** Payment Form****-->
                  </article>

    <!-- ***** Pay Cash End ***** -->

    <!-- ***** Payment History End ***** -->
    <article id='tabs-3'>
        
    <h4 style="color:white;">Payment History</h4>
        
        <?php
          $sql="SELECT * FROM payment WHERE customerID = '{$_SESSION['customerID']}' Order by invoiceID DESC";
          $res = mysqli_query($conn, $sql);

          // Print the program
          if (mysqli_num_rows($res) > 0 ) {
          // Output data of each row
            echo "
            <table>
              <tr>
              <td>Date (Y:M:D) </td>
              <td>Invoice ID</td>
              <td>Payment Method</td>
              <td>Payment For</td>
              <td>Amount</td>
              </tr>  
            ";
          while($r = mysqli_fetch_assoc($res)) 
          {
            
          echo "<tr>
                <td>$r[paymentDate]</td>
                <td>$r[invoiceID]</td>
                <td>$r[paymentMethod]</td>
                <td>$r[paymentFor]</td>
                <td>$r[paymentAmount]</td>
                </tr>
             "; 
            
          }
         echo " </table><br><br><br><br><br>";
        } else {
          echo "<h6 style='color:white'>No record is found<br><br><br><br><br><br><br><br><br><br><br>";
        }

        ?>
      
    </article>
    <!-- ***** Payment History End ***** -->

                </section>
              </div>
            </div>
        </div>
    </section>

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <p>With 8 years experience of Ultimate Athelicts Gym, we are now ready to compliment our service and program. We offer personal coach and private class. Do contact us to get know us. </p>
            <div class="social">
              <a href="https://www.facebook.com/uagkotasamarahan"><img src="assets/images/fb.png"  width="30" height="30"></span></a>
              <a href="https://www.instagram.com/ultimateathleticsgym/"><img src="assets/images/ig.png"  width="30" height="30"></span></a>
              <a href="https://www.tiktok.com/@ultimateathleticsgym"><img src="assets/images/tiktok.png"  width="30" height="30"></span></a>
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