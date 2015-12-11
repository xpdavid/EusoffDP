<?php
	require_once("db.php");
	$seat = get_real_seat_name_by_seat_code($_REQUEST['seat_code']);
	echo $seat;
?>