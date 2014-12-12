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
		header("Location: /dp1415/booking_redirect.html");
	} else {

	}

?>