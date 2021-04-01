<?php
  // include db connection
  include('./scripts/db.php');

  // session start
  session_start();

  // check if user is logged in or not!
  if(isset($_SESSION['email'])) {
    
    $email = $_SESSION['email'];
  
  } else {

    header('Location: ../login/index.php?message=Login first!');

  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
<?php
  // getting all the months
  $getMonth = "SELECT * FROM `months`";
  $getMonthStatus = mysqli_query($conn,$getMonth) or die(mysqli_error($conn));
  while($getMonthRow = mysqli_fetch_assoc($getMonthStatus)) {
?>
<div class="month">      
  <ul>
    <li>
      <?=$getMonthRow["month"]?><br>
      <span style="font-size:18px">2021</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
  <?php
    $month = $getMonthRow['month'];
    for($x = 1;$x <= $getMonthRow["days"]; $x++){
      $checkBookings = "SELECT * FROM `bookings` WHERE `day` = '$x' AND `month` = '$month'";
      $checkBookingsStatus = mysqli_query($conn,$checkBookings) or die(mysqli_error($conn));
      if(mysqli_num_rows($checkBookingsStatus) > 0) {
  ?>
    <li><span class = "red-circle"><?=$x?></span></li>
  <?php
      } else {
  ?>
    <li><a class = "green-circle" href="book-date.php?day=<?=$x?>&month=<?=$getMonthRow["month"]?>"><?=$x?></a></li>
  <?php
      }
    }
  }
  ?>
</ul><br/>
</body>
</html>
