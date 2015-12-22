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

	return total;
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
		try { new_seat_2_status = sc.get(new_seat_2).status(); } catch(err) {} // the seat id may not exist, catch the error
		try { new_seat_3_status = sc.get(new_seat_3).status(); } catch(err) {}
		try { new_seat_4_status = sc.get(new_seat_4).status(); } catch(err) {} 
		
		// check the status of the right side of the current seat
		if (new_seat_1 != ignore_id) { 
			if (all_seat.indexOf(new_seat_1) >= 0 || new_seat_1_status == "unavailable" || new_seat_1_status == "blocked") {
				if (all_seat.indexOf(new_seat_2) >= 0 || new_seat_2_status == "unavailable" || new_seat_2_status == "blocked") {
					// keep indicator
				} else {
					indicate = false;
					break;
				}
			}
		}
		
		// check the status of the left side of the current seat
		if (new_seat_4 != ignore_id) {
			if (all_seat.indexOf(new_seat_4) >= 0 || new_seat_4_status == "unavailable" || new_seat_4_status == "blocked") {
				if (all_seat.indexOf(new_seat_3) >= 0 || new_seat_3_status == "unavailable" || new_seat_3_status == "blocked") {
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
		wrap_personal_detail();
		$("#personal_detail_form").submit();
	} else {
		$("#personal_detail_alert").html(msg);
		$("#personal_detail_alert").show();
	}
}

function wrap_personal_detail() {
	var select_seat = JSON.parse($("#select_seat").val());
	var	details = {
			remain_time: count_down.get_remain(),
			select_seat: select_seat,
			name: $("#name").val(),
			m_num: $("#m_num").val(),
			email: $("#email").val(),
			collect: {
				method: $("#collect_method").get(0).selectedIndex
			}
		};
	if ($("#collect_method").get(0).selectedIndex == 1) {
			details["collect"]["address_1"] = $("#address_1").val(),
			details["collect"]["address_2"] = $("#address_2").val(),
			details["collect"]["zip"] = $("#zip").val(),
			details["collect"]["phone_num"] = $("#phone_num").val()
	}
	$("#datas").val(JSON.stringify(details));
}

function personal_detail_checker() {
	if ($("#name").val() == "" || $("#m_num").val() == "" || $("#email").val() == "") {
		return "Please fill in all the fields.";
	}
	if (!(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/.test($("#email").val()))) {
		return "Please enter a correct email."
	}
	if ($("#collect_method").get(0).selectedIndex == 0) {

	}

	if ($("#collect_method").get(0).selectedIndex == 1) {
		if ($("#address_1").val() == ""  || $("#zip").val() == "" || $("#phone_num").val() == "") {
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


function compute_total_price() {
	var total_flower = flower1.total + flower2.total + flower3.total + flower4.total + flower5.total + flower6.total + flower7.total + flower8.total + flower9.total;
	$("#flower_price").html(total_flower.toFixed(2));
	var total_ticket = compute_total();
	$("#total_price").html((total_ticket + total_flower).toFixed(2));
}

function checkout() {
	var pre_data = JSON.parse($("#pre_data").val());
	var flower_data = {
		flower_1 : flower1,
		flower_2 : flower2,
		flower_3 : flower3,
		flower_4 : flower4,
		flower_5 : flower5,
		flower_6 : flower6,
		flower_7 : flower7,
		flower_8 : flower8,
		flower_9 : flower9
	};
	pre_data["flower"] = flower_data;
	$("#datas").val(JSON.stringify(pre_data));
	$("#checkout_form").submit();
}

// flower object
function flower(name, unit_price, id) {
	this.name = name;
	this.unit_price = unit_price;
	this.quantity = 0;
	this.id = id;
	this.total = 0;
}

flower.prototype.add = function() {
	this.quantity = this.quantity + 1;
	this.total = this.total + this.unit_price;
	this.update_display();
}

flower.prototype.minus = function() {
	if (this.quantity - 1 >= 0) {
		this.quantity = this.quantity - 1;
		this.total = this.total - this.unit_price;
	}
	this.update_display();
}

flower.prototype.set_quantity = function(quantity) {
	this.quantity = quantity;
	this.total = this.unit_price * quantity;
}

flower.prototype.update_display = function() {
	$("#" + this.id + "_quantity").val(this.quantity);
	$("#" + this.id + "_quantity_summary").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + this.quantity);
	$("#" + this.id + "_total").html(this.total.toFixed(2));
	compute_total_price();
	if (this.quantity == 0){
		$("#" + this.id + "_summary").hide();
	}
	else{
		$("#" + this.id + "_summary").show();	
	}
}

flower.prototype.init = function() {
	var self = this;
	$("#" + this.id + "_minus").bind("click", function() {
		self.minus();
		self.update_display();
	});
	$("#" + this.id + "_add").bind("click", function() {
		self.add();
		self.update_display();
	});
	$("#" + this.id + "_quantity").keyup(function() {
		var num = $("#" + self.id + "_quantity").val();
		if (/^\d+$/.test(num)) {
			self.set_quantity(parseInt(num));
		} else {
			self.set_quantity(0);
		}
		self.update_display();
	});
	$("#" + this.id + "_summary").hide();
}



// count down object
function clock(total, span_id, end_f) {
	this.remain = total;
	this.span_id = span_id;
	this.timer = undefined;
	this.end_f = end_f;
}

clock.prototype.set_remain = function(t) {
	this.remain = t;
}

clock.prototype.get_remain = function(t) {
	return this.remain;
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
	this.show();
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
	this.end_f();
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