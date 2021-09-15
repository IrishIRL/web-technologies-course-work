<!DOCTYPE html>
<html lang="en">
<head>
	<title>WeatherWiz - Login </title> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	<link rel="icon" href="./assets/img/favicon.png" type="image/png">
	<?php include 'assets/lib/functions.php'; ?>
</head>
<body>
	<div id="header">
	</div>
	<!--//end header//-->
	<div id="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="forecast.php">Weather forecast</a></li>
			<li><a href="about.php">About us</a></li>
			<li><a href="news.php">News</a></li>
			<?php menuLinks(); ?>
		</ul>
	</div>
	<!--//end nav//-->
	<div id="page">
		<div class="centered">
			<?php logInForm(); ?>
		</div>
	</div>
	<div id="footer"> &#169; WeatherWiz Group 4k Copyright NotReally ICD0007 &#169; </div> 
	<!--//end #footer//-->
</body>
</html>
