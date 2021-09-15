<!DOCTYPE html>
<html lang="en">
<head>
    <title>WeatherWiz - News</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
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
        <div>
            <div class="news_block">
                <form action="assets/lib/add_news_handle.php" method="POST">
                    <textarea name="content" rows="10" cols="80"></textarea><br/>
                    <select name="type">
                        <?php addNews(); ?>
                    <select><br/><br/>
                    <input type="submit" value="Post">
                </form>
            </div>
        </div>
    </div>
    <div id="footer"> &#169; WeatherWiz Group 4k Copyright NotReally ICD0007 &#169; </div> 
    <!--//end #footer//-->
</body>
</html>
