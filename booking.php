<?php

	require_once("db.php");

	$email = $_REQUEST['email'];
	$level = 0;
	$seats = [];
	if ($_REQUEST['level'] == 1) {
		$level = 1;
		$seats = explode(',', $_REQUEST['seat1']);
	} else if ($_REQUEST['level'] == 2) {
		$level = 2;
		$seats = explode(',', $_REQUEST['seat2']);
	}
	echo($level);
	print_r($seats);

	foreach ($seats as $value) {
		if (($value != '') && ($value != NULL)) {
			store_booking($email, $level, $value);
		}
	}

	// success, redirect back
	// header('Location: index.html');

?>