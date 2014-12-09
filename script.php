<?php
	// level 1
		// row D
		for ($i = 11; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'D', '" . $i . "', '1_" . ($i + 1) . "');";
		}

		// row E
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'E', '" . $i . "', '2_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 29; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'E', '" . $i . "', '2_" . ($i + 3) . "');";
		}

		for ($i = 30; $i <= 35; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'E', '" . $i . "', '2_" . ($i + 5) . "');";
		}

		// row F
		for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'F', '" . $i . "', '3_" . ($i - 1) . "');";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'F', '" . $i . "', '3_" . ($i + 1) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'F', '" . $i . "', '3_" . ($i + 3) . "');";
		}
?>
