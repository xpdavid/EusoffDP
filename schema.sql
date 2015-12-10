DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS seat;
DROP TABLE IF EXISTS user;

CREATE TABLE seat (
	seat_id INT AUTO_INCREMENT,
	level INT,
	row VARCHAR(2) NOT NULL,
	col VARCHAR(2) NOT NULL,
	status INT DEFAULT 0, # 0 available, 1 reserved, 2 occupied
	seat_code VARCHAR(10),
	exp_time DATETIME,

	PRIMARY KEY (seat_id)
);

CREATE TABLE booking (
	book_id INT AUTO_INCREMENT,
	email VARCHAR(50) NOT NULL,
	seat_id INT,
	status INT DEFAULT 0, # 0 pending, 1 success, 2 cancelled, 3 blocked
	booking_time DATETIME,

	PRIMARY KEY (book_id),
	FOREIGN KEY (seat_id) REFERENCES seat(seat_id) ON DELETE CASCADE
);

CREATE TABLE user (
	email VARCHAR(50) NOT NULL,
	name VARCHAR(50) NOT NULL,
	matric_num VARCHAR(9) NOT NULL,
	mailing_addr VARCHAR(100),
	collection_mode INT NOT NULL,
	# need to add flowers

	PRIMARY KEY (email)
);