<?php
	require_once("include/constant.php");
?>
<!doctype html>
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
</head>
<body style="background: black">
  <script type="text/javascript">
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
  	});
  </script>
<div class="ticket-head">Ticket Booking</div>

<div class="legend" >
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #79BF5E"></div> &nbsp;&nbsp;&nbsp;Cat $25 seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #E16B56"></div> &nbsp;&nbsp;&nbsp;Cat $22 seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #79A6C4"></div> &nbsp;&nbsp;&nbsp;Reserved seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #FFF"></div> &nbsp;&nbsp;&nbsp;Selected seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #F00"></div> &nbsp;&nbsp;&nbsp;Booked seat<br />
	<div class="demo-seatCharts-seat demo-seatCharts-cell" style="background-color : #808080"></div> &nbsp;&nbsp;&nbsp;Dummy seat<br />
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

<div id="floor1" class="content book-movie1" style="text-align:center;">
<a class="fancybox" rel="group" href="img/level1.png"><img src="img/level1.png" style="position:absolute;top:16%;left:20%" width="170px" height="240px" alt=""/></a>
<a class="fancybox" rel="group" href="img/level1p.png"><img src="img/level1p.png" style="position:absolute;top:16%;left:67%" width="170px" height="240px" alt=""/></a>

<div id="procedures" style="width:80%;border:2px solid white;margin-left:auto;margin-right:auto;left:0px;right:0px;text-align:center;">
	<p style="font-size: 20px;top:20px;">How To Book</p>
	<div id="info" style="margin-left:80px;text-align:left;">
	<p>1. Select your seats by looking at the seating plan
	<br>2. Log in to book your seats via _______
	<br>3. Payment to be due within three days by cash payment to any EHDP Marketing member.
	<br>4. A confirmation email will be sent to you if the booking was successful.</p>
</div>
</div>
	<div class="wrapper">
		<div class="container">
			<div id="seat-map1" style="margin-top: 30px; margin-left: 0%; width: 1033px">
				<div class="front-indicator" style="text-align:center;">Stage</div>
			</div>
			<div class="booking-details" style="display:none">
				<h2>Booking Details</h2>
				<h3> Selected Seats (<span id="counter">0</span>):</h3>
				<ul id="selected-seats1"></ul>
			</div>
		</div>
	</div>
	<form action="booking.php" method="post" class="pure-form pure-form-single" style="margin-top: 5%;">
		<input id="email" name="email" type="email" placeholder="Your Email here" required="required" />
		<input id="level" name="level" type="hidden" value="1" />
		<input id="seat1" name="seat1" type="hidden" placeholder="Seat" />
		<div id="shows-option"></div>
		<br /><br />
		<button type="submit" class="pure-button pure-button-primary book-button1" style="margin-bottom: 10%">Book!</button>
	</form>
	<script>
	$(document).ready(function(){

		var $cart = $('#selected-seats1'),
			$counter = $('#counter'),
			sc = $('#seat-map1').seatCharts({
			map: [//19 hang
				'_________ffeeeeeeeeeeeeeeeeeeeeff_________',//11-30  		     D
				's_eeeeee_ffeeeeeeeeeeeeeeeeeeeeef_eeeeee_s',//3-8, 9-29, 30-35  E
				's_eeeeee_feeeeeeeeeeeeeeeeeeeeeef_eeeeee_s',//4-9, 10-31, 32-37 F
				's_eeeeee_feeeeeeeeeeeeeeeeeeeeeee_eeeeee_s',//3-8, 9-31, 32-37  G
				's_eeeeee_frrrrrrrrrrrrrrrrrrrrrrf_eeeeee_s',//4-9, 10-31, 32-37 H
				's_eeeeee_frrrrrrrrrrrrrrrrrrrrrrr_eeeeee_s',//3-8, 9-31, 32-37  J
				'__eeeeee_rrrrrrrrrrrrrrrrrrrrrrrr_eeeeee__',//3-8, 9-32, 33-38  K
				's_eeeeee_feeeeeeeeeeeeeeeeeeeeeee_eeeeee_s',//3-8, 9-31, 32-37  L
				's_eeeeee_eeeeeeeeeeeeeeeeeeeeeeee_eeeeee_s',//3-8, 9-32, 33-38  M
				's_eeeeee_frrrrrrrrrreeeeeeeeeeeee_eeeeee_s',//3-8, 9-31, 32-37  N
				's_eeeeee_eeeeeeeeeeeeeeeeeeeeeeee_eeeeee_s',//3-8, 9-32, 33-38  P
				's_eeeeee_feeeeeeeeeeeeeeeeeeeeeee_eeeeee_s',//3-8, 9-31, 32-37  Q
				's_eeeeee_eeeeeeeeeeeeeeeeeeeeeeee_eeeeee_s',//3-8, 9-32, 33-38  R
				'__eeeeee_feeeeeeeeeeeeeeeeeeeeeee_eeeeee__',//3-8, 9-31, 32-37  S
				's_eeeeee_feeeeeeeeeeeeeeeeeeeeeef_eeeeee_s',//4-9, 10-31, 32-37 T
				's_eeeeee_ffeeeeeeeeeeeeeeeeeeeeef_eeeeee_s',//4-9, 10-30, 31-36 U
				's_eeeeee_feeeeeeeeeeeeeeeeeeeeeef_eeeeee_s',//4-9, 10-31, 32-37 V
				's_eeeeee_ffeeeeee_________eeeeeef_eeeeee_s',//4-9, 10-30, 31-36 W
				's________fffeeeee_________eeeeeff________s',//11-30  		   X
				's________________________________________s',//nothing		   Y
				'___________rrrrrrrrrrrrrrrrrrrr___________',//11-30  		   Z
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
					classes : 'seatCharts-seat seatCharts-cell na', //your custom CSS class
					category: 'N/A'
				},
				e: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available first', //your custom CSS class
					category: 'cat 1'
				},	
				r: {
					price	: 0,
					classes : 'seatCharts-seat seatCharts-cell reserved', //your custom CSS class
					category: 'reserved'
				},
				s: {
					price   : 22,
					classes : 'seatCharts-seat seatCharts-cell available second', //your custom CSS class
					category: 'cat 2'
				},
			
			},
			click: function () {
				if (this.status() == 'available') {
					//let's create a new <li> which we'll add to the cart items
					$('<li>'+' Seat # '+ this.settings.id + '</li>')
						.attr('id', 'cart-item-'+this.settings.id)
						.data('seatId', this.settings.id)
						.appendTo($cart);
					
					// $('#seat1').val($('#seat1').val() + this.settings.id + ',');
					/*
					 * Lets update the counter and total
					 *
					 * .find function will not find the current seat, because it will change its stauts only after return
					 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
					 */
					$counter.text(sc.find('selected').length+1);
					return 'selected';
				} else if (this.status() == 'selected') {
					//update the counter
					$counter.text(sc.find('selected').length-1);
				
					//remove the item from our cart
					$('#cart-item-'+this.settings.id).remove();
				
					//seat has been vacated
					return 'available';
				} else if (this.status() == 'unavailable') {
					//seat has been already booked
					return 'unavailable';
				} else {
					return this.style();
				}
			}
		});

 		$.post('include/get_pending_seat.php', {'level': 1}, function(data) {
			var seats = JSON.parse(data);
			for (var i = 0; i < seats.length; i++) {
				sc.get(seats[i]).status('unavailable');	
			};
		});

        $(".na").each(function(){
        	sc.get($(this).attr("id")).status('unavailable');	
        });

        $(".reserved").each(function(){
        	sc.get($(this).attr("id")).status('unavailable');	
        });

        $('.book-button1').click(function(e) {
        	$(".seatCharts-cell.selected").each(function(){
        		$('#seat1').val($('#seat1').val() + $(this).attr("id") + ',');
        	});
  			// e.preventDefault();
  		});

  		$('.book-button2').click(function(e) {
        	$(".seatCharts-cell.selected").each(function(){
        		$('#seat2').val($('#seat2').val() + $(this).attr("id") + ',');
        	});
  			// e.preventDefault();
  		});

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
</div>

<div id="floor2" class="content book-movie2" style="text-align:center; display:none">
<a class="fancybox" rel="group" href="img/level2.png"><img src="img/level2.png" style="position:absolute;top:16%;left:20%" width="170px" height="240px" alt=""/></a>
<a class="fancybox" rel="group" href="img/level2p.png"><img src="img/level2p.png" style="position:absolute;top:16%;left:67%" width="170px" height="240px" alt=""/></a>
	<div class="wrapper">
		<div class="container">
			<div id="seat-map2" style="margin-left: 0%; width: 1060px">
				<div class="front-indicator" style="text-align:center;">Stage</div>
				
			</div>
			<div class="booking-details" style="display:none">
				<h2>Booking Details</h2>
				
				<h3> Selected Seats (<span id="counter">0</span>):</h3>
				<ul id="selected-seats2"></ul>
			</div>
		</div>
	</div>
	<form action="booking.php" method="post" class="pure-form pure-form-single" style="margin-top: 5%;">
		<input id="email" name="email" type="email" placeholder="Your Email here" required="required" />
		<input id="level" name="level" type="hidden" value="2" />
		<input id="seat2" name="seat2" type="hidden" placeholder="Seat" />
		<div id="shows-option"></div>
		<br /><br />
		<button type="submit" class="pure-button pure-button-primary book-button2" style="margin-bottom: 10%">Book!</button>
	</form>
	<script>
	$(document).ready(function(){

		var $cart = $('#selected-seats2'),
			$counter = $('#counter'),
			sc = $('#seat-map2').seatCharts({
			map: [//19 hang
				'__s_____________________________________s__',//1
				'__s_____________________________________s__',//2
				's_________________________________________s',//3
				's_________________________________________s',//4
				'_',
				'__s_____________________________________s__',//1
				'r_s_____________________________________s_r',//2
				'__s_____________________________________s__',//3
				'r_s_____________________________________s_r',//4
				'__s_____________________________________s__',//5
				'r_s_____________________________________s_r',//6
				'__s_____________________________________s__',//7
				'r_s_____________________________________s_r',//8
				'__s_____________________________________s__',//9
				'__s_____________________________________s__',//10
				'__s_____________________________________s__',//11
				's_s_____________________________________s_s',//12
				'__s_____________________________________s__',//13
				's_s_____________________________________s_s',//14
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
				's_s_ffffssssssssssssssssssssssssssssfff_s_s',//33 + A 7-34
				'____fffsssssssssssssssssssssssssssssfff____',//B 6-34
				'____fssssssssssssssssssssssssssssssssff____',//C 5-36
				'____fsssssssssssssssssssssssssssssssssf____',//D 4-36
				'____fssssssssssssssssssssssssssssssssss____',//E 4-37
				'____sssssssssssssssssssssssssssssssssss____',//F 3-37
				'____fssssssssssssssssssssssssssssssssff____',//G 5-36
				
			],
			seats: {
				f: {
					price   : 0,
					classes : 'seatCharts-seat seatCharts-cell na', //your custom CSS class
					category: 'N/A'
				},
				e: {
					price   : 25,
					classes : 'seatCharts-seat seatCharts-cell available first', //your custom CSS class
					category: 'cat 1'
				},	
				r: {
					price	: 0,
					classes : 'seatCharts-seat seatCharts-cell reserved', //your custom CSS class
					category: 'reserved'
				},
				s: {
					price   : 22,
					classes : 'seatCharts-seat seatCharts-cell available second', //your custom CSS class
					category: 'cat 2'
				},
			
			},
			click: function () {
				if (this.status() == 'available') {
					//let's create a new <li> which we'll add to the cart items
					$('<li>'+' Seat # '+ this.settings.id + '</li>')
						.attr('id', 'cart-item-'+this.settings.id)
						.data('seatId', this.settings.id)
						.appendTo($cart);
					
					// $('#seat2').val($('#seat2').val() + this.settings.id + ',');
					/*
					 * Lets update the counter and total
					 *
					 * .find function will not find the current seat, because it will change its stauts only after return
					 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
					 */
					$counter.text(sc.find('selected').length+1);
					return 'selected';
				} else if (this.status() == 'selected') {
					//update the counter
					$counter.text(sc.find('selected').length-1);
				
					//remove the item from our cart
					$('#cart-item-'+this.settings.id).remove();
				
					//seat has been vacated
					return 'available';
				} else if (this.status() == 'unavailable') {
					//seat has been already booked
					return 'unavailable';
				} else {
					return this.style();
				}
			}
		});

        $.post('include/get_pending_seat.php', {'level': 2}, function(data) {
			var seats = JSON.parse(data);
			for (var i = 0; i < seats.length; i++) {
				sc.get(seats[i]).status('unavailable');	
			};
		});

        $(".na").each(function(){
        	sc.get($(this).attr("id")).status('unavailable');	
        });

        $(".reserved").each(function(){
        	sc.get($(this).attr("id")).status('unavailable');	
        });
	}); 
	</script>
</div>
</body>
<?php include('footer.php'); ?>
</html>