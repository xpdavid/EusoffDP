<?php
	require_once("include/constant.php");
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
  	<title>Seating</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	 
  	 <link rel="stylesheet" href="static/css/pure/pure.css" />
  	<!--[if lte IE 8]>
   	<link rel="stylesheet" href="static/css/pure/grids-responsive-old-ie-min.css">
  	<![endif]-->
  	<!--[if gt IE 8]><!-->
  	<link rel="stylesheet" href="static/css/pure/grids-responsive-min.css">
  	<!--<![endif]-->

  	<link rel="stylesheet" href="static/css/layouts/marketing.css" />
  	<style>
  		.sponsor_img {
  			padding: 10px;
  		}
  	</style>
 </head>
<body style="background-image: url('img/prison_bg.png');">

	<div class="container_p">
    	<a href="index.php"><img src="img/title.png" width="700" height="200"></a>
	</div>

	<div class="container_p">
		<div class="pure-g">
        	<div class="pure-u-1-2">
            	<img src="img/sponsors/Simply_Connect_Logo.jpg" class="pure-img sponsor_img" >
        	</div>
        	<div class="pure-u-1-2">
            	<img src="img/sponsors/fastjobs_logo.jpg" class="pure-img sponsor_img" >
        	</div>
    	</div>
    	<div class="pure-g">
    		<div class="pure-u-3-8" style="text-align:right">
            	
        	</div>
        	<div class="pure-u-1-8" style="text-align:right">
            	<img src="img/sponsors/MSF_logo.jpg" class="pure-img sponsor_img" width="200">
        	</div>
        	<div class="pure-u-1-2">
            	<img src="img/sponsors/ZALORA_LOGO.png" class="pure-img sponsor_img" width="190">
        	</div>
    	</div>
    </div>
	
</body>
<?php include('footer.php'); ?>
</html>