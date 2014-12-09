<?php
	require_once("db.php");

	$seat = get_all_reserved_seats($_REQUEST['level']);
	echo json_encode($seat);
?>