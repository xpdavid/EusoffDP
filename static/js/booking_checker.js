function compute_total(){
	var s_table = $("#summary_table");
	var count = $("#summary_table tbody tr").size();
	var total = 0;
	$('#booking_quantity').html(count);
	s_table.find('.single_price').each(function(i){
		var price_tmp = $(this).html();
		total = total + parseInt(price_tmp.substring(2, price_tmp.length));
	});
	$('#booking_price').html(total);
	check_has_item_in_summary();
}

function check_seat_between(sc, all_seat, floor, ignore_id){ // ignore_id is optional
	var indicate = true; // assume there is no seat alone
	for(var i = 0; i < all_seat.length; i = i + 1) { // for every select seat
		var id = all_seat[i];
		var prefix = id.split("_")[1];
		var suffix = parseInt(id.split("_")[2]);
		var new_seat_1 = floor + "_" + prefix + "_" + (suffix + 2);
		var new_seat_2 = floor + "_" + prefix + "_" + (suffix + 1);
		var new_seat_3 = floor + "_" + prefix + "_" + (suffix - 1);
		var new_seat_4 = floor + "_" + prefix + "_" + (suffix - 2);
		var new_seat_1_status = "unavailable";var new_seat_2_status = "unavailable"; // assume is unavailable for all
		var new_seat_3_status = "unavailable";var new_seat_4_status = "unavailable";
		try { new_seat_1_status = sc.get(new_seat_1).status(); } catch(err) {} // update the status
		try { new_seat_2_status = sc.get(new_seat_2).status(); } catch(err) {} // the seat id may no be existed, catch the error
		try { new_seat_3_status = sc.get(new_seat_3).status(); } catch(err) {}
		try { new_seat_4_status = sc.get(new_seat_4).status(); } catch(err) {} 
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
		$("#alert_box").hide();
	} else {
		$("#booking_button").attr('class', 'pure-button pure-button-disabled');
		$("#alert_box").show();
	}
}


function check_has_item_in_summary() {
	var count = $("#summary_table tbody tr").size();
	if (count == 0) {
		$("#booking_button").html("Please select an seat");
		$("#booking_button").attr('class', 'pure-button pure-button-disabled');
	} else {
		$("#booking_button").html("Continue");
		$("#booking_button").attr('class', 'button-success pure-button');
	}
}

function cancel_seat(id) {
	$("#" + id).click();
}

Array.prototype.remove = function(b) { // enhance the array object
	var a = this.indexOf(b); 
	if (a >= 0) { 
		this.splice(a, 1); 
		return true; 
	} 
	return false; 
}; 