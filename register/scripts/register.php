<?php
    // include db connection
    include('../../scripts/db.php');

    // declare variables
    $name = "";
    $email = "";
    $password = "";
    $salt = uniqid();
    $createdAt = date('Y-m-d H:i');

    // getting form data
    if(isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    // checking if the fields are not empty!
    if($name != "" && $email != "" && $password != "") {

        // check if user exists or not!
        $checkUser = "SELECT * FROM `users` WHERE `name` = '$name' OR `email` = '$email'";
        $checkUserStatus = mysqli_query($conn,$checkUser) or die(mysqli_error($conn));

        if(mysqli_num_rows($checkUserStatus) > 0) {

            header('Location: ../index.php?message=User already exists!');

        } else {

            $newPassword = md5(md5($password.$salt));
            
            // insert user into the database!
            $insertUser = "INSERT INTO `users`(`name`,`email`,`password`,`salt`,`createdAt`) VALUES('$name','$email','$newPassword','$salt','$createdAt')";
            $insertUserStatus = mysqli_query($conn,$insertUser) or die(mysqli_error($conn));
            if($insertUser) {
                
                header('Location: ../../login/index.php?message=Successfully registered!');

            } else {

                header('Location: ../index.php?message=Unable to register user!');

            }

        }

    } else {

        header('Location: ../index.php?message=Please fill all the details properly!');

    }
?>