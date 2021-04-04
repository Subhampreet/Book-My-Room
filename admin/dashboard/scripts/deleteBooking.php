<?php
    // include db connection!
    include('../../../scripts/db.php');

    // session start!
    session_start();

    // get id of the booking!
    $bookingId = $_GET['id'];

    if($bookingId != 0) {

        // delete booking!
        $deleteBooking = "DELETE FROM `bookings` WHERE `id` = '$bookingId'";
        $deleteBookingStatus = mysqli_query($conn,$deleteBooking) or die(mysqli_error($conn));
        
        if($deleteBookingStatus) {

            header('Location: ../index.php?message=Booking deleted successfully!');

        } else {

            header('Location: ../index.php?message=Unable to delete booking!');

        }

    } else {

        header('Location: ../index.php?message=Some error occured! Try Again later!');

    }
?>