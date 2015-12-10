<?php
	require_once("db.php");
	$result = toggle_blocked_seat($_REQUEST['seat_id']);
	echo $result;
?>