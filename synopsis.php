<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	<style type="text/css">
		body {
			background-image: url('img/prison_bg.png');
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
	<div id='barb_wire'>
		<img src="img/barb_wire.gif">
	</div>
	<div id='barb_wire2'>
		<img src="img/barb_wire2.gif">
	</div>
	<div id="container">
		<div id="title">
			<a href="/<?php echo RELATIVE_PATH;?>"><img src="img/title.png" width="700" height="200"></a>
		</div>
		<div id="video">
			<iframe src="http://www.youtube.com/embed/tNLVoPN1chg">
			</iframe>
		</div>
		<div id="infobox">
			<div id="info">
				<p>
					This year, on the 30th of January, Eusoff Hall invites you to join us for a production that promises to enthrall you with a deliciously dark plot, a captivating cast and dances that will fill your hearts and excite your senses.</p>

				<p>Welcome to Death Row, where those who have committed the worse crimes against humanity sit and wait for their clocks to run out. We follow the prison counselor as he unravels the lives and secrets of four convicted murderers; a true psychopath, a distraught mother, a crooked lawyer and a filial son.</p>

				<p>As we listen to their stories, the counselor slowly realizes that perhaps, we are not so different after all. Are they more human than we thought, or do we all have a little bit of monster in us?</p>

			</div>
		</div>
	</div>
	<?php include('footer.php'); ?>
</body>
</html>