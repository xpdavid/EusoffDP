<?php
	$booking_id = $_GET["booking_id"];
	$total_price = $_GET["total_price"];
	$msg = <<<MSG_HEADER
<h2>Your booking details have been successfully stored in our database</h2>
<h3>Booking Reference: $booking_id</h3>
<p>
	Please transfer <strong> S$$total_price</strong> to POSB account savings <strong> 032-62536-3 </strong> and email your Booking Reference to <strong> dpsponsorship@eusoff.nus.edu.sg </strong> .
</p>
MSG_HEADER;

	$error_msg = "<h2>An error occured when stored in database</h2>";

	if ($_GET["status"] == "error") {
		$msg = $error_msg;
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Checkout</title>
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
<div style="background:rgba(0,0,0,0.65) !important; position:fixed; height:100%">
	<script type="text/javascript">
		function PDPA() {
			swal({   confirmButtonText:"I Agree", title: "PDPA Disclaimer",   text: '<div style="text-align:left;"><p>(iii) Withdrawal of Consent <br>“To help you make an informed decision, withdrawing consent will result in cancellation of your merchandise orders. Should you wish to withdraw your consent for Eusoff Hall Dance Production to contact you for the purposes stated above, please notify us in writing to ehdp@eusoff.nus.edu.sg. We will then remove your personal information and cancel your purchase(s) from our database. Please allow 3 business days for your request to take effect.”</p></div>',   html: true });
		}
	</script>
	<div class="container_p">
		<a href="index.php"><img src="img/title.png" width="700" height="200"></a>
	</div>

	<div class="container_p">
		<h2 style="color:white; text-align:left;">Checkout! &nbsp;&nbsp;&nbsp;<a href="#" onclick="PDPA();" style="color:white;">PDPA disclaimer</a></h2>
	</div>

	<div class="step_bar_warp">
		<ol class="progress">
			<li data-step="1" class="is-complete">Step 1: Select your seats</li>
			<li data-step="2" class="is-complete" >Step 2: Your booking details</li>
			<li data-step="3" class="is-complete">Step 3: Flowers, shirts and stickers</li>
			<li data-step="4" class="progress__last is-active">Step 4: Checkout</li>
		</ol>
	</div>
	<br>


	<div class="container_p">
		<div class="pure-g">
			<div class="pure-u-1-5"></div>



			<div class="pure-u-1-5">
				<img class="pure-img" src="static/img/<?php echo $_GET["status"]; ?>.png" width="150px">
			</div>
			<div class="pure-u-2-5 booking_info">
				<?php echo $msg;?>
			</div>


			<div class="pure-u-1-5"></div>
		</div>
	</div>
	<br>
	<br>
	<?php include('footer.php'); ?>
</div>
</body>