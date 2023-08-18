<?php
include_once "../includes/header.php";
require_once "../includes/config.php";


if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$room = $pdo->query("SELECT * FROM rooms WHERE status = 1 AND id = '$id'");
	$room->execute();

	$singleRoom = $room->fetch(PDO::FETCH_OBJ);

	//Grabbing Utilities

	$utilities = $pdo->query("SELECT * FROM utilities WHERE room_id='$id'");
	$utilities->execute();

	$allUtilities = $utilities->fetchAll(PDO::FETCH_OBJ);
}



if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty($_POST['phone_number']) || empty($_POST['full_name']) || empty($_POST['check_in']) || empty($_POST['check_out'])) {
		echo "<script>alert('One Or More Input Are Empty')</script>";
	} else {

		$check_in = date_create($_POST['check_in']);
		$check_out = date_create($_POST['check_out']);
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$full_name = $_POST['full_name'];
		$hotel_name = $singleRoom->hotel_name;
		$room_name = $singleRoom->name;
		$user_id = $_SESSION['id'];
		$status = "Pending";
		$payment = $singleRoom->price;
		$days = date_diff($check_in, $check_out);


		//Price through Session

		$_SESSION['price'] = $singleRoom->price * intval($days->format('%R%a days'));



		if (date("Y/m/d") > $check_in || date("Y/m/d") > $check_out) {
			echo "<script>alert('Pick the correct dates')</script>";
		} else {
			if ($check_in > $check_out || $check_in == date("Y/m/d")) {
				echo "<script>alert('You cant cechk in on today date')</script>";
			} else {
				$booking = $pdo->prepare("INSERT INTO bookings (check_in, check_out, email, phone_number, full_name, hotel_name, room_name ,status , payment, user_id) VALUES(:check_in, :check_out, :email, :phone_number, :full_name, :hotel_name, :room_name, :status, :payment, :user_id)");
				$booking->execute([
					":check_in" => $_POST['check_in'],
					":check_out" => $_POST['check_out'],
					":email" => $email,
					":phone_number" => $phone_number,
					":full_name" => $full_name,
					":hotel_name" => $hotel_name,
					":room_name" => $room_name,
					":status" => $status,
					":payment" => $_SESSION['price'],
					":user_id" => $user_id,
				]);

				echo "<script>window.location.href='" . APPURL . "/rooms/pay.php'</script>";
			}
		}
	}
}


?>


<img src="../includes/config.php" alt="" srcset="">

<div class="headerSingleR" style="background-image: url('<?php echo APPURL; ?>/<?php echo $singleRoom->img; ?>');">

	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
			<div class="col-md-7 ftco-animate">
				<h2 class="subheading">Welcome to Vacation Rental</h2>
				<h1 class="mb-4"><?php echo $singleRoom->name; ?></h1>
				<!-- <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p> -->
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row  justify-content-end ">
			<div class="col-lg-4 ">
				<form action="room-single.php?id=<?php echo $id; ?>" method="POST" class="appointment-form" style="margin-top: -568px;">
					<h3 class="mb-3 display-5 text-primary">Book this room</h3>
					<div class="row">
						<div class="col-md-12 mt-3">
							<div class="form-group">
								<input type="text" name="email" class="form-control" placeholder="Email">
							</div>
						</div>

						<div class="col-md-12 mt-3">
							<div class="form-group">
								<input type="text" name="full_name" class="form-control" placeholder="Full Name">
							</div>
						</div>

						<div class="col-md-12 mt-3">
							<div class="form-group">
								<input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
							</div>
						</div>

						<div class="col-md-6 mt-3">
							<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="ion-md-calendar"></span></div>
									<input type="text" name="check_in" class="form-control appointment_date-check-in" placeholder="Check-In">
								</div>
							</div>
						</div>

						<div class="col-md-6 mt-3">
							<div class="form-group">
								<div class="icon"><span class="ion-md-calendar"></span></div>
								<input type="text" name="check_out" class="form-control appointment_date-check-out" placeholder="Check-Out">
							</div>
						</div>

						<div class="col-md-6 mt-3">
							<div class="form-group date" id="datepicker">

								<input type="text" name="checkOut" class="form-control" placeholder="Check-Out">
							</div>
						</div>







						<div class="col-md-12 mt-3">
							<div class="form-group d-grid ">
								<input type="submit" name="submit" value="Book and Pay Now" class="btn btn-primary py-3 px-4 text-white fw-bold">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>






<section class="ftco-section bg-light">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-6 wrap-about">
				<div class="img img-2 mb-4" style="background-image: url(<?php echo APPURL; ?>/images/image_2.jpg);">
				</div>
				<h2>The most recommended vacation rental</h2>
				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
			</div>
			<div class="col-md-6 wrap-about ftco-animate">


				<div class="heading-section">
					<div class="pl-md-5">
						<h2 class="mb-2">What we offer</h2>
					</div>
				</div>
				<div class="pl-md-5">
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<div class="row">
						<?php foreach ($allUtilities as $utility) : ?>
							<div class="services-2 col-lg-6 d-flex w-100">
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="<?php echo $utility->icon; ?>"></span>
								</div>
								<div class="media-body pl-3">
									<h3 class="heading"><?php echo $utility->name; ?></h3>
									<p><?php echo $utility->description; ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-intro" style="background-image: url(<?php echo APPURL; ?>/images/image_2.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-9 text-center">
				<h2>Ready to get started</h2>
				<p class="mb-4">It’s safe to book online with us! Get your dream stay in clicks or drop us a line with your questions.</p>
				<p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Learn More</a> <a href="#" class="btn btn-white px-4 py-3">Contact us</a></p>
			</div>
		</div>
	</div>
</section>

<div class="NinjaCont">
	<h1>CodingNinjas</h1>
	<div class="row">
		<div class="col-md-4">
			<div class="input-group date" id="datepicker">
				<input type="text" class="form-control" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar" style="cursor: pointer;"></span>
				</span>
			</div>
		</div>
		<div class="col-md-4">
			<div class="text">Pick a date fellow Ninja!</div>
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzRH_HN5yt91p9oa385FIF2j2qkpUpec5V6zYal_oNuqsAaHyt6P4ZIoCKtP_4FvWC6gI&usqp=CAU" alt="" />
		</div>
	</div>
</div>



<script>
	$(document).ready(function() {
		initializeDatepicker();
	});

	function initializeDatepicker() {
		$(".appointment_date-check-out").datepicker({
			format: "dd-mm-yyyy",
			todayHighlight: true,
			startDate: "01-01-2023",
			endDate: "01-01-2024",
		}).on('change', function(e) {
			// Trigger the input blur event to close the datepicker calendar
			$(this).blur();
		});
	}
</script>

<?php
include_once "../includes/footer.php";
?>