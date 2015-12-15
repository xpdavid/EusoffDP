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

	function change_seat_status($seat_code, $status, $booking_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "UPDATE " . SEAT_TABLE . " SET status = '$status', belong_booking = '$booking_id' WHERE seat_code = '$seat_code'";
		$result = mysql_query($query);

		return $result;
	}

	function create_user($email, $name, $matric_num, $collect, $flower) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$collect_json = json_encode($collect);
		$flower_json = json_encode($flower);

		$query1 = "INSERT INTO " . USER_TABLE . "(email, name, matric_num, collect, flower) VALUES ('$email', '$name', '$matric_num', '$collect_json', '$flower_json');";
		$result1 = mysql_query($query1);

		$query2 = "SELECT LAST_INSERT_ID();";
		$result2 = mysql_query($query2);
		$last_id = mysql_fetch_array($result2);
		return $last_id["LAST_INSERT_ID()"];

	}

	function store_booking($user_id, $all_seats) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);
		// transaction required


		$query1 = "INSERT INTO " . BOOKING_TABLE . "(seats, status, belong_user, booking_time) VALUES ('$all_seats', " . BOOKING_STATUS_PENDING . " ,$user_id, NOW());";
		$result1 = mysql_query($query1);

		$query2 = "SELECT LAST_INSERT_ID();";
		$result2 = mysql_query($query2);
		$last_id = mysql_fetch_array($result2);
		return $last_id["LAST_INSERT_ID()"];

	}

	function confirm_booking($book_id) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "UPDATE " . BOOKING_TABLE . " SET status = " . BOOKING_STATUS_SUCCEED . " WHERE book_id = $book_id";
		$result = mysql_query($query);

		$seat_id = get_seat_id_by_book_id($book_id);
		$query = "UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_BOOKED . " WHERE seat_id = $seat_id";
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

	// about to delete
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

		$query = "SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_BOOKED . " AND level = '" . $level . "'";
		$result = mysql_query($query);

		$seats = [];
		while ($row = mysql_fetch_array($result)) {
			$seats[] = $row['seat_code'];
		}
		return $seats;
	}

	function get_all_booked_seats($level) {
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_BOOKED . " AND level = '" . $level . "'";
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