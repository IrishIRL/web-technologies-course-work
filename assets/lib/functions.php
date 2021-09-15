<?php
function showNewsType1(){
	require './assets/includes/dbconnection_data.php';
                
	$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	if ($link->connect_error){
		die("Connection to DB failed: " . $link->connect_error);
	}

	$query = "SELECT content FROM news_text WHERE type=1 ORDER BY ID DESC";
	$result = $link -> query($query);

	if ($result -> num_rows > 0) {
		for ($i=0; $i<3; $i++){
			if ($row = $result -> fetch_assoc()){
				echo '<div class="news_block"><p>'.$row["content"].'</p></div><br/>';
			}
		}
	} 

	else {
		echo 'Something went wrong. Please, try reloading the page or check the page in several minutes.';
	}

	$link -> close();   
}

function showNewsType2(){
	require './assets/includes/dbconnection_data.php';
                
	$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	if ($link->connect_error){
		die("Connection to DB failed: " . $link->connect_error);
	}

	$query = "SELECT content FROM news_text WHERE type=2 ORDER BY ID DESC";
	$result = $link -> query($query);

	if ($result -> num_rows > 0) {
		for ($i=0; $i<3; $i++){
			if ($row = $result -> fetch_assoc()){
				echo '<div class="news_block"><p>'.$row["content"].'</p></div><br/>';
			}
		}
	} 

	else {
		echo 'Something went wrong. Please, try reloading the page or check the page in several minutes.';
	}

	$link -> close();   
}

function showNewsType3(){
	require './assets/includes/dbconnection_data.php';
                
	$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	if ($link->connect_error){
		die("Connection to DB failed: " . $link->connect_error);
	}

	$query = "SELECT content FROM news_text WHERE type=3 ORDER BY ID DESC";
	$result = $link -> query($query);

	if ($result -> num_rows > 0) {
		for ($i=0; $i<3; $i++){
			if ($row = $result -> fetch_assoc()){
				echo '<div class="news_block"><p>'.$row["content"].'</p></div><br/>';
			}
		}
	} 

	else {
		echo 'Something went wrong. Please, try reloading the page or check the page in several minutes.';
	}

	$link -> close();     
}

function showLatestNews(){
	require './assets/includes/dbconnection_data.php';
				
	$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
				
	if ($link->connect_error){
		die("Connection to DB failed: " . $link->connect_error);
	}
	$query = "SELECT content FROM news_text WHERE ID=(SELECT MAX(ID) FROM news_text);";
	$result = $link -> query($query);
	if ($row = $result -> fetch_assoc()){
		echo '<div class="news_block"><p>'.$row["content"].'</p></div><br/>';
	}
			
	else {
		echo 'Something went wrong. Please, try reloading the page or check the page in several minutes.';
	}
	$link -> close();

}

function menuLinks(){
	session_start();
	
	if (!isset($_SESSION['email'])) {
		echo '<li><a href="login.php">Log in</a></li>';
	} else {
		echo '<li><a href="add_news.php">Add News</a></li>';
		echo '<li><a href="assets/lib/logout.php">Logout</a></li>';
		echo '<li><a href="assets/lib/delete_account.php" onclick="return confirm(\'Are you sure that you want to delete your account?\')">Delete Account</a></li>';
	}
}

function logInForm() {
	if (!isset($_SESSION['email'])) {
		echo '
		<!-- Login form -->
		<form class="inline" action="./assets/lib/login_handle.php" method="POST">
			<h3>Login Form:</h3><br>
			<label for="email_address_login">Your email address:*</label><br>
			<input placeholder="john_doe@gmail.com" type="text" name="email_address_login" id="email_address_login" class="input_rounded" pattern="[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9._%+-]+@[a-z0-9.-]+\.[a-z]{1,5}" required><br><br>
			<label for="password_login">Password:*</label><br>
			<input type="password" name="password_login" id="password_login" class="input_rounded" pattern="[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9._%+-]{6,35}" required><br><br>
			<input class="button button1" type="submit" value="Login">
		</form>

		<!-- Register form -->
		<form class="inline" action="./assets/lib/register_handle.php" method="POST">
			<h3>Register Form:</h3><br>
			<label for="first_name">First name:*</label><br>
			<input placeholder="John" type="text" name="first_name" id="first_name" pattern="[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9- ]{1,25}" class="input_rounded" required><br>
			<label for="middle_name">Middle name:</label><br>
			<input placeholder="Second" type="text" name="middle_name" id="middle_name" class="input_rounded" pattern="[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9]{1,25}"><br>
			<label for="last_name">Last name:*</label><br>
			<input placeholder="Doe" type="text" name="last_name" id="last_name" class="input_rounded" pattern="[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9 ]{1,25}" required><br><br>

			<label>Please select your age?:</label><br>
			<select name="age" class="select_rounded">';
			for ($i=16; $i < 121; $i++) {echo "<option>".$i,"</option>";}

				echo '</select><br><br>
			<label for="email_address_register">Your email address:*</label><br>
			<input placeholder="john_doe@gmail.com" type="text" name="email_address_register" id="email_address_register" class="input_rounded" pattern="[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9._%+-]+@[a-z0-9.-]+\.[a-z]{1,5}" required><br><br>
			<label for="password_register">Password:*</label><br>
			<input placeholder="*******" type="password" name="password_register" id="password_register" class="input_rounded" pattern="[a-zàâçéèêëîïôšûùüÿñæœA-ZÆŠ0-9._%+-]{6,35}" required><br><br>
			<a href="agree.html" target="_blank">I agree to terms of use:*</a>
			<input type="checkbox" name="terms_of_use_agree" id="checkbox" required><br><br>
			<input class="button button1" type="submit" value="Register">
		</form>
		<br>*Required';
	}
	else {
		echo 'Welcome, ', $_SESSION['email'], '<br><br>';
	}
}

function addNews(){
    session_start();

    require './assets/includes/dbconnection_data.php';

    $con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);    

    if ($stmt = $con->prepare('SELECT admin FROM accounts WHERE email = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
        $stmt->bind_param('s', $_SESSION['email']);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($admin);
            $stmt->fetch();
            if ($admin) {
                echo '<option value="1">Regular</option>
                    <option value="2">Emergency</option>
                    <option value="3">Advertising</option>';
            }
            else {
                echo '<option value="3">Advertising</option>';
            }
        }
        $stmt->close();
    }
}
?>
