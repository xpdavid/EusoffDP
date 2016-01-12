DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS seat;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS admin;

CREATE TABLE seat (
	seat_id INT AUTO_INCREMENT,
	level INT,
	row VARCHAR(2) NOT NULL,
	col VARCHAR(2) NOT NULL,
	status INT DEFAULT 0, # 0 available, 1 booked
	seat_code VARCHAR(10),
	belong_booking INT DEFAULT '-1', # -1, no booking
	exp_time DATETIME,

	PRIMARY KEY (seat_id)
);

CREATE TABLE booking (
	book_id INT AUTO_INCREMENT,
	seats TEXT,
	status INT DEFAULT 0, # 0 pending, 1 success, 2 cancelled, 3 blocked
	total_price FLOAT NOT NULL,
	belong_user INT,
	booking_time DATETIME,
	PRIMARY KEY (book_id)
);

CREATE TABLE user (
	id INT AUTO_INCREMENT,
	email VARCHAR(50) NOT NULL,
	name VARCHAR(50) NOT NULL,
	collect TEXT NOT NULL,
	items TEXT,
	additional_info TEXT,
	PRIMARY KEY (id)
);

CREATE TABLE admin (
	id INT AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	userpass VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO `admin` (`id`, `username`, `userpass`) VALUES
(1, 'DP1516', '4c12fd02d3c22cf0c26c7eff13dd68f5'); # 15/16_eusoff_dp