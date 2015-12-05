<?php
	require_once("include/constant.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Eusoff DP1415</title>
	<style type="text/css">
		body {
			overflow:hidden;
			background-image: url('img/prison_bg.png');
		}
		#light {
			position:absolute;
			left:0;
			top:0;
			z-index:2001;
			height:200px;
			width:200px;
			border:100px solid rgba(0, 0, 0, 0.7);
			border-radius:200px;
			border:1px solid #000\9;
			background-color:green\9;
			filter:progid:DXImageTransform.Microsoft.Chroma(color=green) progid:DXImageTransform.Microsoft.Alpha(opacity=60)\9;
		}
		#title {
			position: absolute;
			top: 2%;
			left: 33%;
		}
		#infobox {
			position: absolute;
			background-color: rgba(255, 255, 255, 0.15);
			border: 10px;
			border-radius: 5px;
			height: 300px;
			width: 400px;
			top: 37%;
			left: 17%;
		}
		.info {
			margin-left: 20px;
			color: white;
			font-family: "Athelas";
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
	<script></script>
	<div id='title'>
		<img src="img/title.png" width="700" height="200">
	</div>
	<div id='barb_wire'>
		<img src="img/barb_wire.gif" style="position:absolute;top:59%;left:-2%" height="300px" width="500px">
	</div>
	<div id='barb_wire2'>
		<img src="img/barb_wire2.gif" style="position:absolute;top:75%;left:70%" height="200px" width="500px">
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
		<p class='info' style='font-size:20px;'>Date: 30th January 2015
						<br>Time: 7:30pm - 10:30pm
						<br>Venue: NUS University Cultural Centre
						<br>Ticket Prices: $25/$22
						<br>Please contact Kenneth Quek 97838052 after you have booked the ticket</p>
	</div>
	<script type='text/javascript'>
		var w = screen.width;
		console.log(w);
		var l = document.getElementById('light');
		l.style.borderWidth = (w+200)+'px';
		console.log(l.style.borderWidth);
		l.style.borderRadius = w*2+'px';
		l.style.top = l.style.left = (-w-200)+'px';
		document.onmousemove = function(e){
			with(l.style)
			{
				left =((e&&e.clientX?e.clientX:event.clientX)-w-300)+'px';
				top = ((e&&e.clientY?e.clientY:event.clientY)-w-300)+'px';
			}
		};

		//function loadMainPage(){
		//	window.location.href = "new_main.html";
		//}
	</script>
	<div style = "position:absolute; bottom:2%; left: 3%"><?php include('footer.php'); ?> </div>
</body>

</html>