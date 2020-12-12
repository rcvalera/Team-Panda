<?php

	$servername = "localhost";
	$db_username = "root";
	$db_password = "";

	try {
	  $conn = new PDO("mysql:host=$servername;dbname=resident_db", $db_username, $db_password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  return 'Record Successfuly in the Database';
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
?>