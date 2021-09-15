<?php
require '../includes/dbconnection_data.php';

error_reporting(E_ALL);

session_start();

// Try and connect using the info above.
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

//Sanitizing input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (preg_match('/^[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9- ]+$/', $_POST['first_name']) == 0) {
		exit('First_name is not valid!');
	}
	else {
	  $first_name=filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
	}
	
	if (!(preg_match('/^[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9-]+$/', $_POST['middle_name']) == 0) || empty($_POST["middle_name"])) {
		$middle_name=filter_input(INPUT_POST, 'middle_name', FILTER_SANITIZE_SPECIAL_CHARS);
	}
	else {
		exit('middle_name is not valid!');
	}
	
	if (preg_match('/^[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9- ]+$/', $_POST['last_name']) == 0) {
		exit('last_name is not valid!');
	}
	else {
	  $last_name=filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
	}
	
	if (!filter_var($_POST["age"], FILTER_VALIDATE_INT)) {
		exit('The age must be written in numbers only!');
	}
	else if ($_POST["age"] < 16 || $_POST["age"] > 120) {
		exit('The age must be between 16 and 120!');
	}
	else {
		$age = $_POST['age'];
	}
	
	if ((preg_match('/^[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9._%+-]+@[a-z0-9.-]+\.[a-z]{1,5}+$/', $_POST['email_address_register']) == 0) || !filter_var($_POST['email_address_register'], FILTER_VALIDATE_EMAIL)) {
		exit('email is not valid!');
	}
	else {
	  $email=filter_input(INPUT_POST, 'email_address_register', FILTER_SANITIZE_SPECIAL_CHARS);
	}
	
	if (preg_match('/^[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9- ]+$/', $_POST['password_register']) == 0) {
		exit('Password is not valid!');
	}
	else {
		if (strlen($_POST['password_register']) > 35 || strlen($_POST['password_register']) < 6) {
			exit('Password must be between 6 and 35 characters long!');
		}
		else {
			$password=filter_input(INPUT_POST, 'password_register', FILTER_SANITIZE_SPECIAL_CHARS);
		}
	}
}
// We need to check if the account with that Email exists.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Email already exists
		echo 'Email exists, please choose another!';
	} 
	
	else {
		// Email doesnt exists, insert new account
		if ($stmt = $con->prepare('INSERT INTO accounts (firstname,middlename,lastname,age,email,password) VALUES (?,?,?,?,?,?)')) {
			
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password_hashed = password_hash($password, PASSWORD_DEFAULT);
			$stmt->bind_param('sssiss', $first_name, $middle_name, $last_name, $age, $email, $password_hashed);
			$stmt->execute();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['email'] = $email;
			$_SESSION['id'] = $id;
			header('Location: ../../index.php');
		}
		else {
			// Something is wrong with the sql statement, check to make sure accounts table exists with all 6 fields.
			echo 'Could not prepare statement!';
		}
	}
	
	$stmt->close();
} 

else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 6 fields.
	echo 'Could not prepare statement!';
}
$con->close();

?>
