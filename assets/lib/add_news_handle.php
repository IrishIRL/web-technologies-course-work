<?php
require '../includes/dbconnection_data.php';

session_start();

$content = filter_input(INPUT_POST,
						'content',
						FILTER_SANITIZE_STRING);

$type = filter_input(INPUT_POST,
						'type',
						FILTER_SANITIZE_SPECIAL_CHARS);

$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($link->connect_error){
	die("Connection to DB failed: " . $link->connect_error);
}
//else echo "Connected to DB succesfully<br/>";
$accountMail = $_SESSION['email'];
$query = "INSERT INTO news_text (content, type) VALUES (?, ?)";
$query = $link->prepare($query);
$query -> bind_param("ss", $content, $type);
$query -> execute();

header('Location: ../../news.php');
?>