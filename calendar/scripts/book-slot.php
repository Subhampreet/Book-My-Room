<?php
    // include db connection
    include('./db.php');

    // declaring variables
    $day = 0;
    $month = "";
    $fname = "";
    $lname = "";
    $email = "";
    $address = "";
    $rooms = 0;
    $payment = "";
    $total = 0;
    $createdAt = date('Y-m-d H:i');

    // getting form data
    if(isset($_POST['day'])) {
        $day = $_POST['day'];
    }

    if(isset($_POST['month'])) {
        $month = $_POST['month'];
    }

    if(isset($_POST['fname'])) {
        $fname = $_POST['fname'];
    }

    if(isset($_POST['lname'])) {
        $lname = $_POST['lname'];
    }

    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if(isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    if(isset($_POST['rooms'])) {
        $rooms = $_POST['rooms'];
    }

    if(isset($_POST['payment'])) {
        $payment = $_POST['payment'];
    }

    $total = $rooms*2000;

    if($day != 0 && $month != "" && $fname != "" && $lname != "" && $address != "" && $rooms != 0 && $payment != "") {

        // inserting into the database!
        $insertBooking = "INSERT INTO `bookings`(`day`,`month`,`fname`,`lname`,`email`,`address`,`rooms`,`payment`,`total_price`,`createdAt`) VALUES('$day','$month','$fname','$lname','$email','$address','$rooms','$payment','$total','$createdAt')";
        $insertBookingStatus = mysqli_query($conn,$insertBooking) or die(mysqli_error($conn));

        if($insertBookingStatus) {

            header('Location: ../success.php?message=Booking done successfully!&day='.$day.'&month='.$month);

        } else {

            header('Location: ../index.php?message=Unable to book the slot!');

        }

    } else {

        header('Location: ../index.php?message=Please fill in all the details!');

    }
?>