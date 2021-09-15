<?php
require '../includes/dbconnection_data.php';
session_start();

// Try and connect using the info above.
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
	if ((preg_match('/^[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9._%+-]+@[a-z0-9.-]+\.[a-z]{1,5}+$/', $_POST['email_address_login']) == 0) || !filter_var($_POST['email_address_login'], FILTER_VALIDATE_EMAIL)) {
		exit('email is not valid!');
	}
	else {
	  $email=filter_input(INPUT_POST, 'email_address_login', FILTER_SANITIZE_SPECIAL_CHARS);
	}
	
	if (preg_match('/^[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9- ]+$/', $_POST['password_login']) == 0) {
		exit('Password is not valid!');
	}
	else {
		if (strlen($_POST['password_login']) > 35 || strlen($_POST['password_login']) < 6) {
			exit('Password must be between 6 and 35 characters long!');
		}
		else {
			$password=filter_input(INPUT_POST, 'password_login', FILTER_SANITIZE_SPECIAL_CHARS);
		}
	}
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
	$stmt->bind_param('s', $email);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
		if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $check_password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($password, $check_password)) {
		// Verification success! User has logged-in!
		// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['email'] = $email;
		$_SESSION['id'] = $id;
		header('Location: ../../index.php');
	} 
	else {
		// Incorrect password
		echo 'Incorrect email and/or password!';
	}
} 
else {
	// Incorrect email
	echo 'Incorrect email and/or password!';
}

	$stmt->close();
}

?>
