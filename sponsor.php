<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	<style type="text/css">
		body {
			background-image: url('img/prison_bg.png');
			overflow: hidden;
		}
		#body {
			margin-left: auto;
			margin-right: auto;
			left: 0;
			right: 0;
			height: 600px;
			background-color: rgba(0, 0, 0, 0.7);
			width: 60%;
		}
		#sponsor {
			text-align: center;
			margin-top: 7%;
		}
		#title {
			margin-top: 2%;
			margin-left: 19%;
		}
	</style>
</head>
<body>

	<div id="body">
		<div id="title">
			<a href="/<?php echo RELATIVE_PATH;?>"><img src="img/title.png" width="700" height="200"></a>
		</div>
		<div id="sponsor"><img src="img/NIC logo.jpg" width="400px" height="300px"></div><div id='barb_wire'>
		<img src="img/barb_wire.gif" style="position:absolute;top:59%;left:-2%" height="300px" width="500px">
	</div>
	<div id='barb_wire2'>
		<img src="img/barb_wire2.gif" style="position:absolute;top:75%;left:70%" height="200px" width="500px">
	</div>
		<div id='barb_wire'>
		<img src="img/barb_wire.gif" style="position:absolute;top:59%;left:-2%" height="300px" width="500px">
	</div>
	<div id='barb_wire2'>
		<img src="img/barb_wire2.gif" style="position:absolute;top:75%;left:70%" height="200px" width="500px">
	</div>
	</div>
</body>
<?php include('footer.php'); ?>
</html>