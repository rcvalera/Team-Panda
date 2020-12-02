<?php

		$firstName = $_POST['fname'];
		$lastName = $_POST['lname'];
		$middleName = $_POST['midname'];
		$officePosition = $_POST['position'];
		$adminUsername = $_POST['username'];
		$adminPassword = $_POST['password'];
		$adminConfirmPassword = $_POST['confirm_password'];

		if ($adminPassword == $adminConfirmPassword) {
		insertRecord($firstName,$lastName,$middleName,$officePosition,$adminUsername,$adminPassword);      
		}else{
			echo '<script>
	  				alert("Passwrod Mismatch!");
						</script>';

			echo '<script>
					window.history.go(-1);
						</script>';
			}

		function insertRecord($firstname,$lastname,$middleName,$officePosition,$adminUsername,$adminPassword) {
		 try {
		 require 'adminDatabase.php';
		     
		  $sql = "INSERT INTO admins (firstName, lastName, midName, position, username, password ) VALUES (?,?,?,?,?,?)";
     
     
  // use exec() because no results are returned 
     $conn->prepare($sql)->execute([$firstname,$lastname,$middleName,$officePosition,$adminUsername,$adminPassword]);


  echo '<script>
  			alert("Congratulations, you are now registered!");
		</script>';
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
}

?>