<?php
  // first check has data
  if ($_POST['data'] == "") {
    header("location: ticket.php"); 
  }
    require_once("include/db.php");

    try {
        $data = json_decode($_POST['data']);
        // security check e.g whether the price is correct

        // first create user
        $user_id = create_user($data->email, $data->name, json_encode($data->collect), json_encode($data->items), json_encode($data->additional_info));

        // second create booking
        // get all seat code
        $all_seat_code = "";
        foreach($data -> select_seat  as $seat_code => $value) {
          $all_seat_code = $all_seat_code . "," . $seat_code;
        }
        $all_seat_code = substr($all_seat_code, 1, strlen($all_seat_code) - 1); // delete the beginning ','

        $total_price = $data -> total_price;

        // store_booking
        $booking_id = store_booking($user_id, $all_seat_code, $total_price);

        // third change seat status
        foreach($data -> select_seat  as $seat_code => $value) {
          change_seat_status($seat_code, SEAT_STATUS_BOOKED, $user_id);
        }

        header("location: booking_redirect.php?status=success&booking_id="  . $booking_id . "&total_price=" . $total_price);
    } catch (Exception $e) {
        header("location: booking_redirect.php?status=error");
    }


?>
