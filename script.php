<?php
	// level 1
		// row D
		for ($i = 11; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'D', '" . $i . "', '1_1_" . ($i + 1) . "'); \r\n";
		}

		// row E
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'E', '" . $i . "', '1_2_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 29; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'E', '" . $i . "', '1_2_" . ($i + 3) . "'); \r\n";
		}

		for ($i = 30; $i <= 35; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'E', '" . $i . "', '1_2_" . ($i + 5) . "'); \r\n";
		}

		// row F
		for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'F', '" . $i . "', '1_3_" . ($i - 1) . "'); \r\n";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'F', '" . $i . "', '1_3_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'F', '" . $i . "', '1_3_" . ($i + 3) . "'); \r\n";
		}
		// row G
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'G', '" . $i . "', '1_4_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'G', '" . $i . "', '1_4_" . ($i + 2) . "'); \r\n";
		}

		for ($i = 32; $i <= 35; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'G', '" . $i . "', '1_4_" . ($i + 3) . "'); \r\n";
		}
		// row H
		for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'H', '" . $i . "', '1_5_" . ($i - 1) . "'); \r\n";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'H', '" . $i . "', '1_5_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'H', '" . $i . "', '1_5_" . ($i + 3) . "'); \r\n";
		}
		// row J(6)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'J', '" . $i . "', '1_6_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'J', '" . $i . "', '1_6_" . ($i + 2) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'J', '" . $i . "', '1_6_" . ($i + 3) . "'); \r\n";
		}
		// row K(7)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'K', '" . $i . "', '1_7_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'K', '" . $i . "', '1_7_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'K', '" . $i . "', '1_7_" . ($i + 2) . "'); \r\n";
		}
		// row L(8)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'L', '" . $i . "', '1_8_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'L', '" . $i . "', '1_8_" . ($i + 2) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'L', '" . $i . "', '1_8_" . ($i + 3) . "'); \r\n";
		}
		// row M(9)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'M', '" . $i . "', '1_9_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'M', '" . $i . "', '1_9_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'M', '" . $i . "', '1_9_" . ($i + 2) . "'); \r\n";
		}
		// row N(10)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'N', '" . $i . "', '1_10_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'N', '" . $i . "', '1_10_" . ($i + 2) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'N', '" . $i . "', '1_10_" . ($i + 3) . "'); \r\n";
		}
		// row P(11)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'P', '" . $i . "', '1_11_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'P', '" . $i . "', '1_11_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'P', '" . $i . "', '1_11_" . ($i + 2) . "'); \r\n";
		}
		// row Q(12)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Q', '" . $i . "', '1_12_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Q', '" . $i . "', '1_12_" . ($i + 2) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Q', '" . $i . "', '1_12_" . ($i + 3) . "'); \r\n";
		}
		// row R(13)
		for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'R', '" . $i . "', '1_13_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 32; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'R', '" . $i . "', '1_13_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 33; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'R', '" . $i . "', '1_13_" . ($i + 2) . "'); \r\n";
		}
		// row S(14)
                for ($i = 3; $i <= 8; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'S', '" . $i . "', '1_14_" . ($i + 0) . "'); \r\n";
		}

		for ($i = 9; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'S', '" . $i . "', '1_14_" . ($i + 2) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'S', '" . $i . "', '1_14_" . ($i + 3) . "'); \r\n";
		}
		// row T(15)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'T', '" . $i . "', '1_15_" . ($i - 1) . "'); \r\n";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'T', '" . $i . "', '1_15_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'T', '" . $i . "', '1_15_" . ($i + 3) . "'); \r\n";
		}
		// row U(16)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'U', '" . $i . "', '1_16_" . ($i - 1) . "'); \r\n";
		}

		for ($i = 10; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'U', '" . $i . "', '1_16_" . ($i + 2) . "'); \r\n";
		}

		for ($i = 31; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'U', '" . $i . "', '1_16_" . ($i + 4) . "'); \r\n";
		}
		// row V(17)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'V', '" . $i . "', '1_17_" . ($i - 1) . "'); \r\n";
		}

		for ($i = 10; $i <= 31; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'V', '" . $i . "', '1_17_" . ($i + 1) . "'); \r\n";
		}

		for ($i = 32; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'V', '" . $i . "', '1_17_" . ($i + 3) . "'); \r\n";
		}
		// row W(18)
                for ($i = 4; $i <= 9; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '1_18_" . ($i - 1) . "'); \r\n";
		}
		for ($i = 10; $i <= 15; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '1_18_" . ($i + 2) . "'); \r\n";
		}
	        for ($i = 25; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '1_18_" . ($i + 2) . "'); \r\n";
		}
                for ($i = 31; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'W', '" . $i . "', '1_18_" . ($i + 4) . "'); \r\n";
		}
		// row X(19)
		for ($i = 11; $i <= 15; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'X', '" . $i . "', '1_19_" . ($i + 2) . "'); \r\n";
		}
	        for ($i = 26; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'X', '" . $i . "', '1_19_" . ($i + 1) . "'); \r\n";
		}
		// row Z(21)
		for ($i = 11; $i <= 30; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Z', '" . $i . "', '1_21_" . ($i + 1) . "'); \r\n";
		}
		// row AA(23)
		for ($i = 2; $i <= 39; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'AA', '" . $i . "', '1_23_" . ($i + 1) . "'); \r\n";
		}
		// row BB(24)
		for ($i = 3; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'BB', '" . $i . "', '1_24_" . ($i + 1) . "'); \r\n";
                		}
		// row CC(25)
		for ($i = 3; $i <= 38; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'CC', '" . $i . "', '1_25_" . ($i + 1) . "'); \r\n";
		}
		// row DD(26)
		for ($i = 3; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'DD', '" . $i . "', '1_26_" . ($i + 1) . "'); \r\n";
		}
		// row EE(27)
		for ($i = 4; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'EE', '" . $i . "', '1_27_" . ($i + 1) . "'); \r\n";
		}
		// row FF(28)
		for ($i = 4; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'FF', '" . $i . "', '1_28_" . ($i + 1) . "'); \r\n";
		}
		// row GG(29)
		for ($i = 5; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'GG', '" . $i . "', '1_29_" . ($i + 1) . "'); \r\n";
		}
		// row LL
		for ($i = 6; $i <= 10; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '1_" . ($i - 4) . "_1'); \r\n";
		}
		for ($i = 11; $i <= 16; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '1_" . ($i - 3) . "_1'); \r\n";
		}
		for ($i = 17; $i <= 22; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '1_" . ($i - 2) . "_1'); \r\n";
		}
		for ($i = 23; $i <= 28; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '1_" . (43 - $i) . "_42'); \r\n";
		}
		for ($i = 29; $i <= 34; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '1_" . (42 - $i) . "_42'); \r\n";
		}
		for ($i = 35; $i <= 39; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'LL', '" . $i . "', '1_" . (41 - $i) . "_42'); \r\n";
		}

	// level 2
		// row A
		for ($i = 7; $i <= 34; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'A', '" . $i . "', '2_39_" . ($i + 2) . "'); \r\n";
		}
		// row B
		for ($i = 6; $i <= 34; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'B', '" . $i . "', '2_40_" . ($i + 2) . "'); \r\n";
		}
		// row C
		for ($i = 5; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'C', '" . $i . "', '2_41_" . ($i + 1) . "'); \r\n";
		}
		// row D
		for ($i = 4; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'D', '" . $i . "', '2_42_" . ($i + 2) . "'); \r\n";
		}
		// row E
		for ($i = 4; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'E', '" . $i . "', '2_43_" . ($i + 2) . "'); \r\n";
		}
		// row F
		for ($i = 3; $i <= 37; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'F', '" . $i . "', '2_44_" . ($i + 2) . "'); \r\n";
		}
		// row G
		for ($i = 5; $i <= 36; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'G', '" . $i . "', '2_45_" . ($i + 1) . "'); \r\n";
		}
		// row LL
		for ($i = 1; $i <= 19; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '2_" . ($i + 5) . "_3'); \r\n";
		}
		for ($i = 20; $i <= 33; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '2_" . ($i + 6) . "_3'); \r\n";
		}
		for ($i = 34; $i <= 47; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '2_" . (73 - $i) . "_41'); \r\n";
		}
		for ($i = 48; $i <= 66; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'LL', '" . $i . "', '2_" . (72 - $i) . "_3'); \r\n";
		}

		// row UL
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '1', '2_1_3'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '2', '2_2_3'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '3', '2_3_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '4', '2_4_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '5', '2_7_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '6', '2_9_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '7', '2_11_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '8', '2_13_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '9', '2_17_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '10', '2_19_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '11', '2_21_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '12', '2_23_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '13', '2_27_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '14', '2_29_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '15', '2_31_1'); \r\n";
		for ($i = 16; $i <= 20; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '" . $i . "', '2_" . (19 + $i) . "_1'); \r\n";
		}
		for ($i = 21; $i <= 25; $i ++) {
			echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '" . $i . "', '2_" . (60 - $i) . "_43'); \r\n";
		}
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '26', '2_31_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '27', '2_29_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '28', '2_27_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '29', '2_23_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '30', '2_21_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '31', '2_19_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '32', '2_17_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '33', '2_13_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '34', '11_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '35', '2_9_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '36', '2_7_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '37', '2_4_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '38', '2_3_43'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '39', '2_2_41'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (2, 'UL', '40', '2_1_41'); \r\n";


		// wheel chair seats		
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_1_7'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_1_8'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_1_35'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_1_36'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_7_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_7_42'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_14_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_14_42'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_21_1'); \r\n";
		echo "INSERT INTO seat (level, row, col, seat_code) VALUES (1, 'Wheel Chair', '1', '1_21_42'); \r\n";


?>
