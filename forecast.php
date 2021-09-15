<!DOCTYPE html>
<html lang="en">
<head>
	<title>WeatherWiz - Forecast</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="./assets/css/forecast.css" />
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
		<div class="centered">
			<div class="forecastGrid">
				<div id="currentWeather">
					<div id="currentWeatherImage"></div>
					<div id="currentWeatherTemp"></div>
					<div id="currentWeatherOther"></div>
				</div>

				<div id="sunMove">
					<div id="sunrisePic">
						<img src="assets/img/icons/sunrise.svg" alt="Sunrise" style="height:100%;width:100%;">
					</div>

					<div id="sunriseTime"></div>

					<div id="sunsetPic">
						<img src="assets/img/icons/sunset.svg" alt="Sunset" style="height:100%;width:100%;">
					</div>

					<div id="sunsetTime"></div>
				</div>

				<div id="dayWeather">
					<table>
						<tr id="dayWeatherTime"></tr>
						<tr id="dayWeatherImg"></tr>
					</table>
				</div>

				<div id="weekWeather">
					<table id="weekForecast">
						<thead>
							<tr>
								<td></td>
								<td colspan="2">OpenWeatherMap API</td>
								<td colspan="2">WeatherBit API</td>
							</tr>
						</thead>
					</table>
				</div>

				<script src="assets/js/forecastWeather_API1.js"></script>
				<script src="assets/js/forecastWeather_API2.js"></script>
			</div>
		</div>
	</div>
	<div id="footer"> &#169; WeatherWiz Group 4k Copyright NotReally ICD0007 &#169; </div> 
	<!--//end #footer//-->
</body>
</html>
