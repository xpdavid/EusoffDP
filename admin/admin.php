<?php
	session_start();
	if (!$_SESSION["login"]) {
		header("location: index.php"); 
	}
    require_once("../include/constant.php");
    require_once("include/db.php");
    $pending_total = 0;
    $success_total = 0;

    $stmt = $db_conn->prepare("SELECT COUNT(*) FROM " . BOOKING_TABLE . " WHERE status = " . BOOKING_STATUS_PENDING );
    $stmt->execute();
    $stmt->bind_result($pending_booking);
    while($stmt->fetch()) {}

    $stmt = $db_conn->prepare("SELECT COUNT(*) FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_BOOKED);
    $stmt->execute();
    $stmt->bind_result($booked_seat);
    while($stmt->fetch()) {}

    $stmt = $db_conn->prepare("SELECT COUNT(*) FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_AVAILABLE);
    $stmt->execute();
    $stmt->bind_result($remaing_seat);
    while($stmt->fetch()) {}

    $stmt = $db_conn->prepare("SELECT SUM(total_price) FROM " . BOOKING_TABLE . " WHERE status = " . BOOKING_STATUS_PENDING);
    $stmt->execute();
    $stmt->bind_result($pending_total);
    while($stmt->fetch()) {}

    $stmt = $db_conn->prepare("SELECT SUM(total_price) FROM " . BOOKING_TABLE . " WHERE status = " . BOOKING_STATUS_SUCCEED);
    $stmt->execute();
    $stmt->bind_result($success_total);
    while($stmt->fetch()) {}
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



<div class="container">
    <h2 style="text-align: left;">Booking Summary</h2>
    <div class="pure-g booking_summary">
        <div class="pure-u-1-3">
            Pending Booking: <?php echo $pending_booking;?>
        </div>
        <div class="pure-u-1-3">
            Booked seats: <?php echo $booked_seat;?>
        </div>
        <div class="pure-u-1-3">
            Reaming seats: <?php echo $remaing_seat;?>
        </div>
    </div>
    <div class="pure-g booking_summary">
        <div class="pure-u-1-3">
            Pending Booking total price: $S<?php echo $pending_total;?>
        </div>
        <div class="pure-u-1-3">
            Success Booking total price S$<?php echo $success_total;?>
        </div>
        <div class="pure-u-1-3">
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
    </tbody>
</table>
</div>


<div id = "for_user_info" style="display: none;">
    <table class="pure-table" width="100%">
        <thead>
            <td colspan="2" ><strong>Basic information</strong></td>
        </thead>
        <tbody>
            <tr class="pure-table-odd">
                <td>Name</td>
                <td><span id="name"></span></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><span id="email"></span></td>
            </tr>
            <tr class="pure-table-odd">
                <td>Matriculate Number</td>
                <td><span id="m_num"></span></td>
            </tr>
            <tr>
                <td>Collect method</td>
                <td><span id="collect_method"></span></td>
            </tr>
            <tr class="pure-table-odd">
                <td>Address Line 1</td>
                <td><span id="address_line_1">/</span></td>
            </tr>
            <tr>
                <td>Address Line 2</td>
                <td><span id="address_line_2">/</span></td>
            </tr>
            <tr class="pure-table-odd">
                <td>ZIP</td>
                <td><span id="zip">/</span></td>
            </tr>
            <tr>
                <td>Phone number</td>
                <td><span id="phone_num">/</span></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table class="pure-table" width="100%">
        <thead>
        <td colspan="2" ><strong>Flower</strong></td>
        </thead>
        <tbody>
        <tr class="pure-table-odd">
            <td>Sunflowers</td>
            <td>$5(single) : <span class="quantity" id="sunflowers"></span></td>
        </tr>

        <tr>
            <td>Roses</td>
            <td>$3.50(single) : <span class="quantity" id="roses_1"></span>, $15 (bouquet of 3) : <span class="quantity" id="roses_2"></span></td>
        </tr>

        <tr class="pure-table-odd">
            <td>Gerberas</td>
            <td>$2.50(single) : <span class="quantity" id="gerberas_1"></span>, $10 (bouquet of 3) : <span class="quantity" id="gerberas_2"></span></td>
        </tr>

        <tr>
            <td>Plushtoys</td>
            <td>Type1: $5(40 cm) : <span class="quantity" id="plushtoys_1_1"></span>, &nbsp;$12 (90cm) : <span class="quantity" id="plushtoys_1_2"></span><br>
                Type2: $5(42 cm) : <span class="quantity" id="plushtoys_2_1"></span>, &nbsp;$15 (90cm) : <span class="quantity" id="plushtoys_2_2"></span>
            </td>
        </tr>

        </tbody>
    </table>
</div>

</body>