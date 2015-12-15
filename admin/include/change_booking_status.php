<?php
    require_once("../../include/constant.php");
    require_once("db.php");
    session_start();
    if (isset($_SESSION["login"]) || $_SESSION["login"]) {
        echo change_booking_status($_REQUEST['book_id'], $_REQUEST["status"]);
    } else {
        echo false;
    }

?>