<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	<style type="text/css">
		body {
			background-image: url('img/background.jpg');
			overflow-y: auto;
			overflow-x: hidden;
		}
		#barb_wire img {
			position: absolute;
			top: -7%;
			right: 0;
			height: 200px;
			width: 400px;
		}
		#barb_wire2 img {
			position: absolute;
			top: 0;
			left: -12%;
			height: 200px;
			width: 600px;
		}
		#container {
			background-color: rgba(0, 0, 0, 0.7);
			width: 60%;
			margin: 40px auto;
		}
		#video iframe {
			width: 630px;
			height: 473px;
			display: block;
			margin: 0 auto;
		}
		#title {
			margin-top: 4%;
			margin-left: 19%;
		}
		#infobox {
			background-color: rgba(255, 255, 255, 0.2);
			border: 10px;
			border-radius: 5px;
			overflow: hidden;
			margin-top: 40px;
		}
		#info {
			margin-left: 20px;
			margin-right: 20px;
			color: white;
			font-family: "helvetica";
			font-size: 18px;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="title">
			<a href="index.php"><img src="img/title.png" width="700" height="200"></a>
		</div>
		<div id="video">
			<iframe src="http://www.youtube.com/embed/tNLVoPN1chg">
			</iframe>
		</div>
		<div id="infobox">
			<div id="info">
				<p>This is a story. Like most other stories, this is a story about people. What happens when you take a pair of orphaned siblings and give one of them the ability to bring life to a complete standstill? Aaron and Brenda have never known their parents and like any other orphans, they have none to rely on but each other. However, when Aaron’s greed gets the better of him, he takes away his sister’s chance at a scholarship, disappearing from her life for seven years. Guilt-stricken, his return to Singapore is marked by his meteoric rise through the ranks in the corporate world and his clumsy steps towards redemption. What happens when he eventually confesses his remorse? People are rarely ever completely good or bad. Join us as we celebrate kinship, love and self-abnegation.</p>

				<p>Chan Huan Jun, Scriptwriter</p>

			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>