<?php
	require_once("include/constant.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Continuum - EHDP 2015/ 2016</title>
	<link rel="stylesheet" href="static/css/layouts/marketing.css" />
	<style type="text/css">
	
		#infobox {
			position: absolute;
			background-color: rgba(0, 0, 0, 0.50);
			border: 10px;
			border-radius: 5px;
			width: 400px;
			top: 37%;
			left: 17%;
		}
		.info {
			margin-left: 20px;
			font-family: "helvetica";
			color: white
		}

		.icon {
  			border: 7px solid #fff; 
  			border-radius: 50%; 
  			float: left;
  			height: 100px;
  			width: 100px;
  			margin: 20px;
  			overflow: hidden;
   			
  			-webkit-box-shadow: 5px 5px 5px #111;
          			box-shadow: 5px 5px 5px #111;  
		}
		/*FOCUS*/
		.focus {
  			-webkit-transition: all 1s ease;
     		   -moz-transition: all 1s ease;
       		     -o-transition: all 1s ease;
      		    -ms-transition: all 1s ease;
          		    transition: all 1s ease;
		}
 
		.focus:hover {
  			border: 7px solid #fff;
  			border-radius: 0%;
   			-webkit-transform: rotate(360deg);
     		   -moz-transform: rotate(360deg);
       		     -o-transform: rotate(360deg);
      		    -ms-transform: rotate(360deg);
          	        transform: rotate(360deg);
		}

	</style>

</head>
<body scroll=0>
  <div class="container_p" style="margin-left: 29%">
    <a href="index.php"><img src="img/title.png" width="700" height="200"></a>
  </div>
	<div id='home' class='focus icon' style="position:absolute;top:33%;left:51%" onclick="">
		<a href="home.php"><img src="img/icon_home.png" onmouseover="this.src='img/text_home.png';" onmouseout="this.src='img/icon_home.png';" alt="cricket"></a>
	</div>
	<div id='gallery' class='focus icon' style="position:absolute;top:33%;left:63%" onclick="">
		<a href="gallery.php"><img src="img/icon_gallery.png" onmouseover="this.src='img/text_gallery.png';" onmouseout="this.src='img/icon_gallery.png';" alt="cricket"></a>
	</div>
	<div id='synopsis' class='focus icon' style="position:absolute;top:33%;left:75%" onclick="">
		<a href="synopsis.php"><img src="img/icon_synopsis.png" onmouseover="this.src='img/text_synopsis.png';" onmouseout="this.src='img/icon_synopsis.png';" alt="cricket"></a>
	</div>
	<div id='ticket' class='focus icon' style="position:absolute;top:61%;left:51%" onclick="">
		<a href="ticket.php"><img src="img/icon_ticket.png" onmouseover="this.src='img/text_ticket.png';" onmouseout="this.src='img/icon_ticket.png';" alt="cricket"></a>
	</div>
	<div id='contact' class='focus icon' style="position:absolute;top:61%;left:63%" onclick="">
		<a href="contact.php"><img src="img/icon_contact.png" onmouseover="this.src='img/text_contact.png';" onmouseout="this.src='img/icon_contact.png';" alt="cricket"></a>
	</div>
	<div id='sponsor' class='focus icon' style="position:absolute;top:61%;left:75%" onclick="">
		<a href="sponsor.php"><img src="img/icon_sponsor.png" onmouseover="this.src='img/text_sponsor.png';" onmouseout="this.src='img/icon_sponsor.png';" alt="cricket"></a>
	</div>
	<div id='infobox'> 
		<p class='info' style='font-size:25px;'>General Information</p>
		<p class='info' style='font-size:20px;'>
			Date: 5 February 2016
			<br>Time: 7:30pm
			<br>Venue: NUS University Cultural Centre
			<br>Ticket prices: $25 and $30
		</p>
	</div>
	<div style = "position:absolute; bottom:2%; left: 45%"><?php include('footer.php'); ?> </div>
</body>

</html>
