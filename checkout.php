<?php
  // first check has data
  if ($_POST['data'] == "") {
    header("location: ticket.php"); 
  }
    require_once("include/db.php");

    try {
        $data = json_decode($_POST['data']);
        // security check e.g whether the price is correct
        if (!verify_price($data)) {
            throw new Exception("Error Processing Request", 1);          
        }

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

    function verify_price($data) {
        $prices = [ "flower_1" => 5,
                    "flower_2" => 3.5,
                    "flower_3" => 15,
                    "flower_4" => 2.5,
                    "flower_5" => 12,
                    "flower_6" => 5,
                    "flower_7" => 12,
                    "flower_8" => 5,
                    "flower_9" => 12,
                    "shirt_xxs" => 15,
                    "shirt_xs" => 15,
                    "shirt_s" => 15,
                    "shirt_m" => 15,
                    "shirt_l" => 15,
                    "shirt_xl" => 15,
                    "sticker1" => 1,
                    "sticker2" => 1,
                    "sticker3" => 1,
                    "sticker4" => 1,
                    "sticker5" => 1,
                    "registered_mail" => 1.5,
                    "Cat $28 seat" => 28,
                    "Cat $25 seat" => 25,
                    "Cat $25 wheel chair seat" => 25
                    ];

        $prices_from_data = 0;

        foreach($data -> items  as $name => $value) {
          $prices_from_data = $prices_from_data + $prices[$name] * $value->quantity;
        }

        if ($data->collect->mail_type == "Registered Mail") {
            $prices_from_data = $prices_from_data + $prices["registered_mail"];
        }

        foreach($data -> select_seat  as $seat_code => $value) {
            $prices_from_data = $prices_from_data + $prices[$value->s_category];
        }

        return equal($prices_from_data, $data->total_price, 0.01);
    }

    function equal($a, $b, $offset) {
        return abs($a - $b) <= $offset;
    }

?>
