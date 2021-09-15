<!DOCTYPE html>
<html lang="en">
<head>
	<title>WeatherWiz - Home </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	<link rel="icon" href="assets/img/favicon.png" type="image/png">
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
		<div class="slideshow-container">
	<div class="mySlides fade">
		<img src="assets/img/img2.jpg" style="width:100%; height:500px;" alt="Image 2">
	</div>

	<div class="mySlides fade">
		<img src="assets/img/img1.jpg" style="width:100%; height:500px;" alt="Image 1">
	</div>

	<div class="mySlides fade">
		<img src="assets/img/img3.jpg" style="width:100%; height:500px;" alt="Image 3">
	</div></div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

		<div class="centered">  
			<div class="inline quater news_block">
				<h2>Today's Weather in Tallinn</h2>
				<div class="weather_img centered">
					<!--<img class="weather_img" src="assets/img/sun.png" alt="Sunny weather">-->
				</div>
				<h2 class="degrees">Current weather is...</h2>

				<table class="weather_details centered">
					<tbody>
						<tr>
							<td class="home_cell align_left">Wind</td>
							<td class="home_cell align_right"><span class="wind"></span></td>
						</tr>
						<tr>
							<td class="home_cell align_left">Chance of precipitation</td>
							<td class="home_cell align_right"><span class="precipitation"></span></td>
						</tr>
						<tr>
							<td class="home_cell align_left">Humidity</td>
							<td class="home_cell align_right"><span class="humidity"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="inline quater news_block">
				<h1>Welcome to WeatherWiz</h1>
				<p> WeatherWiz is a rapidly rising, innovative weather forecast platform, attempting to bring you fast and reliable updates on your local weather. Our team strives to make sure you are the first to know about any dangerous natural phenomena as well as the most breathtaking nature events.
				</p>
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<hr>
				<h2>The Team</h2>
				<p> Want to know who's behind the operations? Or considering a career in weather forecast, ecology or news casting? Get in contact with <a href="about.html">our team!</a></p>
			</div>
			


			<div class="inline quater news_block">
				
				<?php if(isset($_SESSION['email'])) echo 'Welcome, ', $_SESSION['email'], "<br>"; ?>
				
				<h2>Latest News</h2>
				
				<?php showLatestNews(); ?>
							
			</div>
		</div>

<br>
	</div>
	
	<div id="footer"> &#169; WeatherWiz Group 4k Copyright NotReally ICD0007 &#169; </div>
	<!--//end #footer//-->
	<script src="assets/js/indexWeather.js"></script>
	<script src="assets/js/slideshow.js"></script>
</body>
</html>
