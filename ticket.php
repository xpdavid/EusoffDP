<?php
	require_once("include/constant.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="static/js/jquery-2.1.1.min.js"></script>
  <script src="static/js/jquery.seat-charts.js"></script>  
  <meta charset="utf-8">
  <title>Seating</title>
  <link rel="stylesheet" href="static/css/pure/pure.css" />
  <link rel="stylesheet" href="static/css/layouts/marketing.css" />
  <link rel="stylesheet" href="static/css/jquery/jquery-ui.css" />
  <link rel="stylesheet" href="static/css/jquery.seat-charts.css" />
  
  <!-- Add mousewheel plugin (this is optional) -->
  <script src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
  <!-- Add fancyBox -->
  <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
  <script src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
  <!-- Optionally add helpers - button, thumbnail and/or media -->
  <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" media="screen" />
  <script src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
  <script src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
  <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" media="screen" />
  <script src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
  <!-- booking helper function -->
  <script src="static/js/booking_checker.js"></script>
</head>
<body style="color:#E5EAED;">
<div style="background:rgba(0,0,0,0.65) !important;">
<div id="booking_tip">1 K 22</div>
  <script type="text/javascript">
  	$(document).ready(function(){
  		function show_tip(e) {
  			try{
  				if($(".seatCharts-seat.focused").length > 0) {
  					$("#booking_tip").css("top", e.clientY + 10 + "px");
  					$("#booking_tip").css("left", e.clientX + 10 + "px");
  					$("#booking_tip").show();
  					$.post('include/get_real_seat_name.php', {'seat_code': $(".seatCharts-seat.focused").attr("id")}, function(data) {
  						$("#booking_tip").html(data);
  					});
  				} else {
  					$("#booking_tip").hide();
  				}
  			} catch (err) {}
  		}

  		$('#choose-first-floor').click(function() {
  			$('#choose-first-floor').addClass('selected');
  			$('#choose-second-floor').removeClass('selected');
  			$('#floor1').show();
  			$('#floor2').hide();
  		});

  		$('#choose-second-floor').click(function() {
  			$('#choose-second-floor').addClass('selected');
  			$('#choose-first-floor').removeClass('selected');
  			$('#floor2').show();
  			$('#floor1').hide();
  		});

  		$("#floor1").mousemove(function(e){
  			show_tip(e);
  		});

  		$("#floor2").mousemove(function(e){
  			show_tip(e);
  		});


  		$(".fancybox").fancybox();

  			    $(window).resize(function(){
	        var px = (($(window).width() > 1033) ? (($(window).width() - 1033) / 2 - 20) : 0) + "px";
	        $(".book-movie1").css({
		        margin: "0 " + px + " 0 " + px
		    });

		    var px = (($(window).width() > 1060) ? (($(window).width() - 1060) / 2 - 20) : 0) + "px";
	        $(".book-movie2").css({
		        margin: "0 " + px + " 0 " + px
		    });

	    });   
	    $(window).resize();


  	});
  </script>
<div class="ticket-head">Ticket Booking</div>
<div style=" width: 80%; margin: auto;">
<div id="legend" class="seatCharts-legend" style="margin-left:42%;">
	<ul class="seatCharts-legendList">
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #357EC7"></div>
			<span class="seatCharts-legendDescription">Cat $28 seat</span>
		</li>
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #79BF5E"></div>
			<span class="seatCharts-legendDescription">Cat $25 seat</span>
		</li>
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #EDE275"></div>
			<span class="seatCharts-legendDescription">Wheel chair seat</span>
		</li>
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #79A6C4"></div>
			<span class="seatCharts-legendDescription">Reserved seat</span>
		</li>
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #FFF"></div>
			<span class="seatCharts-legendDescription">Selected seat</span>
		</li>
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #F00"></div>
			<span class="seatCharts-legendDescription">Booked seat</span>
		</li>
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #808080"></div>
			<span class="seatCharts-legendDescription">Dummy seat</span>
		</li>
		<li class="seatCharts-legendItem">
			<div class="seatCharts-seat seatCharts-cell" style="background-color : #800080"></div>
			<span class="seatCharts-legendDescription">Blocked seat</span>
		</li>
	</ul>
</div>
</div>
<br />
<div class='head-pic'>
		<a href="index.php"><img src="img/title.png" width="300" height="75"></a>
</div>
<div id='floor-menu' style="text-align: center">
	<button type="submit" id="choose-first-floor" class="pure-button pure-button-floor selected">first floor</button>
	<button type="submit" id="choose-second-floor" class="pure-button pure-button-floor">second floor</button>
	<br />
	<br />
	<div>You can also download the seating plan from <a href="static/seating_plan.pdf" style="color:yellow">here</a></div>
</div>

<div class="step_bar_warp">
	<ol class="progress">  
		<li class="is-active" data-step="1">Step 1: Select your seats</li>  
		<li data-step="2">Step 2: Your booking details</li>  
		<li data-step="3">Step 3: Flowers, shirts and stickers</li>
		<li data-step="4" class="progress__last">Step 4: Checkout</li>
	</ol>
</div>

<div id="floor1" class="content book-movie1" style="text-align:center;">
<a class="fancybox" rel="group" href="img/level1.png"><img src="img/level1.png" style="position:absolute;top:16%;left:20%" width="170px" height="240px" alt=""/></a>
<a class="fancybox" rel="group" href="img/level1p.png"><img src="img/level1p.png" style="position:absolute;top:16%;left:67%" width="170px" height="240px" alt=""/></a>


	<div class="wrapper">
		<div class="container">
			<div id="seat-map1" style="margin-top: 30px; margin-left: 0%; width: 1033px">
				<div class="front-indicator" style="text-align:center;">Stage</div>
			</div>
		</div>
	</div>
</div>

<div id="floor2" class="content book-movie2" style="text-align:center; display:none">
<a class="fancybox" rel="group" href="img/level2.png"><img src="img/level2.png" style="position:absolute;top:16%;left:20%" width="170px" height="240px" alt=""/></a>
<a class="fancybox" rel="group" href="img/level2p.png"><img src="img/level2p.png" style="position:absolute;top:16%;left:67%" width="170px" height="240px" alt=""/></a>
	<div class="wrapper">
		<div class="container">
			<div id="seat-map2" style="margin-left: 0%; width: 1060px">
				<div class="front-indicator" style="text-align:center;">Stage</div>
			</div>
		</div>
	</div>

</div>

<div class="summary" id = "summary">
	<h3>Your Booking Summary</h3>
	<hr>
	<table border="0" width="100%" id = "summary_table">
		<thead>
			<tr>
				<th width="40%"><strong>Items</strong></th>
				<th width="40%"><strong>Seat Number</strong></th>
				<th width="20%"><strong>Price</strong></th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<hr>
	<div style="text-align: right;">
		Qunatity:
		<span id="booking_quantity">0</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Total: S$
		<span id="booking_price">0.00</span>
	</div>
	<div class="alert-box warning" id="alert_box" style="display:none;">Notice: You cannot leave a seat between.</div>
	<form action="personal_detail.php" method="post" id="summary_submit">
		<input type="hidden" id = "select_seat_id" name = "select_seat" value="none"/>
		<input type = "button" disabled="disabled" class="pure-button pure-button-disabled" id="booking_button" value="Please select a seat" onclick="$('#summary_submit').submit()"  />
	</form>
</div>
<?php include('footer.php'); ?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$summary_table = $('#summary_table>tbody');
		var select_seat = {};

		var sc = $('#seat-map1').seatCharts({
			naming : {
				getId: function(character, row, column) {
					return "1_" + row + '_' + column; // notice it is not _ but -
				}
			},
			map: [//19 hang
				'______ww_ffeeeeeeeeeeeeeeeeeeeeff_ww______',//11-30  		     D
				's_ssssss_ffeeeeeeeeeeeeeeeeeeeeef_ssssss_s',//3-8, 9-29, 30-35  E
				's_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_s',//4-9, 10-31, 32-37 F
				's_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_s',//3-8, 9-31, 32-37  G
				's_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_s',//4-9, 10-31, 32-37 H
				's_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_s',//3-8, 9-31, 32-37  J
				'w_ssssss_eeeeeeeeeeeeeeeeeeeeeeee_ssssss_w',//3-8, 9-32, 33-38  K
				'r_ssssss_feeeeerrrrrrrrrrrrreeeee_ssssss_r',//3-8, 9-31, 32-37  L
				'r_ssssss_rrrrrrrrrrrrrrrrrrrrrrrr_ssssss_r',//3-8, 9-32, 33-38  M
				'r_ssssss_frrrrrrrrrrrrrrrrrrrrrrr_ssssss_r',//3-8, 9-31, 32-37  N
				's_ssssss_eeeeeeeeeeeeeeeeeeeeeeee_ssssss_s',//3-8, 9-32, 33-38  P
				's_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_s',//3-8, 9-31, 32-37  Q
				's_ssssss_eeeeeeeeeeeeeeeeeeeeeeee_ssssss_s',//3-8, 9-32, 33-38  R
				'w_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_w',//3-8, 9-31, 32-37  S
				's_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_s',//4-9, 10-31, 32-37 T
				's_ssssss_ffeeeeeeeeeeeeeeeeeeeeef_ssssss_s',//4-9, 10-30, 31-36 U
				's_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_s',//4-9, 10-31, 32-37 V
				's_ssssss_ffeeeeee_________eeeeeef_ssssss_s',//4-9, 10-30, 31-36 W
				's________fffeeeee_________eeeeeff________s',//11-30  		   X
				's________________________________________s',//nothing		   Y
				'w__________ssssssssrrrrrsssssss__________w',//11-30  		   Z
				'__________________________________________',//nothing
				'__ssssssssssssssssssssssssssssssssssssss__',//2-39 AA
				'__fsssssssssssssssssssssssssssssssssssff__',//3-37 BB
				'__fssssssssssssssssssssssssssssssssssssf__',//3-38 CC
				'__fsssssssssssssssssssssssssssssssssssff__',//3-37 DD
				'__ffssssssssssssssssssssssssssssssssssff__',//4-37 EE
				'__ffsssssssssssssssssssssssssssssssssfff__',//4-36 FF
				'__fffssssssssssssssssssssssssssssssssfff__',//5-36 GG
			],
			seats: {
				f: {
					price   : 0,
					classes : 'seatCharts-seat seatCharts-cell na', // dummy seat
					category: 'N/A'
				},
				r: {
					price	: 0,
					classes : 'seatCharts-seat seatCharts-cell reserved', // reserved
					category: 'reserved'
				},
				e: {
					price   : 28,
					classes : 'seatCharts-seat seatCharts-cell available first', // cat 25
					category: 'Cat $28 seat'
				},
				s: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available second', // cat 25
					category: 'Cat $25 seat'
				},
				b: {
					price   : 0,
					classes : 'seatCharts-seat seatCharts-cell blocked', // blocked seat
					category: 'blocked'
				},
				w: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available wheel', // cat 25
					category: 'Cat $25 wheel chair seat'
				}

			},
			click: function () {
				if (this.status() == 'available') {
					var price    = this.data().price,
						category = this.data().category,
						id = this.node().attr("id"),
						all_seat;

					$.post('include/get_real_seat_name.php', {'seat_code': id}, function(data) {
						real_seat_name = data;

						// add current seat to the summary
						$summary_table.append("<tr id = \"summary_"+ id +"\"><td>" +
							category + "</td><td>" + real_seat_name +"</td><td class=\"single_price\">S$" + price +
							".00&nbsp&nbsp<button class=\"button-error pure-button\" onclick=\"cancel_seat('"+ id +"');\">Delete</button></td></tr>");

						compute_total();

						select_seat[id] = {
							s_id : id,
							s_category : category,
							s_price : price,
							s_name : real_seat_name
						};
						$("#select_seat_id").val(JSON.stringify(select_seat));


						// we don't allow one seat between two booked seats
						all_seat = sc.find("selected").seatIds;
						all_seat[all_seat.length] = id;
						check_seat_between(sc, all_seat, 1);

					});

					// block the seat
					$.post('include/toggle_blocked_seat.php', {'seat_code': id, action:'block'}, function(data) {});

					return 'selected';
				} else if (this.status() == 'selected') {
					var id = this.node().attr("id"),
						all_seat;

					// update the summary
					$("#summary_" + id).remove();
					compute_total();
					select_seat[id] = undefined;
					$("#select_seat_id").val(JSON.stringify(select_seat));


					// check wheter there are seats between two booked seats
					all_seat = sc.find("selected").seatIds;
					all_seat.remove(id)
					check_seat_between(sc, all_seat, 1, id);

					// unblock the seat
					$.post('include/toggle_blocked_seat.php', {'seat_code': id, action:'unblock'}, function(data) {});

					return 'available';
				} else if (this.status() == 'unavailable') {

					return 'unavailable';

				} else {

					return this.style();

				}
			}
		});

		$.post('include/get_booked_seat.php', {'level': 1}, function(data) {
			var seats = JSON.parse(data);
			for (var i = 0; i < seats.length; i++) {
				sc.get(seats[i]).status('unavailable');
			};
		});

		$.post('include/get_blocked_seat.php', {'level': 1}, function(data) {
			var seats = JSON.parse(data);
			for (var i = 0; i < seats.length; i++) {
				sc.get(seats[i]).status('blocked');
			};
		});

		$("div#seat-map1 .na").each(function(){
			sc.get($(this).attr("id")).status('unavailable');
		});

		$("div#seat-map1 .reserved").each(function(){
			sc.get($(this).attr("id")).status('unavailable');
		});


		$("div#seat-map1 .blocked").each(function(){
			sc.get($(this).attr("id")).status('unavailable');
		});

		// second floor
		var sc2 = $('#seat-map2').seatCharts({
			// need to rewrite the id_system
			naming : {
				getId: function(character, row, column) {
					return "2_" + row + '_' + column; // the second floor
				}
			},
			map: [//19 hang
				'__s_____________________________________s__',//1
				'__s_____________________________________s__',//2
				's_________________________________________s',//3
				's_________________________________________s',//4
				'_',
				'__s_____________________________________s__',//1
				's_s_____________________________________s_s',//2
				'__s_____________________________________s__',//3
				's_s_____________________________________s_s',//4
				'__s_____________________________________s__',//5
				's_s_____________________________________s_s',//6
				'__s_____________________________________s__',//7
				's_s_____________________________________s_s',//8
				'__s_____________________________________s__',//9
				'__s_____________________________________s__',//10
				'__s_____________________________________s__',//11
				'r_s_____________________________________s_r',//12
				'__s_____________________________________s__',//13
				'r_s_____________________________________s_r',//14
				'__s_____________________________________s__',//15
				's_s_____________________________________s_s',//16
				'__s_____________________________________s__',//17
				's_s_____________________________________s_s',//18
				'__s_____________________________________s__',//19
				'_',
				'__s_____________________________________s__',//20
				's_s_____________________________________s_s',//21
				'__s_____________________________________s__',//22
				's_s_____________________________________s_s',//23
				'__s_____________________________________s__',//24
				's_s_____________________________________s_s',//25
				'__s_____________________________________s__',//26
				'__s_____________________________________s__',//27
				'__s_____________________________________s__',//28
				's_s_____________________________________s_s',//29
				's_s_____________________________________s_s',//30
				's_s_____________________________________s_s',//31
				's_s_____________________________________s_s',//32
				's_s_ffffssssssssssssrrrrfsssssssssssfff_s_s',//33 + A 7-34
				'____fffssssssssssssssfffssssssssssssfff____',//B 6-34
				'____fssssssssssssssssssssssssssssssssff____',//C 5-36
				'____fsssssssssssssssssssssssssssssssssf____',//D 4-36
				'____fssssssssssssssssssssssssssssssssss____',//E 4-37
				'____sssssssssssssssssssssssssssssssssss____',//F 3-37
				'____fssssssssssssssssssssssssssssssssff____',//G 5-36

			],
			seats: {
				f: {
					price   : 0,
					classes : 'seatCharts-seat seatCharts-cell na', // dummy seat
					category: 'N/A'
				},
				r: {
					price	: 0,
					classes : 'seatCharts-seat seatCharts-cell reserved', // reserved
					category: 'reserved'
				},
				e: {
					price   : 28,
					classes : 'seatCharts-seat seatCharts-cell available first', // cat 25
					category: 'Cat $28 seat'
				},
				s: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available second', // cat 25
					category: 'Cat $25 seat'
				},
				b: {
					price   : 0,
					classes : 'seatCharts-seat seatCharts-cell blocked', // blocked seat
					category: 'blocked'
				},
				w: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available wheel', // cat 25
					category: 'Cat $25 wheel chair seat'
				}

			},
			click: function () {
				if (this.status() == 'available') {
					var price    = this.data().price,
						category = this.data().category,
						id = this.node().attr("id"),
						all_seat;


					$.post('include/get_real_seat_name.php', {'seat_code': id}, function(data) {
						real_seat_name = data;

						// add current seat to the summary
						$summary_table.append("<tr id = \"summary_"+ id +"\"><td>" +
							category + "</td><td>"+ real_seat_name +"</td><td class=\"single_price\">S$" + price +
							".00&nbsp&nbsp<button class=\"button-error pure-button\" onclick=\"cancel_seat('"+ id +"');\">Delete</button></td></tr>");
						compute_total();

						select_seat[id] = {
							s_id : id,
							s_category : category,
							s_price : price,
							s_name : real_seat_name
						};
						$("#select_seat_id").val(JSON.stringify(select_seat));



						// we don't allow one seat between two booked seats
						all_seat = sc2.find("selected").seatIds;
						all_seat[all_seat.length] = id;
						check_seat_between(sc2, all_seat, 2);

					});

					// block the seat
					$.post('include/toggle_blocked_seat.php', {'seat_code': id, action:'unblock'}, function(data) {});

					return 'selected';
				} else if (this.status() == 'selected') {
					var id = this.node().attr("id"),
						all_seat;

					// update the summary
					$("#summary_" + id).remove();
					compute_total();
					select_seat[id] = undefined;
					$("#select_seat_id").val(JSON.stringify(select_seat));


					// check wheter there are seats between two booked seats
					var all_seat = sc2.find("selected").seatIds;
					all_seat.remove(id)
					check_seat_between(sc2, all_seat, 2, id);

					// unblock the seat
					$.post('include/toggle_blocked_seat.php', {'seat_code': id, action:'block'}, function(data) {});

					return 'available';
				} else if (this.status() == 'unavailable') {

					return 'unavailable';

				} else {

					return this.style();

				}
			}
		});

		$.post('include/get_booked_seat.php', {'level': 2}, function(data) {
			var seats = JSON.parse(data);
			for (var i = 0; i < seats.length; i++) {
				sc2.get(seats[i]).status('unavailable');
			};
		});

		$.post('include/get_blocked_seat.php', {'level': 2}, function(data) {
			var seats = JSON.parse(data);
			for (var i = 0; i < seats.length; i++) {
				sc2.get(seats[i]).status('blocked');
			};
		});


		$("div#seat-map2 .na").each(function(){
			sc2.get($(this).attr("id")).status('unavailable');
		});

		$("div#seat-map2 .reserved").each(function(){
			sc2.get($(this).attr("id")).status('unavailable');
		});

	});
</script>
</body>
</html>