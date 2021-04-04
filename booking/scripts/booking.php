<?php
    // include db connection
    include('../../scripts/db.php');

    // declare variables
    $roomFor = "";
    $name = "";
    $number = "";
    $aadhar = "";
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

        // check if room in that particular day is not full!
        $numberOfBookings = 0;
        $checkAvailability = "SELECT * FROM `bookings` WHERE `day` = '$day' AND `month` = '$month' AND `roomType` = '$roomType'";
        $checkAvailabilityStatus = mysqli_query($conn,$checkAvailability) or die(mysqli_error($conn));
        while($checkAvailabilityRow = mysqli_fetch_assoc($checkAvailabilityStatus)) {
            $numberOfBookings = $numberOfBookings + 1;
        }

        // check no of bookings for one day
        $roomLimit = 0;
        $checkNoBookings = "SELECT * FROM `capacity` WHERE `month` = '$month' AND `roomType` = '$roomType'";
        $checkNoBookingsStatus = mysqli_query($conn,$checkNoBookings) or die(mysqli_error($conn));
        $checkNoBookingsRow = mysqli_fetch_assoc($checkNoBookingsStatus);
        $roomLimit = $checkNoBookingsRow['roomLimit'];
        
        if($numberOfBookings < $roomLimit) {

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

            header('Location: ../index.php?message=No rooms available on this date!');

        }

    } else {

        header('Location: ../index.php?message=Please fill in the details properly!');

    }
?>