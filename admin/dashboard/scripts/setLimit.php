<?php
    // include db connection!
    include('../../../scripts/db.php');

    // session start!
    session_start();

    // declare variables!
    $month = "";
    $roomType = "";
    $roomLimit = 0;

    // get form data!
    if(isset($_POST['month'])) {
        $month = $_POST['month'];
    }

    if(isset($_POST['roomType'])) {
        $roomType = $_POST['roomType'];
    }

    if(isset($_POST['roomLimit'])) {
        $roomLimit = $_POST['roomLimit'];
    }

    // check if the fields are empty or not!
    if($month != "" && $roomType != "" && $roomLimit != 0) {

        $checkLimit = "SELECT * FROM `capacity` WHERE `month` = '$month' AND `roomType` = '$roomType'";
        $checkLimitStatus = mysqli_query($conn,$checkLimit) or die(mysqli_error($conn));

        if(mysqli_num_rows($checkLimitStatus) > 0) {
             
            // update limit!
            $updateLimit = "UPDATE `capacity` SET `roomLimit` = '$roomLimit' WHERE `month` = '$month' AND `roomType` = '$roomType'";
            $updateLimitStatus = mysqli_query($conn,$updateLimit) or die(mysqli_error($conn));

            if($updateLimitStatus) {

                header('Location: ../roomLimit.php?message=Limit Updated!');

            } else {

                header('Location: ../roomLimit.php?message=Unable to update limit!');

            }

        } else {

            // insert into the database!
            $insertLimit = "INSERT INTO `capacity`(`month`,`roomType`,`roomLimit`) VALUES('$month','$roomType','$roomLimit')";
            $insertLimitStatus = mysqli_query($conn,$insertLimit) or die(mysqli_error($conn));

            if($insertLimitStatus) {

                header('Location: ../roomLimit.php?message=Limit entered into the database!');

            } else {

                header('Location: ../roomLimit.php?message=Unable to insert limit!');

            }
        }

    } else {

        header('Location: ../roomLimit.php?message=Please fill all the details properly!');

    }
?>