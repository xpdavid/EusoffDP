<?php
	require_once("../../include/constant.php");
	require_once("db.php");
	session_start();
	if (isset($_SESSION["login"]) || $_SESSION["user_id"]) {
		echo confirm_collection($_REQUEST['user_id']);
	} else {
		echo "";
	}
?>