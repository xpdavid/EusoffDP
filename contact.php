<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	 <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="static/css/pure/pure.css" />
  <!--[if lte IE 8]>
   	<link rel="stylesheet" href="static/css/pure/grids-responsive-old-ie-min.css">
  <![endif]-->
  <!--[if gt IE 8]><!-->
  <link rel="stylesheet" href="static/css/pure/grids-responsive-min.css">
  <!--<![endif]-->
  <link rel="stylesheet" href="static/css/layouts/marketing.css" />
	<style type="text/css">
		#info {
			background-color: rgba(0, 0, 0, 0);
			margin-right: 20px;
			font-family: Verdana;
			font-size: 15px;
			text-align: left;
			padding: 15px;
			border-radius: 5px;
			color: #444e53;
		}
	</style>
</head>
<body>
  <div class="container_p" style="margin-left: 30%">
    <a href="index.php"><img src="img/title.png" width="700" height="200"></a>
  </div>
  	<div class="container_p" style="backgroud: rga(0,0,0,0.5)">
		<div class="pure-g">
			<div class="pure-u-1-2"></div>
			<div class="pure-u-1-2">		
			<div id="info">
				<p style="font-size: 40px;"> Contact Us</p>
				<p style="font-size: 25px;">
				<i style="font-family: 'Courier New';">ADDRESS</i>
				<br>10 Kent Ridge Drive,
				<br>National University of Singapore,
				<br>Singapore 119242<br><br>
				<i style="font-family: 'Courier New';">EMAIL</i>
				<br>ehdp@eusoff.nus.edu.sg</p>
			</div>
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