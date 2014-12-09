<?php
	
	require_once("config.php");
	
	// since this application is rather simple, I keep everything inside this file
	function establish() {
		$con = mysql_connect(DB_HOST, DB_USERNAME, DB_PWD);
		if (!$con) {   
			die('Could not connect: ' . mysql_error());
		}
		return $con;
	}

	function store_booking($email, $level, $seat) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		// transaction required

		$seat_id = get_seat_id_by_seat_code($seat);
		$query = "INSERT INTO " . BOOKING_TABLE . "(email, seat_id) VALUES ('$email', $seat_id)";
		// echo $query;
		$result = mysql_query($query);

		$query = "UPDATE " . SEAT_TABLE . "(status) VALUES (" . SEAT_STATUS_RESERVED .") WHERE seat_id = $seat_id";
		$result = mysql_query($query);		
		mysql_close($con);
		
	}

	function confirm_booking($book_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "UPDATE " . BOOK_TABLE . "(status) VALUES (" . BOOKING_STATUS_SUCCEED . ") WHERE book_id = $book_id";
		$result = mysql_query($query);

		$seat_id = get_seat_id_by_book_id($book_id);
		$query = "UPDATE " . SEAT_TABLE . "(status) VALUES (" . SEAT_STATUS_OCCUPIED . ") WHERE seat_id = $seat_id";
		$result = mysql_query($query);
	}

	function cancel_booking($book_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "UPDATE " . BOOK_TABLE . "(status) VALUES (" . BOOKING_STATUS_CANCELLED . ") WHERE book_id = $book_id";
		$result = mysql_query($query);

		$seat_id = get_seat_id_by_book_id($book_id);
		$query = "UPDATE " . SEAT_TABLE . "(status) VALUES (" . SEAT_STATUS_AVAILABLE . ") WHERE seat_id = $seat_id";
		$result = mysql_query($query);
	}

	function get_seat_id_by_seat_code($code) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_id FROM " . SEAT_TABLE . "WHERE seat_code = '" . $code . "'";
		$result = mysql_query($query);

		if ($result) {
			$result = mysql_fetch_array($result);
			mysql_close($con);
			return $result['seat_id'];
		} else {
			mysql_close($con);
			return FALSE;
		}
	}

	function get_seat_id_by_book_id($book_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_id FROM " . BOOK_TABLE . "WHERE book_id = '" . $book_id . "'";
		$result = mysql_query($query);

		if ($result) {
			$result = mysql_fetch_array($result);
			mysql_close($con);
			return $result['seat_id'];
		} else {
			mysql_close($con);
			return FALSE;
		}
	}

?>