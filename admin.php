<?php
	require_once("include/db.php");
	$table_header = <<<ADMIN_HEADER
<html lang="en">
<head>
  <script src="static/js/jquery-2.1.1.min.js"></script>
  <script src="static/js/jquery.seat-charts.js"></script>  
  <meta charset="utf-8">
  <title>Seating</title>
  <link rel="stylesheet" href="static/css/pure/pure.css" />
  <link rel="stylesheet" href="static/css/layouts/marketing.css" />
  <link rel="stylesheet" href="static/css/jquery/jquery-ui.css" />
  <link rel="stylesheet" href="static/css/jquery.seat-charts.css" />
</head>
<body>
<script>
	$(document).ready(function(){
		$('#woshiadmin').click(function(e) {
			if ($('#admin-password').val() == "DP1415admin") {
				$('.authentication').hide();
				$('.ticket-management').show();
			} else {
				var left = $('#admin-password').width()/2+10;
				$('#admin-password').stop()
                    .animate({ left: left-20+"px" }, 30).animate({ left: left+10+"px" }, 30)
                    .animate({ left: left-20+"px" }, 30).animate({ left: left+10+"px" }, 30)
                    .animate({ left: left+"px" }, 30);
			}
			e.preventDefault();
		});

  		$('.confirm-button').click(function(e) {
  			if (confirm("Are you sure you want confirm the booking?")) {
  				var id = $(this).attr('id');
	  			$('#con' + id).addClass('button-disabled');
	  			$('#status' + id).text("Confirmed");
	  			$('#status' + id).attr("style", "color : green");
	  			e.preventDefault();
	  			$.post('include/confirm_booking.php', {'id' : id}, function(data) {});
  			} else {
  				return false;
  			}
  		});

		$('.cancel-button').click(function(e) {
  			if (confirm("Are you sure you want cancel the booking?")) {
  				var id = $(this).attr('id');
	  			$('#con' + id).addClass('button-disabled');
	  			$('#can' + id).addClass('button-disabled');
	  			$('#status' + id).text("Cancelled");
	  			$('#status' + id).attr("style", "color : red");
	  			e.preventDefault();
	  			$.post('include/cancel_booking.php', {'id' : id}, function(data) {});
  			} else {
  				return false;
  			}
  		});

  		
  	});
</script>
<div class="authentication">
	<form class="pure-form pure-form-single" style="margin-top: 15%;">
		<input style="width:50%; position:absolute; left:25%" id="admin-password" name="password" type="password" placeholder="Admin password" required="required" />
		<br /><br />
		<button type="submit" id="woshiadmin" class="pure-button pure-button-primary" style="margin-bottom: 10%">I'm Admin!</button>
	</form>
</div>
<div class="content ticket-management" style="display:none">
	<h2 class="content-head is-center" style="margin-top: 5%; margin-bottom: 0%">Ticket Management</h2>

	<div id="tab1" class="mtab_content" style="margin-bottom: 5%; text-align: center">
		<br />
		<table class="pure-table" style='margin:0px auto;'>
			<thead>
				<tr style="text-align:center; font-size: 13px">
					<th>Email</th>
					<th>Seat</th>
					<th>Status</th>
					<th>Booking Time</th>
					<th>Operation</th>
				</tr>
			</thead>

			<tbody>
ADMIN_HEADER;
			
			$all_booking = get_all_booking_info();
			$table_body = "";

			for ($i = 0; $i < count($all_booking); $i ++) {
				$email = $all_booking[$i]['email'];
				$seat = $all_booking[$i]['seat'];
				$status = $all_booking[$i]['status'];
				$id = $all_booking[$i]['id'];
				$booking_time = $all_booking[$i]['booking_time'];
				$cancel_class = "";
				$confirm_class = "";
				$status_content = "";
				if ($status == BOOKING_STATUS_PENDING) {
					$status_content = "<span id=status$id style='color:blue'>Pending</span>";
				} else if ($status == BOOKING_STATUS_SUCCEED) {
					$status_content = "<span id=status$id style='color:green'>Confirmed</span>";
					$confirm_class = "button-disabled";
				} else if ($status == BOOKING_STATUS_CANCELLED) {
					$status_content = "<span id=status$id style='color:red'>Cancelled</span>";
					$confirm_class = "button-disabled";
					$cancel_class = "button-disabled";
				}
				if ($i % 2 === 0) {
					$table_body .= 
					"<tr class='pure-table-odd' style='font-size: 12px'>
						<td>$email</td>
						<td>$seat</td>
						<td>$status_content</td>
						<td>$booking_time</td>
						<td>
							<span class='cancel-button' id=$id><a class='pure-button button-error $cancel_class' id=can$id href=''>Cancel</a></span>
							<span class='confirm-button' id=$id><a class='pure-button button-normal $confirm_class' id=con$id href=''>Confirm</a></span>
						</td>
					</tr>";
				} else {
					$table_body .= 
					"<tr style='font-size: 12px'>
						<td>$email</td>
						<td>$seat</td>
						<td>$status_content</td>
						<td>$booking_time</td>
						<td>
							<span class='cancel-button' id=$id><a class='pure-button button-error $cancel_class' id=can$id href=''>Cancel</a></span>
							<span class='confirm-button' id=$id><a class='pure-button button-normal $confirm_class' id=con$id href=''>Confirm</a></span>
						</td>
					</tr>";
				}
			}

			$table_footer = <<<ADMIN_FOOTER
			</tbody>
		</table>
	</div>
</div>
</body>
</html>
ADMIN_FOOTER;

	echo $table_header . $table_body . $table_footer;
?>