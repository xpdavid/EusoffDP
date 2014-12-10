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
<div class="content ticket-management">
	<h2 class="content-head is-center" style="margin-top: 5%; margin-bottom: 0%">Ticket Management</h2>

	<div id="tab1" class="mtab_content" style="margin-bottom: 5%;">
		<br />
		<table class="pure-table">
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
				if ($i % 2 === 0) {
					$table_body .= 
					"<tr class='pure-table-odd' style='font-size: 12px'>
						<td>$email</td>
						<td>$seat</td>
						<td>$status</td>
						<td>$booking_time</td>
						<td>
						    <a class='pure-button' id=con$id href=''>Confirm</a>
							<a class='pure-button button-error' id=can$id href=''>Cancel</a>
						</td>
					</tr>";
				} else {
					$table_body .= 
					"<tr style='font-size: 12px'>
						<td>$email</td>
						<td>$seat</td>
						<td>$status</td>
						<td>1</td>
						<td>
						    <a class='pure-button' id=con$id href=''>Confirm</a>
							<a class='pure-button button-error' id=can$id href=''>Cancel</a>
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