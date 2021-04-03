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
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>bookMy<span><b>Room</b></span></h1>
						</div>
						<form action = "./scripts/booking.php" method = "POST">
							<div class="form-group">
								<div class="form-checkbox">
									<label for="roundtrip">
										<input type="radio" id="roundtrip" name="roomFor">
										<span></span>Single
									</label>
									<label for="one-way">
										<input type="radio" id="one-way" name="roomFor">
										<span></span>Married Couple
									</label>
									<label for="multi-city">
										<input type="radio" id="multi-city" name="roomFor">
										<span></span>Family(4 Members)
									</label>
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name = "name" value = "<?=$userName?>" required/>
								<span class="form-label">NAME</span>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name = "number" required/>
								<span class="form-label">CONTACT NUMBER</span>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" type="number" name = "day" required/>
										<span class="form-label">Day</span>
									</div>
								</div>
								<div class="col-md-4">
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
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input class="form-control" type="number" name = "stay" required/>
										<span class="form-label">Stay</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" name = "roomType" required>
											<option value = "Single">Single Room</option>
											<option value = "Executive">Executive Suite</option>
											<option value = "Presidential">Presidential Suite</option>
											<option value = "Junior">Junior Suite</option>
											<option value = "Deluxe">Deluxe Suite</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">ROOM TYPE</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" name = "adults" required>
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Adults</span>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" name = "children" required>
											<option>0</option>
											<option>1</option>
											<option>2</option>
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Children</span>
									</div>
								</div>
							</div>
							<div class="book-btn">
								<div class="form-btn">
									<button class="submit-btn-main">BOOK NOW</button>
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