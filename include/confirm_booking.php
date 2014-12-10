<?php
	require_once("db.php");

	$result = confirm_booking($_REQUEST['id']);
	echo $result;
?>