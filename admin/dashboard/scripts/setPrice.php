<?php
    // include db connection!
    include('../../../scripts/db.php');

    // session start!
    session_start();

    // declare variables!
    $type = "";
    $price = 0;

    // get form data!
    if(isset($_POST['type'])) {
        $type = $_POST['type'];
    }

    if(isset($_POST['price'])) {
        $price = $_POST['price'];
    }

    // check if the fields are empty or not!
    if($type != "" && $price != 0) {

        $checkPrice = "SELECT * FROM `roomprices` WHERE `type` = '$type'";
        $checkPriceStatus = mysqli_query($conn,$checkPrice) or die(mysqli_error($conn));

        if(mysqli_num_rows($checkPriceStatus) > 0) {
             
            // update limit!
            $updatePrice = "UPDATE `roomprices` SET `price` = '$price' WHERE `type` = '$type'";
            $updatePriceStatus = mysqli_query($conn,$updatePrice) or die(mysqli_error($conn));

            if($updatePriceStatus) {

                header('Location: ../setPrice.php?message=Price Updated!');

            } else {

                header('Location: ../setPrice.php?message=Unable to update price!');

            }

        } else {

            // insert into the database!
            $insertPrice = "INSERT INTO `roomprices`(`type`,`price`) VALUES('$type','$price')";
            $insertPriceStatus = mysqli_query($conn,$insertPrice) or die(mysqli_error($conn));

            if($insertPriceStatus) {

                header('Location: ../setPrice.php?message=Price entered into the database!');

            } else {

                header('Location: ../setPrice.php?message=Unable to insert price!');

            }
        }

    } else {

        header('Location: ../setPrice.php?message=Please fill all the details properly!');

    }
?>