<?php
	require_once("../../include/constant.php");
	require_once("db.php");
	session_start();
	if (isset($_SESSION["login"]) || $_SESSION["login"]) {
		if ($_REQUEST["action"] == "confirm_collect")
		{
			echo confirm_collection($_REQUEST['user_id']);
		}
		if ($_REQUEST["action"] == "update_mail_info") {
			echo update_mail_info($_REQUEST['user_id'], $_REQUEST['content']);
		}
	} else {
		echo "";
	}
?>