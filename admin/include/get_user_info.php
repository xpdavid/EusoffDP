<?php
	require_once("../../include/constant.php");
	require_once("db.php");
	session_start();
	if (isset($_SESSION["login"]) || $_SESSION["login"]) {
		echo get_user_info($_REQUEST['user_id']);
	} else {
		echo "";
	}
?>