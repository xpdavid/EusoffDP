function get_pending_booking() {
	$("#current_table").html("Pending_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': 0}, function(pending_seats) { //0 refer to BOOKING_STATUS_PENDING
    	pending_seats = JSON.parse(pending_seats);
		function do_loop(i) {
			var pending_booking = pending_seats[i];

			$.ajax({
						method: 'GET',
						url: '../include/get_real_seat_name.php',
						data: {seat_code: pending_booking.seats}
					})
					.then(function(seats_real_names) {

						$("#confirm_table>tbody").append("<tr><td>"
								+ pending_booking.book_id + "</td><td>"
								+ seats_real_names + "</td><td>PENDING(S$" + pending_booking.total_price + ")</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
								+ pending_booking.belong_user + ")\">Click Me</button></td><td><button class=\"pure-button button-success\" onclick=\"confirm_booking("
								+ pending_booking.book_id + ")\">Confirm Booking</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
								+ pending_booking.book_id + ", '"
								+ pending_booking.seats + "')\">Cancel Booking</button>");
					});
		}

		for(var i = 0; i < pending_seats.length; i++) {
			do_loop(i);
    	}

    });
}

function get_success_booking() {
	$("#current_table").html("Success_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': 1}, function(pending_seats) { //1 refer to BOOKING_STATUS_SUCCEED
		pending_seats = JSON.parse(pending_seats);

		function do_loop(i) {
			var pending_booking = pending_seats[i];

			$.ajax({
				method: 'GET',
				url: '../include/get_real_seat_name.php',
				data: {seat_code: pending_booking.seats}
			}).then(function(seats_real_names) {

				$("#confirm_table>tbody").append("<tr><td>"
						+ pending_booking.book_id + "</td><td>"
						+ seats_real_names + "</td><td>SUCCESS(S$" + pending_booking.total_price + ")</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
						+ pending_booking.belong_user + ")\">Click Me</button></td><td><button class=\"pure-button button-warning\" onclick=\"back_to_pending("
						+ pending_booking.book_id + ")\">Back to Pending</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
						+ pending_booking.book_id + ", '"
						+ pending_booking.seats + "')\">Cancel Booking</button></td></tr>");
			});
		}
		for(var i = 0; i < pending_seats.length; i++) {
			do_loop(i);
		}

	});
}

function get_all_booking() {
	$("#current_table").html("All_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': -1}, function(pending_seats) { //1 refer to BOOKING_STATUS_SUCCEED
		pending_seats = JSON.parse(pending_seats);

		function do_loop(i) {
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

			$.ajax({
				method: 'GET',
				url: '../include/get_real_seat_name.php',
				data: {seat_code: pending_booking.seats}
			}).then(function(seats_real_names) {

				$("#confirm_table>tbody").append("<tr class=\""+ status +"\"><td>"
						+ pending_booking.book_id + "</td><td>"
						+ seats_real_names + "</td><td>"
						+ status + "(S$" + pending_booking.total_price + ")</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
						+ pending_booking.belong_user + ")\">Click Me</button></td><td>"
						+ operation + "</td></tr>");
			});
		}
		for(var i = 0; i < pending_seats.length; i++) {
			do_loop(i);
		}

	});
}

function trigger_info(user_id) {
	$.post('include/get_user_info.php', {'user_id': user_id}, function(user_info) { //0 refer to BOOKING_STATUS_PENDING
		$("#name").html("");
		$("#email").html("");
		$("#m_num").html("");
		$("#collect_method").html("");
		$("#address_line_1").html("/");
		$("#address_line_2").html("/");
		$("#zip").html("/");
		$("#phone_num").html("/");


		user_info = JSON.parse(user_info);
		user_info.collect = JSON.parse(user_info.collect);
		user_info.flower = JSON.parse(user_info.flower);

		$("#name").html(user_info.name);
		$("#email").html(user_info.email);
		$("#m_num").html(user_info.matric_num);


		if (user_info.collect.method == 0) { // collect by friend
			$("#collect_method").html("Collect by friend");
		}

		if (user_info.collect.method == 1) { // collect by mailing
			$("#collect_method").html("Collect by mailing");
			$("#address_line_1").html(user_info.collect.address_1);
			$("#address_line_2").html(user_info.collect.address_2);
			$("#zip").html(user_info.collect.zip);
			$("#phone_num").html(user_info.collect.phone_num);
		}


		// flower
		// ...

		swal({   title: "<small>User info</small>",   text: $("#for_user_info").html(),   html: true });


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
