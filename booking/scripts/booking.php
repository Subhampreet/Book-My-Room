<?php
    // include db connection
    include('../../scripts/db.php');

    // declare variables
    $roomFor = "";
    $name = "";
    $number = "";
    $day = 0;
    $month = "";
    $stay = 0;
    $roomType = "";
    $adults = 0;
    $children = 0;
    $bookedAt = date('Y-m-d H:i');

    // getting form data!
    if(isset($_POST['roomFor'])) {
        $roomFor = $_POST['roomFor'];
    }

    if(isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if(isset($_POST['number'])) {
        $number = $_POST['number'];
    }

    if(isset($_POST['day'])) {
        $day = $_POST['day'];
    }

    if(isset($_POST['month'])) {
        $month = $_POST['month'];
    }

    if(isset($_POST['stay'])) {
        $stay = $_POST['stay'];
    }

    if(isset($_POST['roomType'])) {
        $roomType = $_POST['roomType'];
    }

    if(isset($_POST['adults'])) {
        $adults = $_POST['adults'];
    }

    if(isset($_POST['children'])) {
        $children = $_POST['children'];
    }

    // check empty
    if($roomFor != "" && $name != "" && $number != "" && $day != 0 && $month != "" && $stay != 0 && $roomType != "" && $adults != 0) {   

        // insert into the database!
        $bookRoom = "INSERT INTO `bookings`(`roomFor`,`name`,`number`,`day`,`month`,`stay`,`roomType`,`adults`,`children`,`bookedAt`) VALUES('$roomFor','$name','$number','$day','$month','$stay','$roomType','$adults','$children','$bookedAt')";
        $bookRoomStatus = mysqli_query($conn,$bookRoom) or die(mysqli_error($conn));
        
        if($bookRoomStatus) {

            // get latest entry id!
            $getbooking = "SELECT `id` FROM `bookings` ORDER BY `bookedAt` DESC LIMIT 1";
            $getbookingStatus = mysqli_query($conn,$getbooking) or die(mysqli_error($conn));
            $getbookingRow = mysqli_fetch_assoc($getbookingStatus);
            $bookingId = $getbookingRow['id'];

            header('Location: ../../checkout/index.php?id='.$bookingId);

        } else {

            header('Location: ../index.php?message=Unable to process your request right now. Please try again later!');

        }

    } else {

        header('Location: ../index.php?message=Please fill in the details properly!');

    }
?>