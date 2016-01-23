<?php
  if ($_POST['data'] == "") {
    header("location: ticket.php"); 
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flowers, shirts and stickers</title>
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
  <link rel="stylesheet" href="static/css/flower.css" />

    <script src="static/js/jquery-2.1.1.min.js"></script>

    <script src="static/js/booking_checker.js"></script>

</head>
<body>
<div style="background:rgba(0,0,0,0.65) !important;">
    <script>

          var flower1 = new item("Sunflower (single)", 5.00, "f_1");
          var flower2 = new item("Rose (single)", 3.50, "f_2");
          var flower3 = new item("Roses (bouquet of 3)", 15.00, "f_3");
          var flower4 = new item("Gerbera (single)", 2.50, "f_4");
          var flower5 = new item("Gerberas (bouquet of 3)", 12.00, "f_5");
          var flower6 = new item("Plushtoy 1 (40cm)", 5.00, "f_6");
          var flower7 = new item("Plushtoy 1 (90cm)", 12.00, "f_7");
          var flower8 = new item("Plushtoy 2 (42cm)", 5.00, "f_8");
          var flower9 = new item("Plushtoy 2 (90cm)", 12.00, "f_9");
          
          //var shirt_xxs = new item("Shirts (XXS)", 15.00, "s_xxs");
          //var shirt_xs = new item("Shirts (XS)", 15.00, "s_xs");
          var shirt_s = new item("Shirts (S)", 15.00, "s_s");
          var shirt_m = new item("Shirts (M)", 15.00, "s_m");
          var shirt_l = new item("Shirts (L)", 15.00, "s_l");
          //var shirt_xl = new item("Shirts (XL)", 15.00, "s_xl");

          var sticker1 = new item("Sticker 1", 1.00, "st_1");
          var sticker2 = new item("Sticker 2", 1.00, "st_2");
          var sticker3 = new item("Sticker 3", 1.00, "st_3");
          var sticker4 = new item("Sticker 4", 1.00, "st_4");
          var sticker5 = new item("Sticker 5", 1.00, "st_5");

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
            if (pre_data.collect.mail_type == "Registered Mail"){
              $("#summary_table>tbody").append("<tr><td>Registered Mail Charge</td><td>-</td><td class=\"single_price\">S$1.50</td></tr>");
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

            //shirt_xxs.init();
            //shirt_xs.init();
            shirt_s.init();
            shirt_m.init();
            shirt_l.init();
            //shirt_xl.init();

            sticker1.init();
            sticker2.init();
            sticker3.init();
            sticker4.init();
            sticker5.init();


            $("#delivered_to_performers").click(function(){
                if ($("#delivered_to_performers").prop("checked")) {
                    $("#performers_name").parent().parent().fadeIn();
                    $("#performers_name").val(" ");
                } else {
                    $("#performers_name").parent().parent().fadeOut();
                    $("#performers_name").val("No")
                }
            });

            $("#performers_name").parent().parent().fadeOut(); // by defualt

          });
  </script>
  <div class="_container">
    <a href="index.php"><img src="img/title.png" width="700" height="200"></a>
  </div>

  <div class="_container">
    <h2 style="color:white; text-align:left;">Ticket Booking:</h2>
  </div>

  <div class="step_bar_warp">
  <ol class="progress">  
    <li data-step="1" class="is-complete">Step 1: Select your seats</li>  
    <li data-step="2" class="is-complete" >Step 2: Your booking details</li>  
    <li data-step="3" class="is-active">Step 3: Flowers, shirts and stickers</li>
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
      Quantity:
      <span id="booking_quantity">0</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Total:S$
      <span id="booking_price">0.00</span>
    </div>
  </div>

  <div class="container_p">
    <div class="alert-box warning">
      You have &nbsp;&nbsp;<span id = "count_down">N/A</span>&nbsp;&nbsp; to complete the booking, the seat(s) is(are) reserved for 10 minutes
    </div>
  </div>

  <div class="_container">
  <h3 style="color:white; text-align:left;">Purchase of flower(s) for Charity: <small>Flowers may be collected at front of house or delivered to the performer(s)</small></h3>
   <div class="pure-g" style="font-size:17px">
      <div class="pure-u-2-3" style="color:white; text-align:left">
        <input id="delivered_to_performers" type="checkbox"> I want to deliver to the performer(s) backstage
      </div>
   </div>
   <br>
   <div  class="pure-g" style="font-size:17px;">
      <div class="pure-u-1-3" style="text-align:left; color:white;">Please Enter Performers name, number of flowers, name of sender (e.g. Sara Tan - 1 rose - FROM Peter, Ben Lin - 1 sunflower - FROM Bob): &nbsp;&nbsp;</div>
      <div class="pure-u-2-3">
        <input type="text" value="No" id = "performers_name" style="text-align:left;" />
      </div>
   </div>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower1.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower2.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower2.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower3.jpg">
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower1.add()">Sunflower (single)<br/>S$5.00</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower2.add()">Rose (single)<br/>S$3.50</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower3.add()">Roses (bouquet of 3)<br/>S$15.00</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower4.add()">Gerbera (single)<br/>S$2.50</button>
      </div>
    </div>
    <div class="pure-g">
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_1_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_1_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_1_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_2_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_2_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_2_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_3_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_3_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_3_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_4_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_4_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_4_add"/>
          </div>
        </div>
    </div>
     <div class="pure-g">
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower3.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower4.jpg">
      </div>
       <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower4.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower5.jpg">
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower5.add()">Gerberas (bouquet of 3)<br/>S$12.00</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower6.add()">Plushtoys 1 (40cm)<br/>S$5.00</button>
      </div>
       <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower7.add()">Plushtoys 1 (90cm)<br/>S$12.00</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower8.add()">Plushtoys 2 (42cm)<br/>S$5.00</button>
      </div>
    </div>
    <div class="pure-g">
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_5_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_5_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_5_add"/>
          </div>    
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_6_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_6_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_6_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_7_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_7_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_7_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "f_8_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="f_8_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "f_8_add"/>
          </div>
        </div>
    </div>
     <div class="pure-g">
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/flower5.jpg">
      </div>
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-4"></div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="flower9.add()">Plushtoys 2 (90cm)<br/>S$12.00</button>
      </div>
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-4"></div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <div class="pure-u-1-8">
          <input type="button" value="-" id = "f_9_minus"/>
        </div>
        <div class="pure-u-1-4">
          <input type="text" value="0" id="f_9_quantity"/>
        </div>
        <div class="pure-u-1-8">
          <input type="button" value="+" id = "f_9_add"/>
        </div>
      </div>
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-4"></div>
      <div class="pure-u-1-4"></div>
    </div>
  </div>

<!---->

  <div class="_container">
  <h3 style="color:white; text-align:left;">Shirts</h3>
    <div class="pure-g">
      <div class="pure-u-1-2">
        <img class="pure-img item" src="static/img/shirt.png">
      </div>
      <div class="pure-u-1-2">
        
        <!--<div class="pure-g">
          <div class="pure-u-1-2">
            <button class="pure-button" onclick="shirt_xxs.add()">Shirt (XXS)<br/>S$15.00</button>
          </div>
          <div class="pure-u-1-2">
            <button class="pure-button" onclick="shirt_xs.add()">Shirt (XS)<br/>S$15.00</button>
          </div>
        </div>
        <div class="pure-g">
          <div class="pure-u-1-2">
            <div class="pure-u-1-8">
              <input type="button" value="-" id = "s_xxs_minus"/>
            </div>
            <div class="pure-u-1-4">
              <input type="text" value="0" id="s_xxs_quantity"/>
            </div>
            <div class="pure-u-1-8">
              <input type="button" value="+" id = "s_xxs_add"/>
            </div>
          </div>
          <div class="pure-u-1-2">
            <div class="pure-u-1-8">
              <input type="button" value="-" id = "s_xs_minus"/>
            </div>
            <div class="pure-u-1-4">
              <input type="text" value="0" id="s_xs_quantity"/>
            </div>
            <div class="pure-u-1-8">
              <input type="button" value="+" id = "s_xs_add"/>
            </div>
          </div>
        </div>-->

        <div class="pure-g">
          <div class="pure-u-1-2">
            <button class="pure-button" onclick="" disabled="disabled">Shirt (S)<br/>S$15.00</button>
          </div>
          <div class="pure-u-1-2">
            <button class="pure-button" onclick="shirt_m.add()">Shirt (M)<br/>S$15.00</button>
          </div>
        </div>
        <div class="pure-g">
          <div class="pure-u-1-2">
          <!--
            <div class="pure-u-1-8">
              <input type="button" value="-" id = "s_s_minus"/>
            </div>
            <div class="pure-u-1-4">
              <input type="text" value="0" id="s_s_quantity"/>
            </div>
            <div class="pure-u-1-8">
              <input type="button" value="+" id = "s_s_add"/>
            </div>
          !--> Sold Out
          </div>
          <div class="pure-u-1-2">
            <div class="pure-u-1-8">
              <input type="button" value="-" id = "s_m_minus"/>
            </div>
            <div class="pure-u-1-4">
              <input type="text" value="0" id="s_m_quantity"/>
            </div>
            <div class="pure-u-1-8">
              <input type="button" value="+" id = "s_m_add"/>
            </div>
          </div>
        </div>

        <div class="pure-g">
          <div class="pure-u-1-2">
            <button class="pure-button" onclick="shirt_l.add()">Shirt (L)<br/>S$15.00</button>
          </div>
          <div class="pure-u-1-2">
            <!--<button class="pure-button" onclick="shirt_xl.add()">Shirt (XL)<br/>S$15.00</button>-->
          </div>
        </div>

        <div class="pure-g">
          <div class="pure-u-1-2">
            <div class="pure-u-1-8">
              <input type="button" value="-" id = "s_l_minus"/>
            </div>
            <div class="pure-u-1-4">
              <input type="text" value="0" id="s_l_quantity"/>
            </div>
            <div class="pure-u-1-8">
              <input type="button" value="+" id = "s_l_add"/>
            </div>
          </div>
          <div class="pure-u-1-2">
            <!--<div class="pure-u-1-8">
              <input type="button" value="-" id = "s_xl_minus"/>
            </div>
            <div class="pure-u-1-4">
              <input type="text" value="0" id="s_xl_quantity"/>
            </div>
            <div class="pure-u-1-8">
              <input type="button" value="+" id = "s_xl_add"/>
            </div>-->
          </div>
        </div>

    </div>
    
  </div>
  </div>
  
 <div class="_container">
  <h3 style="color:white; text-align:left;">Stickers</h3>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/sticker1.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/sticker2.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/sticker3.jpg">
      </div>
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/sticker4.jpg">
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="sticker1.add()">Sticker 1<br/>S$1.00</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="sticker2.add()">Sticker 2<br/>S$1.00</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="sticker3.add()">Sticker 3<br/>S$1.00</button>
      </div>
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="sticker4.add()">Sticker 4<br/>S$1.00</button>
      </div>
    </div>
    <div class="pure-g">
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "st_1_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="st_1_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "st_1_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "st_2_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="st_2_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "st_2_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "st_3_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="st_3_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "st_3_add"/>
          </div>
        </div>
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "st_4_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="st_4_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "st_4_add"/>
          </div>
        </div>
    </div>
     <div class="pure-g">
      <div class="pure-u-1-4">
        <img class="pure-img item" src="static/img/sticker5.jpg">
      </div>
      <div class="pure-u-1-4">
      </div>
       <div class="pure-u-1-4">
      </div>
      <div class="pure-u-1-4">
      </div>
    </div>
    <div class="pure-g">
      <div class="pure-u-1-4">
        <button class="pure-button" onclick="sticker5.add()">Sticker 5<br/>S$1.00</button>
      </div>
      <div class="pure-u-1-4">
      </div>
       <div class="pure-u-1-4">
      </div>
      <div class="pure-u-1-4">
      </div>
    </div>
    <div class="pure-g">
        <div class="pure-u-1-4">
          <div class="pure-u-1-8">
            <input type="button" value="-" id = "st_5_minus"/>
          </div>
          <div class="pure-u-1-4">
            <input type="text" value="0" id="st_5_quantity"/>
          </div>
          <div class="pure-u-1-8">
            <input type="button" value="+" id = "st_5_add"/>
          </div>    
        </div>
    </div>


  </div>


    
  <br>
  <div class="summary">
    <h3>Item Summary</h3>
    <hr>
    <table border="0" width="100%" >
      <thead>
        <tr>
          <th width="40%"><strong>Items</strong></th>
          <th width="40%"><strong>Quantity</strong></th>
          <th width="20%"><strong>Price</strong></th>
        </tr>
      </thead>
      <tbody>
        <tr id = "f_1_summary">
          <td>Sunflower (single) </td>
          <td><span id = "f_1_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0<br></span></td>
          <td>S$<span id = "f_1_total">0.00</span></td>
        </tr>
        <tr id = "f_2_summary">
          <td>Rose (single) </td>
          <td><span id = "f_2_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_2_total">0.00</span></td>
        </tr>
        <tr id = "f_3_summary">
          <td>Roses (bouquet of 3) </td>
          <td><span id = "f_3_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_3_total">0.00</span></td>
        </tr>
        <tr id = "f_4_summary">
          <td>Gerbera (single) </td>
          <td><span id = "f_4_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_4_total">0.00</span></td>
        </tr>
        <tr id = "f_5_summary">
          <td>Gerberas (bouquet of 3)</td>
          <td><span id = "f_5_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_5_total">0.00</span></td>
        </tr>
        <tr id = "f_6_summary">
          <td>Plushtoy 1 (40cm) </td>
          <td><span id = "f_6_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_6_total">0.00</span></td>
        </tr>
        <tr id = "f_7_summary">
          <td>Plushtoy 1 (90cm) </td>
          <td><span id = "f_7_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_7_total">0.00</span></td>
        </tr>
        <tr id = "f_8_summary">
          <td>Plushtoy 2 (42cm) </td>
          <td><span id = "f_8_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_8_total">0.00</span></td>
        </tr>
        <tr id = "f_9_summary">
          <td>Plushtoy 2 (90cm) </td>
          <td><span id = "f_9_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "f_9_total">0.00</span></td>
        </tr>

        <!--<tr id = "s_xxs_summary">
          <td>Shirt (XXS) </td>
          <td><span id = "s_xxs_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "s_xxs_total">0.00</span></td>
        </tr>

        <tr id = "s_xs_summary">
          <td>Shirt (XS) </td>
          <td><span id = "s_xs_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "s_xs_total">0.00</span></td>
        </tr>
        -->
        <tr id = "s_s_summary">
          <td>Shirt (S) </td>
          <td><span id = "s_s_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "s_s_total">0.00</span></td>
        </tr>

        <tr id = "s_m_summary">
          <td>Shirt (M) </td>
          <td><span id = "s_m_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "s_m_total">0.00</span></td>
        </tr>

        <tr id = "s_l_summary">
          <td>Shirt (L) </td>
          <td><span id = "s_l_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "s_l_total">0.00</span></td>
        </tr>

        <!--<tr id = "s_xl_summary">
          <td>Shirt (XL) </td>
          <td><span id = "s_xl_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "s_xl_total">0.00</span></td>
        </tr>-->

        <tr id = "st_1_summary">
          <td>Sticker 1 </td>
          <td><span id = "st_1_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "st_1_total">0.00</span></td>
        </tr>
        <tr id = "st_2_summary">
          <td>Sticker 2 </td>
          <td><span id = "st_2_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "st_2_total">0.00</span></td>
        </tr>
        <tr id = "st_3_summary">
          <td>Sticker 3 </td>
          <td><span id = "st_3_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "st_3_total">0.00</span></td>
        </tr>
        <tr id = "st_4_summary">
          <td>Sticker 4 </td>
          <td><span id = "st_4_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "st_4_total">0.00</span></td>
        </tr>
        <tr id = "st_5_summary">
          <td>Sticker 5 </td>
          <td><span id = "st_5_quantity_summary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0</span></td>
          <td>S$<span id = "st_5_total">0.00</span></td>
        </tr>

      </tbody>
    </table>
    <hr>
    <div style="text-align: right;">
      Total: S$<span id="item_price">0.00</span>
    </div>
  </div>

  <div class="_container">
    <h3 style="color:white">Total Price: S$<span id="total_price">0</span></h3>
      <input type="hidden" id="pre_data" value='<?php echo $_POST['data']; ?>' />
      <input type = "button" class="button-success pure-button" value="Checkout!" onclick="checkout()" id="checkout_button">
  </div>

<br>
  <?php include('footer.php'); ?>
</div>
</body>
