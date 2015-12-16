<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	<style type="text/css">
		body {
			background-image: url('img/prison_bg.png');
		}
		#body {
			margin-left: auto;
			margin-right: auto;
			left: 0;
			right: 0;
			height: 750px;
			background-color: rgba(0, 0, 0, 0.7);
			width: 60%;
		}
		#poster {
			position: absolute;
			left: 20%;
			top: 35%;
		}
		#title {
			margin-top: 4%;
			margin-left: 19%;
		}
		#infobox {
			position: absolute;
			background-color: rgba(255, 255, 255, 0.2);
			border: 10px;
			border-radius: 5px;
			width: 500px;
			top: 34%;
			left: 45%;
		}
		#info {
			margin-left: 20px;
			margin-right: 20px;
			color: white;
			font-family: "helvetica";
			font-size: 15px;
		}
	</style>
</head>
<body>
	<div id='barb_wire'>
		<img src="img/barb_wire.gif" style="position:absolute;top:-7%;left:80%" height="200px" width="400px">
	</div>
	<div id='barb_wire2'>
		<img src="img/barb_wire2.gif" style="position:absolute;top:0%;left:-12%" height="200px" width="600px">
	</div>
	<div id="body">
		<div id="title">
			<a href="/<?php echo RELATIVE_PATH;?>"><img src="img/title.png" width="700" height="200"></a>
		</div>
		<div id="poster"><img src="img/Poster_final.jpg" width="280" height="400"></div>
		<div id="infobox">
			<div id="info">
				<p>
					Since its inaugural show in 1991, Eusoff Hall Dance Production has been a consistent student-initiated effort managed entirely by the residents of Eusoff hall to pursue their passion for the arts. Besides collaborating to stage a spectacular fusion of dance and drama, we are also involved in the backstage planning of the whole production. All in all, almost 200 residents are involved. Taking months of preparation and planning, show day itself is a culmination of five months of sheer hard work. And each year, countless friendships are forged as the production team strives together in a pursuit for excellence.</p>

<p>Members tap on their creativity to give life to the story as they work to ensure that sets, props and wardrobe complement the script. Through practices and trainings, the production team develops together as they build up their repertoire of skills relevant to staging a show. This ranges from the tailoring of costumes to the construction of sets to performing to designing light and sound effects. Thus, members have to create synergy amongst themselves to coordinate with each other seamlessly in order to make the production a success.</p>

<p>With that, our dreams for Eusoff Hall Dance Production are big as we hope that it would serve as a platform for Eusoff residents to pursue their passion for the arts and culture. With the time invested in rigorous trainings and practices, we hope to stretch our team in their development of skills.  And so, we look forward to you on show night to enjoy the fruits of our labour!</p>

<p>With love,</p>

<p>Eusoff Hall Dance Production Team</p>
			</div>
		</div>
	</div>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include('footer.php'); ?>
</html>