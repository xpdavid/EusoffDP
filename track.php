<?php
		require_once("db.php");
		$con = establish();
		mysql_select_db(DB_NAME, $con);

		$query = "SELECT book_id, exp_time FROM " . BOOKING_TABLE . " WHERE status = '" . BOOKING_STATUS_PENDING . "'";
		$result = mysql_query($query1);

		if ($result){
			$cur_time  =  strtotime(now);
			while ($row = $result->fetch_assoc()){
				$booking_exp_time = strtotime($row["exp_time"]);
				if ($booking_exp_time < $cur_time){
					cancel_booking($row["book_id"]);
				}

			}
		}
?>