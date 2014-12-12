<?php
	require_once("include/db.php");
	$email = $_REQUEST['email'];
	$level = 0;
	$seats = [];
	$success = true;
	if ($_REQUEST['level'] == 1) {
		$level = 1;
		$seats = explode(',', $_REQUEST['seat1']);
	} else if ($_REQUEST['level'] == 2) {
		$level = 2;
		$seats = explode(',', $_REQUEST['seat2']);
	}
	// echo($level);
	// print_r($_REQUEST);

	foreach ($seats as $value) {
		if (($value != '') && ($value != NULL)) {
			store_booking($email, $level, $value);
		}
	}

	if ($success){
		echo <<<REDIRECT
<!doctype html>
<html>
<head>
	<style type="text/css">
	#msgbox {
		position: absolute;
		margin-left: auto;
		margin-right: auto;
		left: 0;
		right: 0;
		top:25%;
		height: 150px;
		width: 400px;
		border: 10px solid grey;
		border-radius: 2%;
	}

	#msg {
		margin-top:13%;
		color:grey;
		text-align:center;
		font-size:25px;
		font-family: "Times New Roman";
	}
	</style>
</head>

<body>
	<div id='msgbox'>
		<p id='msg'>Booking success!
		<br>Redirecting to homepage...</p>
	</div>
	<script type='text/javascript'>
		setTimeout(function() {window.location.href='index.html'},3000);
	</script>
</body>


</html>
REDIRECT;
	} else {

	}

?>