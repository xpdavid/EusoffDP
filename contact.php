<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	<style type="text/css">
		body {
			background-image: url('img/background.jpg');
			overflow: hidden;
		}
		#body {
			margin-left: auto;
			margin-right: auto;
			left: 0;
			right: 0;
			height: 620px;
			background-color: rgba(0, 0, 0, 0.7);
			width: 60%;
		}
		#poster {
			position: absolute;
			left: 20%;
			top: 35%;
		}
		#title {
			margin-top: 4%;
			margin-left: 19%;
		}
		#infobox {
			position: absolute;
			background-color: rgba(255, 255, 255, 0.15);
			border: 10px;
			border-radius: 5px;
			height: 410px;
			width: 500px;
			top: 34%;
			left: 45%;
		}
		#info {
			margin-left: 20px;
			margin-right: 20px;
			text-align: center;
			color: white;
			font-family: "helvetica";		
		}
	</style>
</head>
<body>
	<div id="body">
		<div id="title">
			<a href="index.php"><img src="img/title.png" width="700" height="200"></a>
		</div>
		<div id="poster"><img src="img/poster.png" width="280" height="400"></div>
		<div id="infobox">
			<div id="info">
				<p style="text-align: center; font-size: 30px"> Contact Us</p>
				<p style="font-size: 25px;"><br>10 Kent Ridge Drive,
				<br>National University of Singapore,
				<br>Singapore 119242<br>
				<br>ehdp@eusoff.nus.edu.sg</p>
			</div>
		</div>
	</div>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include('footer.php'); ?>
</html>