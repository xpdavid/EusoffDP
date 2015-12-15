<?php
	require_once("db.php");

	$seat = get_all_booked_seats($_REQUEST['level']);
	echo json_encode($seat);
?>