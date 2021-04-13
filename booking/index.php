<?php
  // include db connection
  include('../scripts/db.php');

  // session start
  session_start();

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
        <nav>
			<div class="nav-logo" data-aos="fade-down" data-aos-delay="300">
			bookMy<b>Room</b>
			</div>
			
			<a class="btn btn-primary res-nav-icon" href = "../logout.php" style="background-color: #da8413 !important;">Sign Out</a>
			
		</nav>
		<!-- <a href="" class = "btn btn-primary" style = "background-color: #fa8919 !important;border: #fa8919 !important;float: right;margin-right: 70px;margin-top: 20px;">Logout</a> -->
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>bookMy<span><b>Room</b></span></h1>
						</div>
						<form action = "./scripts/setMonth.php" method = "POST">
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
							<div class="book-btn">
								<div class="form-btn">
									<button class="submit-btn-main">Proceed</button>
								</div>
							</div>
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