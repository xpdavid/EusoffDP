<?php
	
	$db_conn = connectDB();

	function connectDB() {
		$con = new mysqli(DB_HOST, DB_USERNAME, DB_PWD, DB_NAME);
		if ($con->connect_error) {   
			die("Connection failed: " . $con->connect_error);
		}
		return $con;
	}

	function login($username, $userpass) {
		global $db_conn;
		$userpass = md5($userpass);

		$stmt = $db_conn->prepare("SELECT userpass FROM " . ADMIN_TABLE . " WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($pass);
		$stmt->fetch();

		return $pass === $userpass;
	}

	function get_booking($status) { // when $status == -1, getting all seat
		global $db_conn;

		$sql = "SELECT * FROM " . BOOKING_TABLE . " WHERE status = ? ORDER BY booking_time DESC LIMIT 100";
		if ($status == -1) {
			$sql = "SELECT * FROM " . BOOKING_TABLE . " ORDER BY booking_time DESC LIMIT 100" ;
		}

		$stmt = $db_conn->prepare($sql);
		$stmt->bind_param("d", $status);
		$stmt->execute();
		$result = $stmt->get_result();
		
		$bookings = array();
		$i = 0;
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$bookings[$i] = $row;
			$i++;
		}

		echo json_encode($bookings);
	}

	function get_user_info($user_id) {
		global $db_conn;

		$stmt = $db_conn->prepare("SELECT * FROM " . USER_TABLE . " WHERE id = ?");
		$stmt->bind_param("d", $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_array(MYSQLI_ASSOC);

		echo json_encode($row);
	}

	function change_booking_status($book_id, $status) {
		global $db_conn;

		$stmt = $db_conn->prepare("UPDATE " . BOOKING_TABLE . " SET status = ? WHERE book_id = ?");
		$stmt->bind_param("ds", $status, $book_id);
		$result = $stmt->execute();
		return $result;
	}

	function release_seat($seat_code) {
		global $db_conn;

		$stmt = $db_conn->prepare("UPDATE " . SEAT_TABLE . " SET status = ". SEAT_STATUS_AVAILABLE .", belong_booking = " . NO_BOOKING . " WHERE seat_code = ?");
		$stmt->bind_param("s", $seat_code);

		return $stmt->execute();
	}

	function confirm_collection($user_id) {
		global $db_conn;

		$stmt = $db_conn->prepare("SELECT additional_info FROM " . USER_TABLE . " WHERE id = ?");
		$stmt->bind_param("d", $user_id);
		$stmt->execute();
		$stmt->bind_result($additional_info);
		while($stmt->fetch()) {
			$additional_info = json_decode($additional_info);
		}

		$additional_info->collect_status = "Collected";

		$stmt = $db_conn->prepare("UPDATE " . USER_TABLE . " SET additional_info = ? WHERE id = ?");
		$stmt->bind_param("sd", json_encode($additional_info), $user_id);
		
		return $stmt->execute();
	}
?>