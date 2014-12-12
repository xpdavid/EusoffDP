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

	// level 2
		// row A
		for ($i = 7; $i <= 34; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'A', '" . $i . "', '39_" . ($i + 2) . "');";
		}
		// row B
		for ($i = 6; $i <= 34; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'B', '" . $i . "', '40_" . ($i + 2) . "');";
		}
		// row C
		for ($i = 5; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'C', '" . $i . "', '41_" . ($i + 1) . "');";
		}
		// row D
		for ($i = 4; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'D', '" . $i . "', '42_" . ($i + 2) . "');";
		}
		// row E
		for ($i = 4; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'E', '" . $i . "', '43_" . ($i + 2) . "');";
		}
		// row F
		for ($i = 3; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'F', '" . $i . "', '44_" . ($i + 2) . "');";
		}
		// row G
		for ($i = 5; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'G', '" . $i . "', '45_" . ($i + 1) . "');";
		}
		// row LL
		for ($i = 1; $i <= 19; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '" . ($i + 5) . "_3');";
		}
		for ($i = 20; $i <= 33; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '" . ($i + 6) . "_3');";
		}
		for ($i = 34; $i <= 47; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '" . (73 - $i) . "_41');";
		}
		for ($i = 48; $i <= 66; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '" . (72 - $i) . "_3');";
		}
		// row UL
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '1', '1_3');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '2', '2_3');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '3', '3_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '4', '4_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '5', '7_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '6', '9_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '7', '11_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '8', '13_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '9', '17_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '10', '19_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '11', '21_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '12', '23_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '13', '27_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '14', '29_1');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '15', '31_1');";
		for ($i = 16; $i <= 20; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '" . $i . "', '" . (19 + $i) . "_1');";
		}
		for ($i = 21; $i <= 25; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '" . $i . "', '" . (60 - $i) . "_43');";
		}
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '26', '31_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '27', '29_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '28', '27_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '29', '23_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '30', '21_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '31', '19_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '32', '17_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '33', '13_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '34', '11_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '35', '9_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '36', '7_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '37', '4_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '38', '3_43');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '39', '2_41');";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '40', '1_41');";

?>
