<?php
	require_once("db.php");

	$result = cancel_booking($_REQUEST['id']);
	echo $result;
?>