<?php
    // include db connection!
    include('../../scripts/db.php');

    // declare variables!
    $month = "";

    // get month selected!
    if(isset($_POST['month'])) {
        $month = $_POST['month'];
    }

    // check if month field is not empty!
    if($month != "") {

        header('Location: ../pick-date.php?message=Select a date&&month='.$month);

    } else {

        header('Location: ../index.php?message=Please enter a month!');

    }
?>