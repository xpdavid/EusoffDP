<?php
    if (!isset($_GET['booking_id']) || !isset($_GET['verify'])) {
        header("location: index.php");
    }
//http://localhost/EW_DP/view_booking.php?booking_id=39&verify=7a71b5d421ef60d84b23346976fa5492
    require_once("include/db.php");
    $stmt = $db_conn->prepare("SELECT * FROM " . BOOKING_TABLE . " WHERE book_id = ?");
    $stmt->bind_param("d", $_GET['booking_id']);
    $stmt->execute();
    $stmt->bind_result($book_id, $seats, $status, $total_price, $belong_user, $booking_time);
    while($stmt->fetch()) {}
    if ($book_id == null) {
        header("location: index.php");
    }

    $stmt = $db_conn->prepare("SELECT name,collect,items,additional_info FROM " . USER_TABLE . " WHERE id = ?");
    $stmt->bind_param("d", $belong_user);
    $stmt->execute();
    $stmt->bind_result($name, $collect, $items, $additional_info);
    while($stmt->fetch()) {}

    if (md5($name) != $_GET['verify']) {
        header("location: index.php");
    }

    $seats = json_decode($seats);
    $items = json_decode($items);
    $collect = json_decode($collect);
    $additional_info = json_decode($additional_info);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Eusoff Hall Dance Production</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container" style="width:800px">
      <div class="row">
        <div class="col-sm-5">
          <img src="https://eusoff.nus.edu.sg/dance-production/img/title.png" class="img-responsive" alt="Responsive image">
        </div>
        <div class="col-sm-7">
          <h2> Eusoff Hall Dance Production 2015/2016
</h2>
          <h3> Booking Information ID <?php echo $_GET['booking_id'];?>
</h3>
        </div>
      </div>
        <div class="row">
        <div class="col-sm-12">
        <p class="lead">Dear <?php echo $name; ?></p>
        <p>Thank you for purchasing tickets to Eusoff Hall Dance Production’s Continuum 2016! Your order is as stated:
        </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item Description(s)</th>
                    <th>Quantity</th>
                    <th>Price ($)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" colspan="3">All Seats: <span id="all_seat"></span></th>
                </tr>
            <?php
            try {
                foreach($seats->select_seat as $seat) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $seat->s_category?> - <?php echo $seat->s_name?></th>
                        <td>1</td>
                        <td><?php echo $seat->s_price?></td>
                    </tr>
                <?php
                }
            } catch (Exception $e) {}
            ?>

            <?php
            try {
                foreach($items as $item) {
                    if ($item->quantity == 0) {
                      continue;
                    }
                    ?>
                    <tr>
                        <th scope="row"><?php echo $item->name;?></th>
                        <td><?php echo $item->quantity;?></td>
                        <td><?php echo $item->total;?></td>
                    </tr>
                <?php
                }
            } catch (Exception $e) {}
            ?>
                <tr>
                    <th scope="row" colspan="3" style="text-align: right;">Total Price: <?php echo $total_price; ?></th>
                </tr>
            </tbody>
        </table>
        <?php
            if ($collect->method == 1) {
             echo "<p class='lead'>Mailing Information: " . $additional_info->mail_info . "</p>";
          }
        ?>
        <?php
        if (isset($additional_info->collect_status)) {
            echo "<p class='lead'>Collect Status : $additional_info->collect_status</p>";
          } else {
            echo "<p class='lead'>Collect Status : Not Collect</p>";
          }
            ?>
        <p>If you wish to purchase further merchandise without tickets, you may proceed to this link: <a href="http://goo.gl/forms/hck0nqYTXw">http://goo.gl/forms/hck0nqYTXw</a></p>
        <p class="lead">Payment</p>    
        <ol>
          <li>
            <p>iBanking</p>
            <ul>
              <li>Please transfer the total amount to POSB Savings 032-62536-3 within 3 days of receiving this confirmation email. Please reply <strong>dpsponsorship@eusoff.nus.edu.sg</strong> with an attachment of a photo of your receipt or reference number for account purposes.
              </li>
            </ul>
          </li>
          <li>
            <p>Cash</p>
            <ul>
              <li>
                <p>Ticketing & Merchandise Sales Booth @ UTown in Week 1:</p>
                <p style="color:red; font-weight:500">Week 1: 12 & 13 Jan (Tues & Wed), 11am - 2pm.</p>
              </li>
              <li>
                <p>Ticketing Booths will be set up at the Dining Hall on the following days (for Eusoffians only)</p>
                <p style="color:red; font-weight:500">Week 2: 19 & 21 Jan (Tues & Thurs), 6 - 8pm.</p>
                <p style="color:red; font-weight:500">Week 3: 26 & 28 Jan (Tues & Thurs), 6 - 8pm.</p>

              </li>
            </ul>
          </li>
        </ol> 

    <p class="lead">Collect</p>    
        <ol>
          <li>
            <p>Collection for Ticketing, Stickers, Public Shirt</p>
            <ul>
              <li>Ticketing Booths set up at Dining Hall (Eusoffians only) </li>
              <li>Mailing (Only for those who have opted for mailing) </li>
              <li>Front of house on performance day
                  <ul>
                    <li>The registration booth will be open from 6.15 pm onwards on 5th Feb (Fri).</li>
                  </ul>
              </li>
            </ul>
          </li>
          <li>
            <p>Collection Booths for Flowers on show day</p>
          </li>
        </ol> 


        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-5">
          <p style="font-weight:500; font-size:18px">Gladys Tan
Marketing Head <br>
Eusoff Hall Dance Production 2016<br>
81687856 (HP)</p>
        </div>
        </div>
        <hr>
        Eusoffworks © 2015
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script>
        $.ajax({
            method: 'GET',
            url: 'include/get_real_seat_name.php',
            data: {seat_code: '<?php echo $seats->all_seat_code;?>'}
        }).then(function(seats_real_names) {
            $("#all_seat").html(seats_real_names);
        });
    </script>
  </body>
</html>