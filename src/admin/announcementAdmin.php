<?php
    // Connect to the database
    include "dbConnectionCustomer_uagms.php";
    global $conn;

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the button to add an announcement was clicked
    if (isset($_POST['add_announcement'])) {
        // Get the announcement text and expiration time from the form
        $announcement_text = $_POST['announcement_text'];
        $expiration_time = $_POST['expiration_time'];

        // Insert the announcement into the table
        $sql = "INSERT INTO announcement (announcement, expiration_time) VALUES ('$announcement_text', '$expiration_time')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript"> window.onload = function () { alert("Announcement updated successfully!"); } </script>'; 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Check if there are any announcements that have expired
    $sql = "SELECT expiration_time FROM announcement WHERE expiration_time < NOW() ORDER BY expiration_time ASC LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $expiration_time = $result->fetch_assoc();
        $time_to_refresh = strtotime($expiration_time['expiration_time']) - time();
        echo '<script type="text/javascript"> window.onload = function() { setTimeout(function(){location.reload();},'.$time_to_refresh.'000); } </script>';
        $sql = "DELETE FROM announcement WHERE expiration_time < NOW()";
        $result = $conn->query($sql);
    }



    if (isset($_POST['delete_announcement'])) {
        // Delete all the announcements
        $sql = "DELETE FROM announcement";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript"> window.onload = function () { alert("All Announcement deleted/has been deleted!"); } </script>'; 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>






<!DOCTYPE html>
<html>
  <head>
    <title>Announcements</title>
    <style>
 form {
    background-color: #f2f2f2;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    width: 50%;
    margin: 0 auto;
}
  
label {
    font-weight: bold;
    margin-bottom: 1rem;
}
  input[type="text"], input[type="datetime-local"] {
    padding: 0.5rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  input[type="submit"] {
    background-color: green;
    color: #fff;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
  }
  #return_home_btn {
  background-color: #0077ff;
  color: #fff;
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 5px;
  font-size: 1rem;
  display: block;
  margin: auto;
  text-decoration: none;
}
h1 {
    text-align: center;
}


</style>

  </head>

  <body>
    <h1>Announcements</h1>
    <form method="post">
        <label for="announcement_text">Announcement Text:</label>
        <br>
        <input type="text" id="announcement_text" name="announcement_text" >
        <br>
        <br>
        <label for="announcementText">Announcement: <?php 
            $sql = "SELECT * FROM announcement";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo  $row["announcement"];
                }
            } else {
                echo "No announcements for now.";
            }
        ?></label>
        <br>
        <br>
        <label for="expiration_time">Expiration Time:</label>
        <input type="datetime-local" id="expiration_time" name="expiration_time" >
        <br>
        <br>
        <input type="submit" name="add_announcement" value="Add Announcement">
        <br>
        <br>
        <input type="submit" name="delete_announcement" value="Delete All Announcements" style="background-color: red; color: #fff; padding: 0.75rem 1.5rem; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer;">
        <br>
        <br>
    </form><br>
    <br>
    <div style="display: flex; justify-content: center; width: 100%;">
  <a href="http://www.yourhomepage.com" style="text-decoration:none">
    <button id="return_home_btn">Return Home</button>
  </a>
</div>
</body>

</html>