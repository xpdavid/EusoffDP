<?php
	require_once("include/constant.php");
  if ($_POST['select_seat'] == "") {
    header("location: ticket.php"); 
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Personal Detail</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="static/css/pure/pure.css" />
  <!--[if lte IE 8]>
   	<link rel="stylesheet" href="static/css/pure/grids-responsive-old-ie-min.css">
  <![endif]-->
  <!--[if gt IE 8]><!-->
   <link rel="stylesheet" href="static/css/pure/grids-responsive-min.css">
  <!--<![endif]-->
  <link rel="stylesheet" href="static/css/layouts/marketing.css" />
  <link rel="stylesheet" href="static/css/jquery/jquery-ui.css" />

    <script src="static/js/jquery-2.1.1.min.js"></script>
    <script src="static/js/booking_checker.js"></script>

  <script src="admin/static/sweetalert/dist/sweetalert.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="admin/static/sweetalert/dist/sweetalert.css">

</head>
<body>
<div style="background:rgba(0,0,0,0.65) !important;">
    <script>
        function PDPA() {
          swal({   confirmButtonText:"I Agree", title: "PDPA Disclaimer",   text: '<div style="text-align:left"><p>(i)  Purpose of Personal Data Collection: <br>“To place an order for Eusoff Hall Dance Production’s merchandise, please provide the requested information by completing this form. Payment and collection details will also be requested via this form.”</p><p>(ii) Consent to provide Personal Data <br>“By indicating your consent to provide your personal data in this form, you agree to receive updates and important announcements related to the sales, payment and collection of your merchandise purchase. Please select your preferred mode of communication: <br><ul><li>Email</li><li>Phone</li></ul>All personal information will be kept confidential and used for the purposes stated only.”</p></div>',   html: true });
        }


        var count_down = new clock(600, "count_down", function(){
          alert("Time expired, please try again");
          window.location.href='ticket.php';
        });

        $(document).ready(function(){

            // get the select seat
            var select_seat = JSON.parse($("#select_seat").val());
            for (var id in select_seat) {
                // add to summary
                $("#summary_table>tbody").append("<tr><td>" +
                    select_seat[id].s_category + "</td><td>"+ select_seat[id].s_name +"</td><td class=\"single_price\">S$" + select_seat[id].s_price +
                    ".00</td></tr>");

                // resend the request to block the seat
                $.post('include/toggle_blocked_seat.php', {'seat_code': select_seat[id].s_id, action:'block'}, function(data) {});
            
            }

            compute_total();


            // begin the count_down
            count_down.start();

            // for display of mailing address
            $("#collect_method").change(function(){
              // collect by friends
              if($("#collect_method").get(0).selectedIndex == 0) {
                  $("#mailing").fadeOut();
                  $("#collect_method_info").fadeOut();
              }

              // collect by mailing
              if($("#collect_method").get(0).selectedIndex == 1) {
                  $("#mailing").fadeIn();
                  $("#collect_method_info").fadeIn();
              }

            });

            $("#mailing").hide(); // hide by default

            // to check whether we had exceed certain mailing date
            var today = new Date();
            if (today.getTime() > 1453996800000) {// 29 Jan,2016
                // we don't allow the email option
                $("#collect_method option:last").remove();
            }

        });
    </script>
	<div class="container_p">
		<a href="index.php"><img src="img/title.png" width="700" height="200"></a>
	</div>

	<div class="container_p">
		<h2 style="color:white; text-align:left;">Ticket Booking:</h2>
	</div>

	<div class="step_bar_warp">
	<ol class="progress">  
		<li data-step="1" class="is-complete" data-step="1">Step 1: Select your seats</li>  
		<li data-step="2" class="is-active">Step 2: Your booking details</li>  
		<li data-step="3" >Step 3: Flowers, shirts and stickers</li>
		<li data-step="4" class="progress__last">Step 4: Checkout</li>
	</ol>
	</div>
	<br>

	<div class="summary" id = "summary" style="background: rgba(0, 0, 0, 0.8); width:72%; padding:10px;">
		<h3>Your Booking Summary</h3>
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
			<span id="booking_price">0</span>
		</div>
	</div>
	<div class="container_p">
		<div class="alert-box warning">
			You have &nbsp;&nbsp;<span id = "count_down">10:00</span>&nbsp;&nbsp; to complete the booking, the seat(s) is(are) reserved for 10 minutes
		</div>
	</div>
  <form class="pure-form" action="flowers.php" id ="personal_detail_form" method="post">
  
  <input type="hidden" name="select_seat" id="select_seat" value='<?php echo $_POST['select_seat']; ?>' />
	
  <div class="container_p" style="background: rgba(0, 0, 0, 0.8); width:72%; padding:10px; text-align:left; color:white !important">
		<h3 style="color:white; text-align:left;">Your personal detail: &nbsp;&nbsp;&nbsp;<a href="#" onclick="PDPA();" style="color:white;">PDPA disclaimer</a></h3>
		<div class="pure-g">
    		<div class="pure-u-1-3"><p>Name</p></div>
    		<div class="pure-u-1-3"><p><input id="name" type="text" placeholder="Name"></p></div>
		</div>
		<div class="pure-g">
    		<div class="pure-u-1-3"><p>Email Address</p></div>
    		<div class="pure-u-1-3"><input id= "email" type="email" placeholder="Email Address"></div>
		</div>
    <div class="pure-g">
      <div class="pure-u-1-3"><p>Phone number:</p></div>
      <div class="pure-u-1-3">
        <input id= "phone_num" type="text" placeholder="Phone number">
      </div>
    </div>
		<div class="pure-g">
    		<div class="pure-u-1-3"><p>Ticket Collection Method</p> <span style="font-size:15px;text-decoration:underline;">Collection details will be emailed to you</span></div>
    		<div class="pure-u-2-3">
    			<select id="collect_method">
              <option >Self-collection</option>
              <option>Mailing</option>
          </select>
          <span id="collect_method_info" style="font-size:15px;text-decoration:underline;display:none">(Only in Singapore, for tickets purchased by 29 January)</span>
        </div>
		</div>
    <div id = "mailing">
      <div class="pure-g">
        <div class="pure-u-1-3"><p>Address line 1 </p></div>
        <div class="pure-u-2-3">
         <input id= "address_1" type="text" placeholder="Address line 1">
        </div>
      </div>
      <div class="pure-g">
        <div class="pure-u-1-3"><p>Address line 2 </p></div>
        <div class="pure-u-2-3">
          <input id= "address_2" type="text" placeholder="Address line 2">
        </div>
      </div>
      <div class="pure-g">
        <div class="pure-u-1-3"><p>ZIP </p></div>
        <div class="pure-u-1-3">
          <input id= "zip" type="text" placeholder="ZIP">
        </div>
      </div>
      <div class="pure-g">
        <div class="pure-u-1-3"><p>Mail Type </p></div>
        <div class="pure-u-1-3">
                <select id="mail_type">
                    <option >Normal Mail</option>
                    <option>Registered Mail ($1.50)</option>
                </select>
        </div>
      </div>
    </div>
	</div>
	<br>

	<div class="container_p" style="text-align:center;">
    <div class="alert-box error" id = "personal_detail_alert" style="display:none">
      
    </div>
    <input type= "hidden" id = "datas" name="data" value="">
		<input type = "button" class="button-success pure-button" id="booking_button" onclick="check_filed();" value="Continue">
	</div>
  </form>
  <br>
  <?php include('footer.php'); ?>
  </div>
</body>