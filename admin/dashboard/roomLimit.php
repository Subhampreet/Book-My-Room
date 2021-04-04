<?php

  // include db connection
  include('../../scripts/db.php');

  // session start
  session_start();

  // check for session!
  if(!isset($_SESSION['admin'])) {
    header('Location: ../admin-login/index.php?message=Please login first!');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- snackbar -->
    <link rel="stylesheet" href="../snackbar.css">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body onLoad = "opensnack()">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">bookMy<span>Room</span></a>
  <!-- <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"> -->
    <!-- <span class="navbar-toggler-icon"></span> -->
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="btn btn-primary" href="../logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
    <?php
      include('../../common/message.php');
    ?>
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="./">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./roomLimit.php">
              <span data-feather="file"></span>
              Set Room Limit <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./setPrice.php">
              <img src="./list.svg" style = "color: #ffffff"/>
              Set Prices
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Room Prices</h1>
      </div>

      <form action="./scripts/setLimit.php" method = "POST">
        <div class="form-group">
            <select class="form-control" name = "month" required>
                <option value = "January">January</option>
                <option value = "February">February</option>
                <option value = "March">March</option>
                <option value = "April">April</option>
                <option value = "May">May</option>
                <option value = "June">June</option>
                <option value = "July">July</option>
                <option value = "August">August</option>
                <option value = "September">September</option>
                <option value = "October">October</option>
                <option value = "November">November</option>
                <option value = "December">December</option>
            </select>
            <span class="select-arrow"></span>
            <span class="form-label">Month</span>
        </div>

        <div class="form-group">
            <select class="form-control" name = "roomType" required>
                <option value = "Single">Single Room</option>
                <option value = "Executive">Executive Suite</option>
                <option value = "Presidential">Presidential Suite</option>
                <option value = "Junior">Junior Suite</option>
                <option value = "Deluxe">Deluxe Suite</option>
            </select>
            <span class="select-arrow"></span>
            <span class="form-label">Room Type</span>
        </div>

        <div class="form-group">
            <input class="form-control" type="number" name = "roomLimit" required/>
			<span class="form-label">Room Limit</span>
        </div>

        <button class = "btn btn-primary" type = "submit">
            Submit
        </button> 
    </form><br/>
      
    <h2>Limits</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Month</th>
              <th>Room Type</th>
              <th>Room Limit</th>
            </tr>
          </thead>
          <tbody>
          <?php
            // get all the bookings!
            $getLimit = "SELECT * FROM `capacity`";
            $getLimitStatus = mysqli_query($conn,$getLimit) or die(mysqli_error($conn));
            while($getLimitRow = mysqli_fetch_assoc($getLimitStatus)) {
          ?>
            <tr>
              <td><?=$getLimitRow['month']?></td>
              <td><?=$getLimitRow['roomType']?></td>
              <td><?=$getLimitRow['roomLimit']?></td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>

    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
        <!-- Snackbar js -->
        <script src="../snackbar.js"></script>
</html>
