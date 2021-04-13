<?php
    // include db connection
    include('../../../scripts/db.php');

    // session start
    session_start();

    // declaring variables!
    $email = "";
    $password = "";

    // getting form data!
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    // checking for empty fields!
    if($email != "" && $password != "") {

        $checkUser = "SELECT * FROM `admin` WHERE `email` = '$email'";
        $checkUserStatus = mysqli_query($conn,$checkUser) or die(mysqli_error($conn));

        if(mysqli_num_rows($checkUserStatus) > 0) {

            // get db password
            $checkUserRow = mysqli_fetch_assoc($checkUserStatus);
            $dbPassword = $checkUserRow['password'];

            if($dbPassword == $password) {

                $_SESSION['admin'] = $email;
                header('Location: ../../dashboard/index.php?message=Logged in successfully!');

            } else {

                header('Location: ../index.php?message=Password is incorrect!');

            }

        } else {

            header('Location: ../index.php?message=User does not exist!');

        }

    } else {

        header('Location: ../index.php?message=Please fill all the required details!');

    }
?>