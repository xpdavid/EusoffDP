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
		// row G
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'G', '" . $i . "', '4_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'G', '" . $i . "', '4_" . ($i + 2) . "');";
		}

		for ($i = 32; $i <= 35; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'G', '" . $i . "', '4_" . ($i + 3) . "');";
		}
		// row H
		for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'H', '" . $i . "', '5_" . ($i - 1) . "');";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'H', '" . $i . "', '5_" . ($i + 1) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'H', '" . $i . "', '5_" . ($i + 3) . "');";
		}
		// row J(6)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'J', '" . $i . "', '6_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'J', '" . $i . "', '6_" . ($i + 2) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'J', '" . $i . "', '6_" . ($i + 3) . "');";
		}
		// row K(7)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'K', '" . $i . "', '7_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'K', '" . $i . "', '7_" . ($i + 1) . "');";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'K', '" . $i . "', '7_" . ($i + 2) . "');";
		}
		// row L(8)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'L', '" . $i . "', '8_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'L', '" . $i . "', '8_" . ($i + 2) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'L', '" . $i . "', '8_" . ($i + 3) . "');";
		}
		// row M(9)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'M', '" . $i . "', '9_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'M', '" . $i . "', '9_" . ($i + 1) . "');";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'M', '" . $i . "', '9_" . ($i + 2) . "');";
		}
		// row N(10)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'N', '" . $i . "', '10_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'N', '" . $i . "', '10_" . ($i + 2) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'N', '" . $i . "', '10_" . ($i + 3) . "');";
		}
		// row P(11)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'P', '" . $i . "', '11_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'P', '" . $i . "', '11_" . ($i + 1) . "');";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'P', '" . $i . "', '11_" . ($i + 2) . "');";
		}
		// row Q(12)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Q', '" . $i . "', '12_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Q', '" . $i . "', '12_" . ($i + 2) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Q', '" . $i . "', '12_" . ($i + 3) . "');";
		}
		// row R(13)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'R', '" . $i . "', '13_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'R', '" . $i . "', '13_" . ($i + 1) . "');";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'R', '" . $i . "', '13_" . ($i + 2) . "');";
		}
		// row S(14)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'S', '" . $i . "', '14_" . ($i + 0) . "');";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'S', '" . $i . "', '14_" . ($i + 2) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'S', '" . $i . "', '14_" . ($i + 3) . "');";
		}
		// row T(15)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'T', '" . $i . "', '15_" . ($i - 1) . "');";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'T', '" . $i . "', '15_" . ($i + 1) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'T', '" . $i . "', '15_" . ($i + 3) . "');";
		}
		// row U(16)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'U', '" . $i . "', '16_" . ($i - 1) . "');";
		}

		for ($i = 10; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'U', '" . $i . "', '16_" . ($i + 2) . "');";
		}

		for ($i = 31; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'U', '" . $i . "', '16_" . ($i + 4) . "');";
		}
		// row V(17)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'V', '" . $i . "', '17_" . ($i - 1) . "');";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'V', '" . $i . "', '17_" . ($i + 1) . "');";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'V', '" . $i . "', '17_" . ($i + 3) . "');";
		}
		// row W(18)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '18_" . ($i - 1) . "');";
		}
		for ($i = 10; $i <= 15; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '18_" . ($i + 2) . "');";
		}
	        for ($i = 25; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '18_" . ($i + 2) . "');";
		}
                for ($i = 31; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '18_" . ($i + 4) . "');";
		}
		// row X(19)
		for ($i = 11; $i <= 15; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'X', '" . $i . "', '19_" . ($i + 2) . "');";
		}
	        for ($i = 26; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'X', '" . $i . "', '19_" . ($i + 1) . "');";
		}
		// row Z(21)
		for ($i = 11; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Z', '" . $i . "', '21_" . ($i + 1) . "');";
		}
		// row AA(23)
		for ($i = 2; $i <= 39; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'AA', '" . $i . "', '23_" . ($i + 1) . "');";
		}
		// row BB(24)
		for ($i = 3; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'BB', '" . $i . "', '24_" . ($i + 1) . "');";
                		}
		// row CC(25)
		for ($i = 3; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'CC', '" . $i . "', '25_" . ($i + 1) . "');";
		}
		// row DD(26)
		for ($i = 3; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'DD', '" . $i . "', '26_" . ($i + 1) . "');";
		}
		// row EE(27)
		for ($i = 4; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'EE', '" . $i . "', '27_" . ($i + 1) . "');";
		}
		// row FF(28)
		for ($i = 4; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'FF', '" . $i . "', '28_" . ($i + 1) . "');";
		}
		// row GG(29)
		for ($i = 5; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'GG', '" . $i . "', '26_" . ($i + 1) . "');";
		}
		// row LL
		for ($i = 6; $i <= 10; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '" . ($i - 4) . "_1');";
		}
		for ($i = 11; $i <= 16; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '" . ($i - 3) . "_1');";
		}
		for ($i = 17; $i <= 22; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '" . ($i - 2) . "_1');";
		}
		for ($i = 23; $i <= 28; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '" . (43 - $i) . "_42');";
		}
		for ($i = 29; $i <= 34; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '" . (42 - $i) . "_42');";
		}
		for ($i = 35; $i <= 39; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '" . (41 - $i) . "_42');";
		}
		
		
?>
