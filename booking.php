<?php

	require_once("config.php");

	$email = $_REQUEST['email'];
	$level = 0;
	$seats = [];
	if ($_REQUEST['level'] == 1) {
		$level = 1;
		$seats = explode(',', $_REQUEST['seat1']);
	} else if ($_REQUEST['level'] == 2) {
		$level = 2;
		$seats = explode(',', $_REQUEST['seat2']);
	}
	echo($level);
	print_r($seats);

	foreach ($seats as $value) {
		if (($value != '') && ($value != NULL)) {
			store_booking($email, $level, $value);
		}
	}

	// since this application is rather simple, I keep everything inside this file
	function establish() {
		$con = mysql_connect(DB_HOST, DB_USERNAME, DB_PWD);
		if (!$con) {   
			die('Could not connect: ' . mysql_error());
		}
		return $con;
	}

	function store_booking($email, $level, $seat) {
		$con = db_connect();
		mysql_select_db(DB_NAME, $con);

		$mapped_result = seat_map($level, $seat);
		$query = "INSERT INTO " . BOOKING_TABLE . "(email, level, row, col) VALUES ($email, $level, $mapped_result['row'], $mapped_result['col'])";
		$result = mysql_query($query);
		mysql_close($con);
		
		if (empty($result)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	function seat_map($level, $seat) {
		// $seat should be row_col
		$seat = explode("_", $seat);
		$row = $seat[0];
		$col = $seat[1];

		$mrow = '';
		$mcol = '';
		
		if ($level == 1) {
			switch ($row) {
				case 1:
					$mrow = 'D';
					$mcol = $col - 1;
					break;

				case 2:
					if ($col == 1) {
						$mrow = 'LL';
						$mcol = 6;
					} else if ($col <= 8) {
						$mrow = 'E';
						$mcol = $col;
					} else if ($col <= 32) {
						$mrow = 'E';
						$mcol = $col - 3;
					} else if ($col <= 40) {
						$mrow = 'E';
						$mcol = $col - 5;
					} else if ($col == 42) {
						$mrow = 'LL';
						$mcol = 39;
					}
					break;
				
				default:
					# code...
					break;
			}
		} else if ($level == 2) {

		} else {

		}

		$result = ['row' => $mrow, 'col' => $mcol];
		return $result;
	}
?>