function get_pending_booking() {
	$("#current_table").html("Pending_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': 0}, function(pending_bookings) { //0 refer to BOOKING_STATUS_PENDING
		pending_bookings = JSON.parse(pending_bookings);
		function do_loop(i) {
			var pending_booking = pending_bookings[i];

			pending_booking.seats = JSON.parse(pending_booking.seats);

			$.ajax({
						method: 'GET',
						url: '../include/get_real_seat_name.php',
						data: {seat_code: pending_booking.seats.all_seat_code}
					})
					.then(function(seats_real_names) {

						$("#confirm_table>tbody").append("<tr><td>"
								+ pending_booking.book_id + "</td><td>"
								+ seats_real_names + "</td><td>PENDING(S$" + pending_booking.total_price + ")</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
								+ pending_booking.belong_user + ")\">Click Me</button></td><td><button class=\"pure-button button-success\" onclick=\"confirm_booking("
								+ pending_booking.book_id + ")\">Confirm Booking</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
								+ pending_booking.book_id + ", '"
								+ pending_booking.seats.all_seat_code + "')\">Cancel Booking</button>");
					});
		}

		for(var i = 0; i < pending_bookings.length; i++) {
			do_loop(i);
    	}

    });
}

function get_success_booking() {
	$("#current_table").html("Success_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': 1}, function(success_bookings) { //1 refer to BOOKING_STATUS_SUCCEED
		var success_bookings = JSON.parse(success_bookings);

		function do_loop(i) {
			var success_booking = success_bookings[i];

			success_booking.seats = JSON.parse(success_booking.seats);

			$.ajax({
				method: 'GET',
				url: '../include/get_real_seat_name.php',
				data: {seat_code: success_booking.seats.all_seat_code}
			}).then(function(seats_real_names) {

				$("#confirm_table>tbody").append("<tr><td>"
						+ success_booking.book_id + "</td><td>"
						+ seats_real_names + "</td><td>SUCCESS(S$" + success_booking.total_price + ")</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
						+ success_booking.belong_user + ")\">Click Me</button></td><td><button class=\"pure-button button-warning\" onclick=\"back_to_pending("
						+ success_booking.book_id + ")\">Back to Pending</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
						+ success_booking.book_id + ", '"
						+ success_booking.seats.all_seat_code + "')\">Cancel Booking</button></td></tr>");
			});
		}
		for(var i = 0; i < success_bookings.length; i++) {
			do_loop(i);
		}

	});
}

function get_all_booking() {
	$("#current_table").html("All_booking");
	$("#confirm_table>tbody").html("");
	$.post('include/get_booking.php', {'status': -1}, function(bookings) { //1 refer to BOOKING_STATUS_SUCCEED
		var bookings = JSON.parse(bookings);

		function do_loop(i) {
			var status,
					operation = "",
					booking = bookings[i];

			booking.seats = JSON.parse(booking.seats);

			if (booking.status == 0) {
				status = "PENDING";
				operation = "<button class=\"pure-button button-success\" onclick=\"confirm_booking("
						+ booking.book_id + ")\">Confirm Booking</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
						+ booking.book_id + ", '"
						+ booking.seats.all_seat_code + "')\">Cancel Booking</button>";
			}

			if (booking.status == 1) {
				status = "SUCCEED";
				operation = "<button class=\"pure-button button-warning\" onclick=\"back_to_pending("
						+ booking.book_id + ")\">Back to Pending</button>&nbsp;<button class=\"pure-button button-error\" onclick=\"cancel_booking("
						+ booking.book_id + ", '"
						+ booking.seats.all_seat_code + "')\">Cancel Booking</button>"
			}

			if (booking.status == 2) {
				status = "CANCELLED";
			}

			$.ajax({
				method: 'GET',
				url: '../include/get_real_seat_name.php',
				data: {seat_code: booking.seats.all_seat_code}
			}).then(function(seats_real_names) {

				$("#confirm_table>tbody").append("<tr class=\""+ status +"\"><td>"
						+ booking.book_id + "</td><td>"
						+ seats_real_names + "</td><td>"
						+ status + "(S$" + booking.total_price + ")</td><td><button class=\"pure-button button-secondary\" onclick=\"trigger_info("
						+ booking.belong_user + ")\">Click Me</button></td><td>"
						+ operation + "</td></tr>");
			});
		}
		for(var i = 0; i < bookings.length; i++) {
			do_loop(i);
		}

	});
}

function trigger_info(user_id) {
	$.post('include/get_user_info.php', {'user_id': user_id}, function(user_info) { //0 refer to BOOKING_STATUS_PENDING
		$("#name").html("");
		$("#email").html("");
		$("#collect_method").html("");
		$("#mail_type").html("/");
		$("#address_line_1").html("/");
		$("#address_line_2").html("/");
		$("#zip").html("/");
		$("#phone_num").html("/");
		$("#has_collect").html("Not Collect");

		try{

		user_info = JSON.parse(user_info);
		user_info.items = JSON.parse(user_info.items);
		user_info.collect = JSON.parse(user_info.collect);
		user_info.additional_info = JSON.parse(user_info.additional_info)

		console.log(user_info);

		$("#name").html(user_info.name);
		$("#email").html(user_info.email);
		$("#phone_num").html(user_info.collect.phone_num);

		if (user_info.collect.method == 0) { // collect by friend
			$("#collect_method").html("Collect by friend");
		}

		if (user_info.collect.method == 1) { // collect by mailing
			$("#collect_method").html("Collect by mailing");
			$("#mail_type").html(user_info.collect.mail_type);
			$("#address_line_1").html(user_info.collect.address_1);
			$("#address_line_2").html(user_info.collect.address_2);
			$("#zip").html(user_info.collect.zip);
		}


		// flower
		$("#sunflowers").html(user_info.items.flower_1.quantity);

		$("#roses_1").html(user_info.items.flower_2.quantity);

		$("#roses_2").html(user_info.items.flower_3.quantity);

		$("#gerberas_1").html(user_info.items.flower_4.quantity);
		$("#gerberas_2").html(user_info.items.flower_5.quantity);

		$("#plushtoys_1_1").html(user_info.items.flower_6.quantity);
		$("#plushtoys_1_2").html(user_info.items.flower_7.quantity);

		$("#plushtoys_2_1").html(user_info.items.flower_8.quantity);
		$("#plushtoys_2_2").html(user_info.items.flower_9.quantity);


		$("#shirt_xxs").html(user_info.items.shirt_xxs.quantity);
		$("#shirt_xs").html(user_info.items.shirt_xs.quantity);
		$("#shirt_s").html(user_info.items.shirt_s.quantity);
		$("#shirt_m").html(user_info.items.shirt_m.quantity);
		$("#shirt_l").html(user_info.items.shirt_l.quantity);
		$("#shirt_xl").html(user_info.items.shirt_xl.quantity);

		$("#stickers1").html(user_info.items.sticker1.quantity);
		$("#stickers2").html(user_info.items.sticker2.quantity);
		$("#stickers3").html(user_info.items.sticker3.quantity);
		$("#stickers4").html(user_info.items.sticker4.quantity);
		$("#stickers5").html(user_info.items.sticker5.quantity);

		$("#performers_name").html(user_info.additional_info.flower_to_performers);

		$("#user_id").html(user_id);

		try{$("#has_collect").html(user_info.additional_info.collect_status)} catch (err){}

		
		} catch(err) {
			console.log("The server is sick, please try again");
		}

		swal({   title: " ",   text: $("#for_user_info").html(),   html: true });



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

function confirm_collect(id) {
	swal({   
		title: "Are you sure?",   
		text: "Make sure he/she has collect her tickets",   
		type: "info",   
		showCancelButton: true,   
		confirmButtonColor: "#1CB840",
		confirmButtonText: "Yes, Confirm Collection",   
		closeOnConfirm: false }, 
		function(){
			$.post('include/confirm_collection.php', {'user_id': id}, function(data){});
			swal("Confirmed", "Confirmed Collection!", "success");
		});
}
