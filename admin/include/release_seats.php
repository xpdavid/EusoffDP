<?php
    require_once("../../include/constant.php");
    require_once("db.php");
    session_start();
    if (isset($_SESSION["login"]) || $_SESSION["login"]) {
        $all_seat = explode(",",$_REQUEST["seats"]);
        for($i = 0; $i < count($all_seat); $i++) {
            release_seat($all_seat[$i]);
        }
        echo true;
    } else {
        echo false;
    }
?>