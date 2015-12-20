<?php
  if ($_POST['data'] == "") {
    header("location: ticket.php"); 
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flowers</title>
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

</head>
<body style="background-image: url('img/prison_bg.png');">
    <script>

          var flower1 = new flower("Sunflower (single)", 5.00, "f_1");
          var flower2 = new flower("Rose (single)", 3.50, "f_2");
          var flower3 = new flower("Roses (bouquet of 3)", 15.00, "f_3");
          var flower4 = new flower("Gerbera (single)", 2.50, "f_4");
          var flower5 = new flower("Gerberas (bouquet of 3)", 10.00, "f_5");
          var flower6 = new flower("Plushtoy 1 (40cm)", 5.00, "f_6");
          var flower7 = new flower("Plushtoy 1 (90cm)", 12.00, "f_7");
          var flower8 = new flower("Plushtoy 2 (42cm)", 5.00, "f_8");
          var flower9 = new flower("Plushtoy 2 (90cm)", 15.00, "f_9");

          var count_down = new clock(600, "count_down", function(){
            alert("Time expired, please try again");
            window.location.href='ticket.php';
          });

          $(document).ready(function(){

            // get the select seat
            var pre_data = JSON.parse($("#pre_data").val());
            for (var id in pre_data.select_seat) {
                // add to summary
                $("#summary_table>tbody").append("<tr><td>" +
                    pre_data.select_seat[id].s_category + "</td><td>"+ pre_data.select_seat[id].s_name +"</td><td class=\"single_price\">S$" + pre_data.select_seat[id].s_price +
                    ".00</td></tr>");
            
            }

            compute_total();
            compute_total_price();

            count_down.set_remain(pre_data.remain_time);
            count_down.start();

            flower1.init();
            flower2.init();
            flower3.init();
            flower4.init();
            flower5.init();
            flower6.init();
            flower7.init();
            flower8.init();
            flower9.init();

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
    <li data-step="1" class="is-complete">Step 1: Select your seats</li>  
    <li data-step="2" class="is-complete" >Step 2: Your booking details</li>  
    <li data-step="3" class="is-active">Step 3: Flower Bundle</li>
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
      Total:S$
      <span id="booking_price">0</span>.00
    </div>
  </div>

  <div class="container_p">
    <div class="alert-box warning">
      You have &nbsp;&nbsp;<span id = "count_down">N/A</span>&nbsp;&nbsp; to complete the booking, the seat(s) is(are) reserved for 10 minutes
    </div>
  </div>

  <div class="container_p">
  <h3 style="color:white; text-align:left;">Purchase of flower(s) for Charity:</h3>
    <div class="pure-g">
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower1.jpg">
      </div>
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower2.jpg">
      </div>
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower2.jpg">
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower1.add()">Sunflower (single) S$5.00</button>
      </div>
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower2.add()">Rose (single) S$3.50</button>
      </div>
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower3.add()">Roses (bouquet of 3) S$15.00</button>
      </div>
    </div>
     <div class="pure-g">
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower3.jpg">
      </div>
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower3.jpg">
      </div>
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower4.jpg">
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower4.add()">Gerbera (single) S$2.50</button>
      </div>
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower5.add()">Gerberas (bouquet of 3) S$10.00</button>
      </div>
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower6.add()">Plushtoys 1 (40cm) S$5.00</button>
      </div>
    </div>
     <div class="pure-g">
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower4.jpg">
      </div>
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower5.jpg">
      </div>
      <div class="pure-u-1-3">
        <img class="pure-img flower" src="static/img/flower5.jpg">
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower7.add()">Plushtoys 1 (90cm) S$12.00</button>
      </div>
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower8.add()">Plushtoys 2 (42cm) S$5.00</button>
      </div>
      <div class="pure-u-1-3">
        <button class="pure-button" onclick="flower9.add()">Plushtoys 2 (90cm) S$15.00</button>
      </div>
    </div>
  </div>

  <br>
  <div class="summary" id = "summary_flower" style="background: rgba(0, 0, 0, 0.8); width:72%; padding:10px;">
    <h3>Flowers Summary</h3>
    <table border="0" width="100%" id = "summary_flower_table">
      <thead>
        <tr>
          <th width="40%"><strong>Items</strong></th>
          <th width="40%"><strong>Quantity</strong></th>
          <th width="20%"><strong>Price</strong></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Sunflower (single) </td>
          <td><input type="button" value="-" id = "f_1_minus"/><input type="text" value="0" id  ="f_1_quantity" /><input type="button" value="+" id = "f_1_add" /></td>
          <td>S$<span id = "f_1_total">0.00</span></td>
        </tr>
        <tr>
          <td>Rose (single) </td>
          <td><input type="button" value="-" id = "f_2_minus"/><input type="text" value="0" id  ="f_2_quantity"/><input type="button" value="+" id = "f_2_add" /></td>
          <td>S$<span id = "f_2_total">0.00</span></td>
        </tr>
        <tr>
          <td>Roses (bouquet of 3) </td>
          <td><input type="button" value="-" id = "f_3_minus"/><input type="text" value="0" id  ="f_3_quantity"/><input type="button" value="+" id = "f_3_add" /></td>
          <td>S$<span id = "f_3_total">0.00</span></td>
        </tr>
        <tr>
          <td>Gerbera (single) </td>
          <td><input type="button" value="-" id = "f_4_minus"/><input type="text" value="0" id  ="f_4_quantity"/><input type="button" value="+" id = "f_4_add" /></td>
          <td>S$<span id = "f_4_total">0.00</span></td>
        </tr>
        <tr>
          <td>Gerberas (bouquet of 3)</td>
          <td><input type="button" value="-" id = "f_5_minus"/><input type="text" value="0" id  ="f_5_quantity"/><input type="button" value="+" id = "f_5_add" /></td>
          <td>S$<span id = "f_5_total">0.00</span></td>
        </tr>
        <tr>
          <td>Plushtoy 1 (40cm) </td>
          <td><input type="button" value="-" id = "f_6_minus"/><input type="text" value="0" id  ="f_6_quantity"/><input type="button" value="+" id = "f_6_add" /></td>
          <td>S$<span id = "f_6_total">0.00</span></td>
        </tr>
        <tr>
          <td>Plushtoy 1 (90cm) </td>
          <td><input type="button" value="-" id = "f_7_minus"/><input type="text" value="0" id  ="f_7_quantity"/><input type="button" value="+" id = "f_7_add" /></td>
          <td>S$<span id = "f_7_total">0.00</span></td>
        </tr>
        <tr>
          <td>Plushtoy 2 (42cm) </td>
          <td><input type="button" value="-" id = "f_8_minus"/><input type="text" value="0" id  ="f_8_quantity"/><input type="button" value="+" id = "f_8_add" /></td>
          <td>S$<span id = "f_8_total">0.00</span></td>
        </tr>
        <tr>
          <td>Plushtoy 2 (90cm) </td>
          <td><input type="button" value="-" id = "f_9_minus"/><input type="text" value="0" id  ="f_9_quantity"/><input type="button" value="+" id = "f_9_add" /></td>
          <td>S$<span id = "f_9_total">0.00</span></td>
        </tr>
      </tbody>
    </table>
    <hr>
    <div style="text-align: right;">
      Total:S$<span id="flower_price">0.00</span>
    </div>
  </div>

  <div class="container_p">
    <h3 style="color:white">Total Price: S$<span id="total_price">0</span></h3>
    <form action="checkout.php" id = "checkout_form" method="post">
      <input type="hidden" id="pre_data" value='<?php echo $_POST['data']; ?>' />
      <input type="hidden" id="datas" value="" name="data"/>
      <input type = "button" class="button-success pure-button" id="booking_button" value="Continue" style = "display:none;">
      <input type = "button" class="button-success pure-button" id="booking_button" value="Checkout!" onclick="checkout()">
    </form>
  </div>

<br>
  <?php include('footer.php'); ?>
</body>
