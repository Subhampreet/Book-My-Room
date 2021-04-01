<?php
    // include db connection
    include('../../scripts/db.php');

    // session start
    session_start();

    // declaring variables
    $email = "";
    $password = "";
    $salt = "";

    // get form data
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    // checking if the fields are empty or not!
    if($email != "" && $password != "") {

        // get user details!
        $getUser = "SELECT * FROM `users` WHERE `email` = '$email'";
        $getUserStatus = mysqli_query($conn,$getUser) or die(mysqli_error($conn));
        
        if(mysqli_num_rows($getUserStatus) > 0) {

            $getUserRow = mysqli_fetch_assoc($getUserStatus);
            $salt = $getUserRow['salt'];
            $dbPassword = $getUserRow['password'];

            $newPassword = md5(md5($password.$salt));

            if($dbPassword == $newPassword) {

                $_SESSION['email'] = $email;
                header('Location: ../../booking/index.php?message=Logged in successfully!');

            } else {

                header('Location: ../index.php?message=Password is incorrect!');

            }

        } else {

            header('Location: ../index.php?message=User is not registered!');

        }

    } else {

        header('Location: ../index.php?message=Please fill all the details!');

    }
?>