<?php
    // include db connection
    include('../../scripts/db.php');

    // declare variables
    $bookingId = "";
    $totalPrice = "";

    // getting form data!
    if(isset($_POST['id'])) {
        $bookingId = $_POST['id'];
    }

    if(isset($_POST['totalPrice'])) {
        $totalPrice = $_POST['totalPrice'];
    }

    // check empty
    if($bookingId != "" && $totalPrice != "") {

        // update booking!
        $updateBooking = "UPDATE `bookings` SET `totalPrice` = '$totalPrice' WHERE `id` = '$bookingId'";
        $updateBookingStatus = mysqli_query($conn,$updateBooking) or die(mysqli_error($conn));

        if($updateBookingStatus) {

            header('Location: ../../booking/index.php?message=Booking successful!');

        } else {

            header('Location: ../index.php?message=Unable to confirm booking!');

        }

    } else {

        header('Location: ../index.php?message=Please fill all the required details!');

    }
?>