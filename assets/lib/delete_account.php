<?php
require '../includes/dbconnection_data.php';

session_start();

$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($link->connect_error){
	die("Connection to DB failed: " . $link->connect_error);
}
//else echo "Connected to DB succesfully<br/>";
$accountMail = $_SESSION['email'];
$query = "DELETE FROM accounts WHERE email=?;";
$query = $link->prepare($query);
$query -> bind_param("s", $accountMail);
$query -> execute();

session_destroy();
header('Location: ../../index.php');
?>