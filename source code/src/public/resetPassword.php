<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
  
    global $conn;
    // Connect to the database
    include "dbConnect_UAGMS.php";

    // Check if the email is associated with a valid account
    $query = "SELECT `clientid`, `password` FROM `client` WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) {
      // Echo the password using a JavaScript alert
      echo "<script>alert('Your password is: " . $user['password'] . "');</script>";
  
      // Redirect to the login page after 3 seconds
      header("Refresh: 1; url=loginclient.php");
    } else {
      // Show an error message if the email is not associated with a valid account
      echo "<script>alert('Invalid email address/client ID');</script>";
    }
  }
  
?>


<head>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #eee;
  padding: 20px;
}

form {
  max-width: 400px;
  margin: 50px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 8px;
  font-size: 18px;
  color: #444;
}

input[type="email"] {
  width: 100%;
  padding: 12px 20px;
  margin-bottom: 20px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

input[type="submit"] {
  width: 100%;
  background-color: #4caf50;
  color: #fff;
  padding: 14px 20px;
  margin-bottom: 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-family: Georgia, serif;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

a {
  color: #4caf50;
  text-decoration: none;
}


  </style>
</head>
<form method="post">
<label for="email">Your client ID:</label><br>
  <input type="text" name="clientid" required><br><br>
  <label for="email">Email:</label><br>
  <input type="email" name="email" required><br>
  <input type="submit" value="Retrieve Password">
</form>

