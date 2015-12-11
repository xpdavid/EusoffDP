<?php
	require_once("constant.php");
	
	// since this application is rather simple, I keep everything inside this file
	function establish() {
		$con = mysql_connect(DB_HOST, DB_USERNAME, DB_PWD);
		if (!$con) {   
			die('Could not connect: ' . mysql_error());
		}
		return $con;
	}

	function store_booking($level, $seat) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);
		// transaction required

		$seat_id = get_seat_id_by_seat_code($seat);
		$query1 = "INSERT INTO " . BOOKING_TABLE . "(email, seat_id, booking_time) VALUES ('email', $seat_id, NOW());";
		// echo $query1;
		$result1 = mysql_query($query1, $con);



		$query2 = "UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_RESERVED .", exp_time = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE seat_id = $seat_id;";
		$result2 = mysql_query($query2, $con);


		// mysql_close($con);
		
	}

	function confirm_booking($book_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "UPDATE " . BOOKING_TABLE . " SET status = " . BOOKING_STATUS_SUCCEED . " WHERE book_id = $book_id";
		$result = mysql_query($query);

		$seat_id = get_seat_id_by_book_id($book_id);
		$query = "UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_OCCUPIED . " WHERE seat_id = $seat_id";
		$result = mysql_query($query);

		return true;

		// mysql_close($con);
	}


	function cancel_booking($book_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "UPDATE " . BOOKING_TABLE . " SET status = " . BOOKING_STATUS_CANCELLED . " WHERE book_id = $book_id";
		$result = mysql_query($query);

		$seat_id = get_seat_id_by_book_id($book_id);
		$query = "UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_AVAILABLE . " WHERE seat_id = $seat_id";
		$result = mysql_query($query);

		// mysql_close($con);
	}

	function toggle_blocked_seat($seat_code, $action) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		if ($action == "block") {
			$query = "UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_BLOCKED . " , exp_time = NOW() + INTERVAL 10 MINUTE WHERE seat_code = '" . $seat_code . "'";
			$result = mysql_query($query);
		}

		if ($action == "unblock") {
			$query = "UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_AVAILABLE . " WHERE seat_code = '" . $seat_code . "'";
			$result = mysql_query($query);
		}

		return $seat_code;	
	}

	function get_seat_id_by_seat_code($code) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_id FROM " . SEAT_TABLE . " WHERE seat_code = '" . $code . "'";
		$result = mysql_query($query);

		if ($result) {
			$result = mysql_fetch_array($result);
			// mysql_close($con);
			return $result['seat_id'];
		} else {
			// mysql_close($con);
			return FALSE;
		}
	}

	function get_real_seat_name_by_seat_code($seat_code) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT level, row, col FROM " . SEAT_TABLE . " WHERE seat_code = '" . $seat_code . "'";
		$result = mysql_query($query);
		if ($result) {
			$result = mysql_fetch_array($result);
			return $result['level'] . " " . $result['row'] . " " . (string)$result['col'];
		} else {
			return FALSE;
		}
		
	}

	function get_seat_id_by_book_id($book_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_id FROM " . BOOKING_TABLE . " WHERE book_id = '" . $book_id . "'";
		$result = mysql_query($query);

		if ($result) {
			$result = mysql_fetch_array($result);
			// mysql_close($con);
			return $result['seat_id'];
		} else {
			// mysql_close($con);
			return FALSE;
		}
	}

	function get_all_occupied_seats($level) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_OCCUPIED . " AND level = '" . $level . "'";
		$result = mysql_query($query);

		$seats = [];
		while ($row = mysql_fetch_array($result)) {
			$seats[] = $row['seat_code'];
		}
		return $seats;
	}

	function get_all_unavailable_seats($level) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_OCCUPIED . " AND level = '" . $level . "'";
		// echo $query;
		$result = mysql_query($query);

		$seats = [];
		while ($row = mysql_fetch_array($result)) {
			$seats[] = $row['seat_code'];
		}
		return $seats;
	}

	function get_all_blocked_seats($level) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_BLOCKED . " AND exp_time <= NOW()"; 
		$result = mysql_query($query);

		while ($row = mysql_fetch_array($result)) {
			$query1 = "UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_AVAILABLE . " WHERE seat_code = '" . $row['seat_code'] . "'";
			$result1 = mysql_query($query1);
		}

		$query = "SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_BLOCKED . " AND level = " . $level . " AND exp_time > NOW()"; 
		$result = mysql_query($query);
		$seats = [];
		while ($row = mysql_fetch_array($result)) {
			$seats[] = $row['seat_code'];
		}
		return $seats;		
	}

	function get_all_booking_info() {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT * FROM " . SEAT_TABLE . " s, " . BOOKING_TABLE . " b WHERE s.seat_id = b.seat_id ORDER BY b.booking_time DESC";
		$result = mysql_query($query);

		$seats = [];
		while ($row = mysql_fetch_array($result)) {
			$seat['email'] = $row['email'];
			$seat['seat'] = "L" . $row['level'] . " " . $row['row'] . '-' . $row['col'];
			$seat['status'] = $row['status'];
			$seat['id'] = $row['book_id'];
			$seat['booking_time'] = $row['booking_time'];

			$seats[] = $seat;
		}
		return $seats;
	}

	function get_filtered_booking_info() {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT * FROM " . SEAT_TABLE . " s, " . BOOKING_TABLE . " b WHERE s.seat_id = b.seat_id AND b.status <> " . BOOKING_STATUS_CANCELLED . " ORDER BY b.booking_time DESC";
		$result = mysql_query($query);

		$seats = [];
		while ($row = mysql_fetch_array($result)) {
			$seat['email'] = $row['email'];
			$seat['seat'] = "L" . $row['level'] . " " . $row['row'] . '-' . $row['col'];
			$seat['status'] = $row['status'];
			$seat['id'] = $row['book_id'];
			$seat['booking_time'] = $row['booking_time'];

			$seats[] = $seat;
		}
		return $seats;
	}

?>