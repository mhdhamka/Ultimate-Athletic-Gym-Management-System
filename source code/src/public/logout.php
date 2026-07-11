<?php
session_start();

include("../config/db_cUAGMS.php");

global $conn;


// Check if admin is logged in
if(isset($_SESSION['adminID']))
{
    $adminID = $_SESSION['adminID'];

    $sql = "UPDATE admin 
            SET logStatus = 0 
            WHERE adminID='$adminID'";

    mysqli_query($conn, $sql);

    session_unset();
    session_destroy();

    header("Location: ../public/loginAdmin.php");
    exit();
}


// Check if client is logged in
if(isset($_SESSION['clientID']))
{
    $clientID = $_SESSION['clientID'];

    $sql = "UPDATE client 
            SET logStatus = 0 
            WHERE clientID='$clientID'";

    mysqli_query($conn, $sql);

    session_unset();
    session_destroy();

    header("Location: ../public/loginClient.php");
    exit();
}


// If no session exists
header("Location: ../public/index.php");
exit();

?>