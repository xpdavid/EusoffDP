function get_pending_booking() {
	$("#current_table").html("Pending_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': 0}, function(pending_seats) { //0 refer to BOOKING_STATUS_PENDING
    	pending_seats = JSON.parse(pending_seats);

		for(var i = 0; i < pending_seats.length; i++) {
			var pending_booking = pending_seats[i];

			$("#confirm_table>tbody").append("<tr><td>"
					+ pending_booking.book_id + "</td><td>"
					+ pending_booking.seats + "</td><td>PENDING</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
					+ pending_booking.belong_user + ")\">Click Me</button></td><td><button class=\"pure-button button-success\" onclick=\"confirm_booking("
					+ pending_booking.book_id + ")\">Confirm Booking</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
					+ pending_booking.book_id + ", '"
					+ pending_booking.seats + "')\">Cancel Booking</button>");

    	}

    });
}

function get_success_booking() {
	$("#current_table").html("Success_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': 1}, function(pending_seats) { //1 refer to BOOKING_STATUS_SUCCEED
		pending_seats = JSON.parse(pending_seats);

		for(var i = 0; i < pending_seats.length; i++) {
			var pending_booking = pending_seats[i];
			$("#confirm_table>tbody").append("<tr><td>"
					+ pending_booking.book_id + "</td><td>"
					+ pending_booking.seats + "</td><td>SUCCESS</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
					+ pending_booking.belong_user + ")\">Click Me</button></td><td><button class=\"pure-button button-warning\" onclick=\"back_to_pending("
					+ pending_booking.book_id + ")\">Back to Pending</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
					+ pending_booking.book_id + ", '"
					+ pending_booking.seats + "')\">Cancel Booking</button></td></tr>");

		}

	});
}

function get_all_booking() {
	$("#current_table").html("All_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': -1}, function(pending_seats) { //1 refer to BOOKING_STATUS_SUCCEED
		pending_seats = JSON.parse(pending_seats);

		for(var i = 0; i < pending_seats.length; i++) {
			var status,
				operation = "",
				pending_booking = pending_seats[i];


			if (pending_booking.status == 0) {
				status = "PENDING";
				operation = "<button class=\"pure-button button-success\" onclick=\"confirm_booking("
					+ pending_booking.book_id + ")\">Confirm Booking</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
					+ pending_booking.book_id + ", '"
					+ pending_booking.seats + "')\">Cancel Booking</button>";
			}

			if (pending_booking.status == 1) {
				status = "SUCCEED";
				operation = "<button class=\"pure-button button-warning\" onclick=\"back_to_pending("
					+ pending_booking.book_id + ")\">Back to Pending</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
					+ pending_booking.book_id + ", '"
					+ pending_booking.seats + "')\">Cancel Booking</button>"
			}

			if (pending_booking.status == 2) {
				status = "CANCELLED";
			}

			$("#confirm_table>tbody").append("<tr class=\""+ status +"\"><td>"
					+ pending_booking.book_id + "</td><td>"
					+ pending_booking.seats + "</td><td>"
					+ status + "</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
					+ pending_booking.belong_user + ")\">Click Me</button></td><td>"
					+ operation + "</td></tr>");
		}

	});
}

function trigger_info(user_id) {
	$.post('include/get_user_info.php', {'user_id': user_id}, function(user_info) { //0 refer to BOOKING_STATUS_PENDING 
		var html_text = "<div class=\"user_info\">";

		user_info = JSON.parse(user_info);
		user_info.collect = JSON.parse(user_info.collect);
		user_info.flower = JSON.parse(user_info.flower);

		html_text = html_text + "Name : " + user_info.name + "<br>";
		html_text = html_text + "Email : " + user_info.email + "<br>";
		html_text = html_text + "Matriculate Number : " + user_info.matric_num + "<br>";

		if (user_info.collect.method == 0) { // collect by friend
			html_text = html_text + "Collect method: by friend<br>";
		}

		if (user_info.collect.method == 1) { // collect by friend
			html_text = html_text + "Collect method: by mailing<br>";
			html_text = html_text + "Address line1: " + user_info.collect.address_1 + "<br>";
			html_text = html_text + "Address line2: " + user_info.collect.address_2 + "<br>";
			html_text = html_text + "ZIP: " + user_info.collect.zip + "<br>";
			html_text = html_text + "Phone Number: " + user_info.collect.phone_num + "<br>";
		}

		html_text = html_text + "<br>Flower:<br>";

		for (var name in user_info.flower) {
			if (user_info.flower[name].quantity > 0) {
				html_text = html_text + "Type: " + user_info.flower[name].name + " Quantity:" + user_info.flower[name].quantity + "<br>";
			}
		}


		html_text = html_text + "</div>";
		swal({   title: "<small>User info</small>",   text: html_text,   html: true });


    });
}

function change_booking_status(id, status) {
	$.post('include/change_booking_status.php', {'book_id': id, 'status': status}, function(data) {
		if (data) {
			swal({
				title: "SUCCEED!",
				text: "The booking status has been changed",
				type: "success",
				showCancelButton: false,
				closeOnConfirm: true
			}, function() {
				location.reload();
			});
		} else {
			swal({
				title: "ERROR!",
				text: "Please try again later",
				type: "error",
				showCancelButton: false,
				closeOnConfirm: true
			}, function() {
				location.reload();
			});
		}
	});
}

function confirm_booking(book_id) {
	swal({   title: "Are you sure to confirm the booking?",   
		text: "Make sure you have recieved the correct money",   
		type: "info",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Yes",   
		closeOnConfirm: false }, 
		function(){
			change_booking_status(book_id, 1); // 1 refer to BOOKING_STATUS_SUCCEED
		});
}

function back_to_pending(book_id) {
	swal({   title: "Are you sure to pending the booking?",
				text: "Make sure you have make mistake when confirming the booking",
				type: "info",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes",
				closeOnConfirm: false },
			function(){
				change_booking_status(book_id, 0); // 0 refer to BOOKING_STATUS_PENDING

			});
}

function cancel_booking(book_id, seats) {
	swal({   title: "(Irreversible process!) <br>Are you sure to cancle the booking?",
				text: "This process is irreversible, the booked seat will released and can be booked again!!",
				type: "warning",
				html: true,
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes",
				closeOnConfirm: false },
			function(){
				change_booking_status(book_id, 2); // 2 refer to BOOKING_STATUS_CANCELLED
				$.post('include/release_seats.php', {'seats': seats}, function(data) {
					if (data) {
						swal({
							title: "SUCCEED!",
							text: "The booking has canceled",
							type: "success",
							showCancelButton: false,
							closeOnConfirm: true
						}, function() {
							location.reload();
						});
					} else {
						swal({
							title: "ERROR!",
							text: "Please try again later",
							type: "error",
							showCancelButton: false,
							closeOnConfirm: true
						}, function() {
							location.reload();
						});
					}
				});
			});

}
