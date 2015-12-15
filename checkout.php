<?php
  // first check has data
  if ($_POST['data'] == "") {
    header("location: ticket.php"); 
  }
    require_once("include/db.php");

    $error_msg = "<h2>An error occured when stored in database</h2>";
    $status = "success";
    try {
        $data = json_decode($_POST['data']);
        // security check e.g whether the price is correct


        // first create user
        $user_id = create_user($data->email, $data->name, $data->m_num, $data->collect, $data->flower);

        // second create booking
        // get all seat code
        $all_seat_code = "";
        $seat_total_price = 0;
        foreach($data -> select_seat  as $seat_code => $value) {
          $seat_total_price = $seat_total_price + $value -> s_price;
          $all_seat_code = $all_seat_code . "," . $seat_code;
        }
        $all_seat_code = substr($all_seat_code, 1, strlen($all_seat_code) - 1); // delete the beginning ','
        // store_booking
        $booking_id = store_booking($user_id, $all_seat_code);

        // third change seat status
        foreach($data -> select_seat  as $seat_code => $value) {
          change_seat_status($seat_code, SEAT_STATUS_BOOKED, $user_id);
        }

        // flowers price
        $all_flower = json_encode($data -> flower); // stored flower data as JSON data in the database
        $flower_total_price = 0;
        foreach($data -> flower  as $flower => $value) {
          $flower_total_price = $flower_total_price + $value -> total;
        }

        $total_price = $seat_total_price + $flower_total_price;

        $msg = <<<MSG_HEADER
        <h2>Your booking details have been successfully stored in our database</h2>
        <h3>Booking Reference: $booking_id</h3>
        <p>
          Please transfer S$$total_price.00 to .....
        </p>
MSG_HEADER;


    } catch (Exception $e) {
        $status = "error";
        $msg = $error_msg;
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
    <li data-step="3" class="is-complete">Step 3: 'Flower Buddle'</li>
    <li data-step="4" class="progress__last is-active">Step 4: Checkout</li>
  </ol>
  </div>
  <br>


  <div class="container_p">
    <div class="pure-g">
      <div class="pure-u-1-5"></div>
          


      <div class="pure-u-1-5">
        <img class="pure-img" src="static/img/<?php echo $status; ?>.png" width="150px">
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
</body>