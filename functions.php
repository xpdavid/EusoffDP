<?php
function seat_map($level, $seat) {
	// $seat should be row_col
	$seat = explode("_", $seat);
	$row = $seat[0];
	$col = $seat[1];

	$mrow = '';
	$mcol = '';
	
	if ($level == 1) {
		switch ($row) {
			case 1:
				$mrow = 'D';
				$mcol = $col - 1;
				break;

			case 2:
				if ($col == 1) {
					$mrow = 'LL';
					$mcol = 6;
				} else if ($col <= 8) {
					$mrow = 'E';
					$mcol = $col;
				} else if ($col <= 32) {
					$mrow = 'E';
					$mcol = $col - 3;
				} else if ($col <= 40) {
					$mrow = 'E';
					$mcol = $col - 5;
				} else if ($col == 42) {
					$mrow = 'LL';
					$mcol = 39;
				}
				break;
			
			default:
				# code...
				break;
		}
	} else if ($level == 2) {

	} else {

	}
}