<?php
  require_once("include/constant.php");
?>
<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="static/js/jquery-2.1.1.min.js"></script>
  <script src="static/js/jquery.seat-charts.js"></script>  
  <script src="static/js/jquery.rotate.js"></script>
  <script src="static/js/gallery-script.js"></script>
  <meta charset="utf-8">
  <title>Gallery</title>
  <link rel="stylesheet" href="static/css/pure/pure.css" />
  <link rel="stylesheet" href="static/css/layouts/marketing.css" />
  <link rel="stylesheet" href="static/css/jquery/jquery-ui.css" />
  <link rel="stylesheet" href="static/css/jquery.seat-charts.css" />
  <link rel="stylesheet" href="static/css/gallery.css" />

</head>
<body>
<div class='head-pic'>
        <a href="index.php"><img src="img/title.png" width="300" height="75"></a>
</div>

    <div id='gallery-dancer' class='focus icon' style="position:absolute;top:15%;left:15%">
        <a href="gallery.php"><img src="img/dance-icon.png" onmouseover="this.src='img/dance-text.png';" onmouseout="this.src='img/dance-icon.png';" alt="dancer"></a>
    </div>
    <div id='cast' class='focus icon' style="position:absolute;top:15%;left:36%" onclick="">
        <a href="gallery-cast.php"><img src="img/cast-icon.png" onmouseover="this.src='img/cast-text.png';" onmouseout="this.src='img/cast-icon.png';" alt="cast"></a>
    </div>
    <div id='gallery-main-comm' class='focus icon' style="position:absolute;top:15%;left:57%" onclick="">
        <a href="gallery-main-comm.php"><img src="img/maincomm-icon.png" onmouseover="this.src='img/maincomm-text.png';" onmouseout="this.src='img/maincomm-icon.png';" alt="main comm"></a>
    </div>
    <div id='gallery-comm' class='focus icon' style="position:absolute;top:15%;left:78%" onclick="">
        <a href="gallery-comm.php"><img src="img/comm-icon.png" onmouseover="this.src='img/comm-text.png';" onmouseout="this.src='img/comm-icon.png';" alt="comm"></a>
    </div>
