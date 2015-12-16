<?php
	require_once("constant.php");
	$db_conn = connectDB();

	function connectDB() {
		$con = new mysqli(DB_HOST, DB_USERNAME, DB_PWD, DB_NAME);
		if ($con->connect_error) {   
			die("Connection failed: " . $con->connect_error);
		}
		return $con;
	}

	function change_seat_status($seat_code, $status, $booking_id) {
		global $db_conn;

		$stmt = $db_conn->prepare("UPDATE " . SEAT_TABLE . " SET status = ?, belong_booking = ? WHERE seat_code = ?");
		$stmt->bind_param("dds", $status, $booking_id, $seat_code);
		$stmt->execute();

		return $seat_code;
	}

	function create_user($email, $name, $matric_num, $collect, $flower) {
		global $db_conn;

		$collect_json = json_encode($collect);
		$flower_json = json_encode($flower);

		$stmt = $db_conn->prepare("INSERT INTO " . USER_TABLE . "(email, name, matric_num, collect, flower) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $email, $name, $matric_num, $collect_json, $flower_json);
		$stmt->execute();

		$stmt = $db_conn->prepare("SELECT LAST_INSERT_ID();");
		$stmt->execute();
		$stmt->bind_result($last_id);
		$stmt->fetch();
		return $last_id;

	}

	function store_booking($user_id, $all_seats, $total) {
		global $db_conn;

		$stmt = $db_conn->prepare("INSERT INTO " . BOOKING_TABLE . "(seats, status, belong_user, total_price ,booking_time) VALUES (?, " . BOOKING_STATUS_PENDING . " ,? , ?, NOW())");
		$stmt->bind_param("sdd", $all_seats, $user_id, $total);
		$stmt->execute();

		$stmt = $db_conn->prepare("SELECT LAST_INSERT_ID();");
		$stmt->execute();
		$stmt->bind_result($last_id);
		$stmt->fetch();
		return $last_id;

	}

	function toggle_blocked_seat($seat_code, $action) {
		global $db_conn;

		if ($action == "block") {
			$stmt = $db_conn->prepare("UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_BLOCKED . " , exp_time = NOW() + INTERVAL 10 MINUTE WHERE seat_code = ?");
			$stmt->bind_param("s", $seat_code);
			$stmt->execute();
		}

		if ($action == "unblock") {
			$stmt = $db_conn->prepare("UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_AVAILABLE . " WHERE seat_code = ?");
			$stmt->bind_param("s", $seat_code);
			$stmt->execute();
		}

		return $seat_code;	
	}


	function get_real_seat_name_by_seat_code($seat_codes) {
		global $db_conn;

		$all_seats = explode(",", $seat_codes);
		$names = "";
		$stmt = $db_conn->prepare("SELECT level, row, col FROM " . SEAT_TABLE . " WHERE seat_code = ?");
		for($i = 0; $i < count($all_seats); $i++) {
			$stmt->bind_param("s", $all_seats[$i]);
			$stmt->execute();
			$stmt->bind_result($level, $row, $col);
			if ($stmt->fetch()) {
				$names = $names. "," . $level. " " . $row . " " . $col;
			}
		}
		$names = substr($names, 1, strlen($names) - 1); // delete the beginning ','
		return $names;

	}


	function get_all_booked_seats($level) {
		global $db_conn;

		$stmt = $db_conn->prepare("SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_BOOKED . " AND level = ?");
		$stmt->bind_param("s", $level);
		$stmt->execute();
		$stmt->bind_result($seat_code);

		$seats = [];
		while ($stmt->fetch()) {
			$seats[] = $seat_code;
		}
		return $seats;
	}

	function get_all_blocked_seats($level) {
		global $db_conn;
		// update the blocked seat status which has expired
		$stmt = $db_conn->prepare("UPDATE " . SEAT_TABLE . " SET status = " . SEAT_STATUS_AVAILABLE . " WHERE status = " . SEAT_STATUS_BOOKED . " AND exp_time <= NOW()");
		$stmt->execute();


		// then get blocked seat
		$stmt = $db_conn->prepare("SELECT seat_code FROM " . SEAT_TABLE . " WHERE status = " . SEAT_STATUS_BLOCKED . " AND level = ? AND exp_time > NOW()");
		$stmt->bind_param("s", $level);
		$stmt->execute();
		$stmt->bind_result($seat_code);

		$seats = [];
		while ($stmt->fetch()) {
			$seats[] = $seat_code;
		}
		return $seats;	
	}

?>