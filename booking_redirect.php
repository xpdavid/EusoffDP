<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	<style type="text/css">
	body {
		overflow:hidden;
		background-image: url('img/prison_bg.png');
	}
	#msgbox {
		position: absolute;
		margin-left: auto;
		margin-right: auto;
		left: 0;
		right: 0;
		top:33%;
		height: 150px;
		width: 700px;
		background-color: rgba(0, 0, 0, 0.7);
		border: 5px solid white;
		border-radius: 5px;
	}

	#msg {
		text-align: center;
		color: white;
		margin-top: 25px;
		font-size:18px;
		font-family: "Athelas";
	}
	</style>
</head>

<body>
	<div id='msgbox'>
		<p id='msg'>Booking success!
		<br>Please contact Kenneth Quek <h style="color:yellow">97838052</h> to get your ticket
		<br>Redirecting to homepage...
		<br>You can also click <a style="color: grey" href="index.php">here</a></p>
	</div>
	<script type='text/javascript'>
		setTimeout(function() {window.location.href='index.php'},8000);
	</script>
</body>


</html>