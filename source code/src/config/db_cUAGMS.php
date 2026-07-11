<?php
	$hostName = "localhost";
	$username = "p1_admin";
	$password = "dummy123";
	$database = "db_uagms";

	// Create connection
	$conn = new mysqli($hostName, $username, $password, $database);

	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		echo "";
	}

?>