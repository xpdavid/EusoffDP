<?php
	session_start();
	if (!$_SESSION["login"]) {
		header("location: index.php"); 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../static/css/pure/pure.css" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="../static/css/pure/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="../static/css/pure/grids-responsive-min.css">
    <!--<![endif]-->


    <link rel="stylesheet" href="../static/css/jquery/jquery-ui.css" />
    <link rel="stylesheet" href="static/css/admin.css" />

    <script src="../static/js/jquery-2.1.1.min.js"></script>
    <script src="../static/js/jquery-ui.min.js"></script>

    <script src="static/js/admin.js"></script>

    <!--sweetalert http://t4t5.github.io/sweetalert/-->
    <script src="static/sweetalert/dist/sweetalert.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="static/sweetalert/dist/sweetalert.css">
</head>

<body>
<script type="text/javascript">
    $(document).ready(function() {
        get_pending_booking();
    });
</script>


<div class="container">
    <a href="../index.php"><img src="../img/title.png" width="700" height="200"></a>
</div>



<div class="container booking_summary">
    <h2 style="text-align: left;">Booking Summary</h2>
    <div class="pure-g">
        <div class="pure-u-1-3">
            Pending Booking: <span>0</span>
        </div>
        <div class="pure-u-1-3">
            Booked seats: <span>0</span>
        </div>
        <div class="pure-u-1-3">
            Reaming seats: <span>0</span>
        </div>
    </div>

</div>

<div class="container">
    <h2 style="text-align: left;">Confirm Table (<span id="current_table"></span>)</h2>
    <div class="pure-g">
        <div class="pure-u-1-3">
            <button class="pure-button pure-button-primary" onclick="get_pending_booking()">Get all Pending booking</button>
        </div>
        <div class="pure-u-1-3">
            <button class="pure-button button-success" onclick="get_success_booking()">Get all success booking</button>
        </div>
        <div class="pure-u-1-3">
            <button class="pure-button button-warning" onclick="get_all_booking()">Get all booking</button>
        </div>
    </div>
</div>
<br>

<div class="container booking_confirm">
<table class="pure-table pure-table-bordered" width="100%" id = "confirm_table">
    <thead>
        <tr bgcolor="black" style="color:white">
            <th>Booking Reference</th>
            <th>Booked Seats</th>
            <th>Status</th>
            <th>More info</th>
            <th>Operation</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>1</td>
            <td>Honda</td>
            <td>Accord</td>
            <td><button class="pure-button button-secondary">Click Me</button></td>
            <td>
                <button class="pure-button button-success">Confirm Booking</button>
                <button class="pure-button button-error">Cancel Booking</button>
            </td>
        </tr>

    </tbody>
</table>
</div>


</body>