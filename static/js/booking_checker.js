function compute_total(){
	var s_table = $("#summary_table");
	var count = $("#summary_table tbody tr").size();
	var total = 0;

	// update quantity
	$('#booking_quantity').html(count);
	
	// update prices
	s_table.find('.single_price').each(function(i){
		var price_tmp = $(this).html();
		total = total + parseInt(price_tmp.substring(2, price_tmp.length));
	}); 
	$('#booking_price').html(total);
	
	// update summary
	check_has_item_in_summary();
}

function check_seat_between(sc, all_seat, floor, ignore_id){
	var indicate = true; // assume there is no seat alone

	for(var i = 0; i < all_seat.length; i = i + 1) { // for every select seat
		
		var id = all_seat[i]; // the current seat
		var prefix = id.split("_")[1];
		var suffix = parseInt(id.split("_")[2]);
		var new_seat_1 = floor + "_" + prefix + "_" + (suffix + 2); // seat two right from the current seat
		var new_seat_2 = floor + "_" + prefix + "_" + (suffix + 1); // seat right from  the current seat
		var new_seat_3 = floor + "_" + prefix + "_" + (suffix - 1); // seat left from  the current seat
		var new_seat_4 = floor + "_" + prefix + "_" + (suffix - 2); // seat two left from  the current seat
		
		// get the status of the right and left side of the current seat
		var new_seat_1_status = "unavailable";var new_seat_2_status = "unavailable"; // assume is unavailable for all
		var new_seat_3_status = "unavailable";var new_seat_4_status = "unavailable";
		try { new_seat_1_status = sc.get(new_seat_1).status(); } catch(err) {} // update the status
		try { new_seat_2_status = sc.get(new_seat_2).status(); } catch(err) {} // the seat id may no be existed, catch the error
		try { new_seat_3_status = sc.get(new_seat_3).status(); } catch(err) {}
		try { new_seat_4_status = sc.get(new_seat_4).status(); } catch(err) {} 
		
		// check the status of the right side of the current seat
		if (new_seat_1 != ignore_id) { 
			if (all_seat.indexOf(new_seat_1) >= 0 || new_seat_1_status == "unavailable") {
				if (all_seat.indexOf(new_seat_2) >= 0 || new_seat_2_status == "unavailable") {
					// keep indicator
				} else {
					indicate = false;
					break;
				}
			}
		}
		
		// check the status of the left side of the current seat
		if (new_seat_4 != ignore_id) {
			if (all_seat.indexOf(new_seat_4) >= 0 || new_seat_4_status == "unavailable") {
				if (all_seat.indexOf(new_seat_3) >= 0 || new_seat_3_status == "unavailable") {
					// keep indicator
				} else {
					indicate = false;
					break;
				}
			}
		}
	}

	if (indicate) {
		// there is no seat between 
		$("#alert_box").hide();
	} else {
		// there is at least one seat between two booked seat
		$("#booking_button").attr('class', 'pure-button pure-button-disabled');
		$("#alert_box").show();
	}

	return indicate;
}


function check_has_item_in_summary() {
	// to check wehter there is item in the summary
	var count = $("#summary_table tbody tr").size();
	if (count == 0) {
		$("#booking_button").val("Please select an seat");
		$("#booking_button").attr('class', 'pure-button pure-button-disabled');
		$("#booking_button").prop( "disabled", true );
		return false;
	} else {
		$("#booking_button").val("Continue");
		$("#booking_button").attr('class', 'button-success pure-button');
		$("#booking_button").prop( "disabled", false);
		return true;
	}
}

function cancel_seat(id) {
	$("#" + id).click();
}

function check_filed() {
	var msg = personal_detail_checker();
	if (msg === true) {
		$("#personal_detail_alert").hide();
	} else {
		$("#personal_detail_alert").html(msg);
		$("#personal_detail_alert").show();
	}
}


function personal_detail_checker() {
	if ($("#name").val() == "" || $("#m_num").val() == "" || $("#email").val() == "") {
		return "Please fill in all the fields.";
	}
	if (!(/^[a-z]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/.test($("#email").val()))) {
		return "Please enter a correct email."
	}
	if ($("#collect_method").get(0).selectedIndex == 0) {

	}

	if ($("#collect_method").get(0).selectedIndex == 1) {
		if ($("#address_1").val() == "" || $("#address_2").val() == "" || $("#zip").val() == "" || $("#phone_num").val() == "") {
			return "Please fill in all the fields in the mailing detail.";
		}

		if (!(/^\d+$/.test($("#zip").val()))){
			return "Please enter a correct ZIP code"
		}

		if (!(/^\d+$/.test($("#phone_num").val()))){
			return "Please enter a correct phone number"
		}
	}

	return true;
}


// count down object
function clock(total, span_id, end_f) {
	this.remain = total;
	this.span_id = span_id;
	this.timer = undefined;
}

clock.prototype.move = function() {
	if (this.remain === 0) {
		clearInterval(this.timer);
		this.end();
	} else {
		this.show();
		this.remain = this.remain - 1;
	}
}

clock.prototype.show = function() {
	var minutes = this.add_zero(Math.floor(this.remain / 60), 2);
	var second = this.add_zero(this.remain % 60, 2);
	$("#" + this.span_id).html(minutes + ":" + second);
}

clock.prototype.start = function() {
	var self = this;
	this.timer = setInterval(function() {
		self.move();
	}, 1000);
}

clock.prototype.add_zero = function(num, n) {
	var i = (num + "").length;
	while(i++ < n) {
		num = "0" + num;
	}
	return num;
}

clock.prototype.end = function () {
	end_f();
}

// enhance the array object to support remove of one certain element
Array.prototype.remove = function(b) { 
	var a = this.indexOf(b); 
	if (a >= 0) { 
		this.splice(a, 1); 
		return true; 
	} 
	return false; 
}; 