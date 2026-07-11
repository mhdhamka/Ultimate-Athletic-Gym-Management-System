<?php
session_start();
// Connect to the database
include "dbConnect_UAGMS.php";

global $conn;

// Check for errors
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
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
        <div class="container" >
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

                            <div class="icons">
                                    <div class="dropdown">
                                    <img src="assets/images/profile.png"  width="40" height="40" class= "rounded-circle">
                                      <div class="dropdown-content">
                                      <a href="profileCustomer.php">Your Profile</a>  
                                      <a href="viewMembershipCustomer.php">Membership</a>
                                        <a href="personalTracker.php">Personal Tracker</a>
                                        <a href="paymentCustomer.php">Payment</a>
                                        <a href="logoutCustomer.php" name="logout">Log Out</a>
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


    <!-- ***** Apply Programme Start ***** -->
    <section class="section" id="program" style = "background-image: url('assets/images/schedule-bg.jpg') " >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2 style="color:white;">Personal <em>Tracker</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-2'><img src="assets/images/tabs-first-icon.png" alt="">Progress Tracker</a></a></li>
                  <li><a href='#tabs-1'><img src="assets/images/tabs-first-icon.png" alt="">Progress Session</a></li>
                  
                </ul><br>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
    <!-- ***** Registered Programme End ***** -->

    <!-- ***** Progress Session Start ***** -->
    <article id='tabs-1'>
        
        <h4 style="color:white;">Progress Session</h4>
        
        <?php
          $sql="SELECT DISTINCT program FROM progresssession WHERE customerID = '{$_SESSION['customerID']}'";
          $result2 = mysqli_query($conn, $sql);

          // Store the result in a variable
          $program = mysqli_fetch_assoc($result2);

          // Echo the data
          if (isset($program)) {
            echo "<h5 style='color:white'>Program: $program[program]</h5><br>";
          } 
        ?>

        <?php
          $sql1="SELECT * FROM progresssession WHERE customerID = '{$_SESSION['customerID']}' ORDER BY sessionNo LIMIT 10";
          $res1 = mysqli_query($conn, $sql1);

          // Print the program
          if (mysqli_num_rows($res1) > 0 ) {
          // Output data of each row
            echo "
            <table>
              <tr>
              <td>Session</td>
              <td>Date (Y:M:D) </td>
              <td>Routine Execerise</td>
              </tr>  
            ";
          while($r = mysqli_fetch_assoc($res1)) 
          {
            
          echo "<tr>
                
                <td>$r[sessionNo]</td>
                <td>$r[sessionDate]</td>
                <td>$r[sessionRoutine]</td>
                </tr>
             "; 
            
          }
         echo " </table><br>";
        } else {
          echo "<h6 style='color:white'>No record is found<br><br><br><br><br><br>";
        }

        ?>

      </article>
        <!-- ***** Progress Session End ***** -->

    <!-- ***** Progress Tracker Start ***** -->
                  <article id='tabs-2'>
                    
                    <h4 style="color:white;">Progress Tracker</h4>
                    <?php
					  $sql="SELECT DISTINCT program FROM progresssession WHERE customerID = '{$_SESSION['customerID']}'";
					  $result2 = mysqli_query($conn, $sql);

					  // Store the result in a variable
					  $program = mysqli_fetch_assoc($result2);

					  // Echo the data
					  if (isset($program)) {
						echo "<h5 style='color:white'>Program: $program[program]</h5><br>";
					  } 
            else{ echo "<h5 style='color:white'>You have not apply for program</h5><br>";} 
					?>
                    <?php
                    echo "<h6 style='color:white'>Session: ";
                   
                    $query="SELECT DISTINCT sessionNo,sessionDate FROM progresstracker WHERE customerID = '{$_SESSION['customerID']}' ORDER BY sessionNo DESC"; 
                    echo "<select id='session' name='session' onchange='getSelected()'><option value=''>Select one (No---Date)</option>";
                    if($r_set = $conn->query($query)){

                      while ($row = $r_set->fetch_assoc()) 
                      { 
                          echo "<option value='$row[sessionNo]'>$row[sessionNo] --- $row[sessionDate]</option>";
                      }
                    echo "</select>";
                      }
                      else{
                      echo $conn->error;
                      }
                    echo "</h6>";
                      // display the table
                     
                      if(isset($_GET['session']) and strlen($_GET['session']) > 0)
                      
                      {
                        
                        if($stmt = $conn->prepare("SELECT * FROM progresstracker WHERE sessionNo=? AND customerID = '{$_SESSION['customerID']}'" )){
                        $stmt->bind_param('i',$_GET['session']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row1 = $result->fetch_assoc()) {
                          echo "<br><h6 style='color:white'>Session No: ";
                          echo  "$row1[sessionNo]";
                          echo "<br><br><h6 style='color:white'>Date: ";
                          echo  "$row1[sessionDate] <br><br>";
                          echo "
                          <table>
                              <tr>
                                <td>Body Part</td>
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
                                <td>Measurement(cm) </td>
                                <td>$row1[weight]</td>
                                <td>$row1[chest]</td>
                                <td>$row1[rightArm]</td>
                                <td>$row1[leftArm]</td>
                                <td>$row1[rightThigh]</td>
                                <td>$row1[leftThigh]</td>
                                <td>$row1[waist]</td>
                                <td>$row1[hips]</td>
                              </tr>
                          </table>
                          <br><br>


                          ";
                          }

                        }else{
                        echo $conn->error;
                        } 
                      }

                      else
                      {
                        echo "<br><h6 style='color:white'>No record is found<br><br><br><br>";
                      } 

                    ?>
                  
                  </article>
    <!-- ***** Progress Tracker End ***** -->

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

    <script>
    function getSelected(){
        var session = document.getElementById("session").value;
        self.location = "personalTracker.php?session=" + session;
    }
</script>

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