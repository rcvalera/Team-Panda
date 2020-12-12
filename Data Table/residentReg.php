<?php
	
	$lastName = $_POST['lname'];
	$firstName = $_POST['fname'];
	$middleName = $_POST['midname'];
	$alias = $_POST['alias'];
	$marks = $_POST['faceMarks'];
	$birthDate = $_POST['birthday'];
	$birthPlace = $_POST['birthplace'];
	$civilStatus = $_POST['status'];
	$gender = $_POST['gender'];
	$nationality = $_POST['nationality'];
	$religion = $_POST['religion'];
	$occupation = $_POST['occupation'];
	$voter = $_POST['voter'];
	$urban = $_POST['address'];
	$rural = $_POST['Paddress'];
	$number = $_POST['phone'];
	$number_two = $_POST['phone1'];
	$email = $_POST['email'];
	$email_two = $_POST['email1'];
	$type = $_POST['Rtype'];
	$status = $_POST['Rstatus'];

	if ($email == $email_two) {
		insertRecord($lastName, $firstName, $middleName, $alias, $marks, $birthDate, $birthPlace, $civilStatus, $gender, $nationality, $religion, $occupation, $voter, $urban, $rural, $number, $number_two, $email, $type, $status);
	}else{
		echo '<script> 
				alert("Email Mismatch!");
			</script>';

		echo '<script>
				window.history.go(-1);
			</script>';
	}

	function insertRecord($lastName, $firstName, $middleName, $alias, $marks, $birthDate, $birthPlace, $civilStatus, $gender, $nationality, $religion, $occupation, $voter, $urban, $rural, $number, $number_two, $email,  $type, $status) {
		 try {
		 require 'residentDatabase.php';
		     
		  $sql = "INSERT INTO resident_table (firstName, lastName, midName, alias, faceMarks, birthday, placeBirth, status, gender, nationality, 	religion, occupation, voterstatus, urbanaddress, ruraladdress, homenumber, phonenumber, email, residenttype, residentstatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		   $conn->prepare($sql)->execute([$lastName, $firstName, $middleName, $alias, $marks, $birthDate, $birthPlace, $civilStatus, $gender, $nationality, $religion, $occupation, $voter, $urban, $rural, $number, $number_two, $email,  $type, $status]);


			  echo 'Record Successfuly in the Database';

			} catch(PDOException $e) {
			  echo $sql . "<br>" . $e->getMessage();
			}
			$conn = null;
			}


	// Get Data from the server to data table
     
?>