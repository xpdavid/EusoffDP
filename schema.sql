DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS seat;

CREATE TABLE seat (
	seat_id INT AUTO_INCREMENT,
	level INT,
	row VARCHAR(2) NOT NULL,
	col VARCHAR(2) NOT NULL,
	status INT DEFAULT 0, # 0 available, 1 reserved, 2 occupied
	seat_code VARCHAR(10),

	PRIMARY KEY (seat_id)
);

CREATE TABLE booking (
	book_id INT AUTO_INCREMENT,
	email VARCHAR(50) NOT NULL,
	seat_id INT,
	status INT DEFAULT 0, # 0 pending, 1 success, 2 cancelled
	booking_time DATETIME,

	PRIMARY KEY (book_id),
	FOREIGN KEY (seat_id) REFERENCES seat(seat_id) ON DELETE CASCADE
);