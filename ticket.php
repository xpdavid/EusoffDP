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
<body style="background: black">
  <script type="text/javascript">
  	var select_seat = {};

  	$(document).ready(function(){

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

<div class="legend" >
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #357EC7"></div> &nbsp;&nbsp;&nbsp;Cat $30 seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #79BF5E"></div> &nbsp;&nbsp;&nbsp;Cat $25 seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #E16B56"></div> &nbsp;&nbsp;&nbsp;Cat $21 seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #79A6C4"></div> &nbsp;&nbsp;&nbsp;Reserved seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #FFF"></div> &nbsp;&nbsp;&nbsp;Selected seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #F00"></div> &nbsp;&nbsp;&nbsp;Booked seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #808080"></div> &nbsp;&nbsp;&nbsp;Dummy seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #800080"></div> &nbsp;&nbsp;&nbsp;Blocked seat<br />
</div>
<br />
<div class='head-pic'>
		<a href="/<?php echo RELATIVE_PATH;?>"><img src="img/title.png" width="300" height="75"></a>
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
		<li data-step="3">Step 3: 'Flower Buddle'</li>
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
	<script>
	$(document).ready(function(){
		$summary_table = $('#summary_table>tbody');
		var sc = $('#seat-map1').seatCharts({
			naming : {
				getId: function(character, row, column) {
    				return "1_" + row + '_' + column; // notice it is not _ but -
				}
			},
			map: [//19 hang
				'_________ffeeeeeeeeeeeeeeeeeeeeff_________',//11-30  		     D
				't_ssssss_ffeeeeeeeeeeeeeeeeeeeeef_ssssss_t',//3-8, 9-29, 30-35  E
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_t',//4-9, 10-31, 32-37 F
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-31, 32-37  G
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_t',//4-9, 10-31, 32-37 H
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-31, 32-37  J
				'__ssssss_eeeeeeeeeeeeeeeeeeeeeeee_ssssss__',//3-8, 9-32, 33-38  K
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-31, 32-37  L
				't_ssssss_eeeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-32, 33-38  M
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-31, 32-37  N
				't_ssssss_eeeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-32, 33-38  P
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-31, 32-37  Q
				't_ssssss_eeeeeeeeeeeeeeeeeeeeeeee_ssssss_t',//3-8, 9-32, 33-38  R
				'__ssssss_feeeeeeeeeeeeeeeeeeeeeee_ssssss__',//3-8, 9-31, 32-37  S
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_t',//4-9, 10-31, 32-37 T
				't_ssssss_ffeeeeeeeeeeeeeeeeeeeeef_ssssss_t',//4-9, 10-30, 31-36 U
				't_ssssss_feeeeeeeeeeeeeeeeeeeeeef_ssssss_t',//4-9, 10-31, 32-37 V
				't_ssssss_ffeeeeee_________eeeeeef_ssssss_t',//4-9, 10-30, 31-36 W
				't________fffeeeee_________eeeeeff________t',//11-30  		   X
				't________________________________________t',//nothing		   Y
				'___________rrrrrrrrrrrrrrrrrrrr___________',//11-30  		   Z
				'__________________________________________',//nothing
				'__tttttttttttttttttttttttttttttttttttttt__',//2-39 AA
				'__ftttttttttttttttttttttttttttttttttttff__',//3-37 BB
				'__fttttttttttttttttttttttttttttttttttttf__',//3-38 CC
				'__ftttttttttttttttttttttttttttttttttttff__',//3-37 DD
				'__ffttttttttttttttttttttttttttttttttttff__',//4-37 EE
				'__fftttttttttttttttttttttttttttttttttfff__',//4-36 FF
				'__fffttttttttttttttttttttttttttttttttfff__',//5-36 GG
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
					price   : 30,
					classes : 'seatCharts-seat seatCharts-cell available first', // cat 25
					category: 'Cat $30 seat'
				},	
				s: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available second', // cat 25
					category: 'Cat $25 seat'
				},	
				t: {
					price   : 21,
					classes : 'seatCharts-seat seatCharts-cell available third', // cat 22
					category: 'Cat $21 seat'
				},
				b: {
					price   : 0,
					classes : 'seatCharts-seat seatCharts-cell blocked', // blocked seat
					category: 'blocked'
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

	}); 
	</script>
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

	<script>
	$(document).ready(function(){

		var sc2 = $('#seat-map2').seatCharts({
			// need to rewrite the id_system
			naming : {
				getId: function(character, row, column) {
    				return "2_" + row + '_' + column; // the second floor
				}
			},
			map: [//19 hang
				'__t_____________________________________t__',//1
				'__t_____________________________________t__',//2
				't_________________________________________t',//3
				't_________________________________________t',//4
				'_',
				'__t_____________________________________t__',//1
				't_t_____________________________________t_t',//2
				'__t_____________________________________t__',//3
				't_t_____________________________________t_t',//4
				'__t_____________________________________t__',//5
				't_t_____________________________________t_t',//6
				'__t_____________________________________t__',//7
				't_t_____________________________________t_t',//8
				'__t_____________________________________t__',//9
				'__t_____________________________________t__',//10
				'__t_____________________________________t__',//11
				't_t_____________________________________t_t',//12
				'__t_____________________________________t__',//13
				't_t_____________________________________t_t',//14
				'__t_____________________________________t__',//15
				't_t_____________________________________t_t',//16
				'__t_____________________________________t__',//17
				't_t_____________________________________t_t',//18
				'__t_____________________________________t__',//19
				'_',
				'__t_____________________________________t__',//20
				't_t_____________________________________t_t',//21
				'__t_____________________________________t__',//22
				't_t_____________________________________t_t',//23
				'__t_____________________________________t__',//24
				't_t_____________________________________t_t',//25
				'__t_____________________________________t__',//26
				'__t_____________________________________t__',//27
				'__t_____________________________________t__',//28
				't_t_____________________________________t_t',//29
				't_t_____________________________________t_t',//30
				't_t_____________________________________t_t',//31
				't_t_____________________________________t_t',//32
				't_t_ffffttttttttttttttttttttttttttttfff_t_t',//33 + A 7-34
				'____ffftttttttttttttttttttttttttttttfff____',//B 6-34
				'____fttttttttttttttttttttttttttttttttff____',//C 5-36
				'____ftttttttttttttttttttttttttttttttttf____',//D 4-36
				'____ftttttttttttttttttttttttttttttttttt____',//E 4-37
				'____ttttttttttttttttttttttttttttttttttt____',//F 3-37
				'____fttttttttttttttttttttttttttttttttff____',//G 5-36
				
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
					price   : 30,
					classes : 'seatCharts-seat seatCharts-cell available first', // cat 25
					category: 'Cat $30 seat'
				},	
				s: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available second', // cat 25
					category: 'Cat $25 seat'
				},	
				t: {
					price   : 21,
					classes : 'seatCharts-seat seatCharts-cell available third', // cat 22
					category: 'Cat $21 seat'
				},
				b: {
					price   : 0,
					classes : 'seatCharts-seat seatCharts-cell blocked', // blocked seat
					category: 'blocked'
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
		Total:
		<span id="booking_price">0</span>.00
	</div>
	<div class="alert-box warning" id="alert_box" style="display:none;">Notice: You cannot leave a seat between.</div>
	<form action="personal_detail.php" method="post" id="summary_submit">
		<input type="hidden" id = "select_seat_id" name = "select_seat" value="none"/>
		<input type = "button" disabled="disabled" class="pure-button pure-button-disabled" id="booking_button" value="Please select a seat" onclick="$('#summary_submit').submit()"  />
	</form>
</div>

</body>
<?php include('footer.php'); ?>
</html>