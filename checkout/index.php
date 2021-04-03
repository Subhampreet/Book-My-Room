<?php
  // include db connection
  include('../scripts/db.php');

  // session start
  session_start();

  // getting id of the booking made!
  $bookingId = $_GET['id'];

  // check if user is logged in or not!
  if(isset($_SESSION['email'])) {
    
	$email = $_SESSION['email'];
	// get user name
	$getUser = "SELECT * FROM `users` WHERE `email` = '$email'";
	$getUserStatus = mysqli_query($conn,$getUser) or die(mysqli_error($conn));
	$getUserRow = mysqli_fetch_assoc($getUserStatus);
	$userName = $getUserRow['name'];
  
  } else {

    header('Location: ../login/index.php?message=Login first!');

  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body onLoad = "opensnack()">
	<div id="booking" class="section">
		<?php
			include('../common/message.php');
		?>
		<?php
			// fetching the booking details!
			$getBooking = "SELECT * FROM `bookings` WHERE `id` = '$bookingId'";
			$getBookingStatus = mysqli_query($conn,$getBooking) or die(mysqli_error($conn));
			$getBookingRow = mysqli_fetch_assoc($getBookingStatus);
			$stay = $getBookingRow['stay'];
			$type = $getBookingRow['roomType'];

			// get price of given room type!
			$getPrice = "SELECT * FROM `roomprices` WHERE `type` = '$type'";
			$getPriceStatus = mysqli_query($conn,$getPrice) or die(mysqli_error($conn));
			$getPriceRow = mysqli_fetch_assoc($getPriceStatus);
			$roomprice = $getPriceRow['price'];

			$totalPrice = $stay*$roomprice;
		?>
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>bookMy<span><b>Room</b></span></h1>
						</div>
						<h4>
							Final Pricing
						</h4>
						<p style = "color: #ffffff"><?=$type?> <span class="price"><?=$stay?>*<?=$roomprice?></span></p>
						<hr>
      					<p style = "color: #ffffff">Total <span class="price" style="color:#ffffff"><b><?=$totalPrice?></b></span></p>
						<form action="./scripts/confirmBooking.php" method = "POST">
							<input type="hidden" name = "id" value = "<?=$bookingId?>"/>
							<input type="hidden" name = "totalPrice" value = "<?=$totalPrice?>"/>
							<button type = "submit" class = "submit-btn-main">Confirm Booking</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>