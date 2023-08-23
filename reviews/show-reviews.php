<?php


include_once '../includes/header.php';
include_once '../includes/config.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $room = $pdo->query("SELECT * FROM rooms WHERE status = 1 AND id = '$id'");
    $room->execute();

    $singleRoom = $room->fetch(PDO::FETCH_OBJ);

    $hotel = $pdo->query("SELECT * FROM hotels WHERE status = 1 AND id = '$id'");
    $hotel->execute();
    $singleHotel = $hotel->fetch(PDO::FETCH_OBJ);

    //Grabbing Utilities

    $utilities = $pdo->query("SELECT * FROM utilities WHERE room_id='$id'");
    $utilities->execute();

    $allUtilities = $utilities->fetchAll(PDO::FETCH_OBJ);

    $hotels = $pdo->query("SELECT * FROM hotels");
    $hotels->execute();
    $allHotels = $hotels->fetchAll(PDO::FETCH_OBJ);
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

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed:" . $e->getMessage());
}

function getRoomsByHotel($pdo, $hotelId)
{
    $sql = "SELECT * FROM rooms WHERE hotel_id = :hotelId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
    $stmt->execute();
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rooms;
}

function getRoomAttributes($pdo, $roomName)
{
    $sql = "SELECT * FROM rooms WHERE name = :roomName";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':roomName', $roomName, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}



$starIcon = '<i class="fa-solid fa-star text-warning"></i>';
?>

<header class="header" style="background-image: url(<?php echo APPURL; ?>/<?php echo $singleHotel->image; ?>);">
    <!--Hero-->

    <div class="container ">
        <div class="row  d-flex flex-column justify-content-center" style="height: 500px;">
            <div class=" col-lg-6 ">

                <form action="room-single.php?id=<?php echo $id; ?>" method="POST" class="appointment-form">
                    <div class="col-lg-12 mt-3">
                        <input type="text" name="email" class="form-control" placeholder="Type Your Email">
                    </div>

                    <div class="col-lg-12 mt-3">
                        <input type="text" name="full_name" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="col-lg-12 mt-3">
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="input-group my-3">
                        <input type="text" name="check_in" class="form-control appointment_date-check-in" placeholder="Check-In">
                        <span class="input-group-text">&</span>
                        <input type="text" name="check_out" class="form-control appointment_date-check-out" placeholder="Check-Out">

                    </div>

                    <div class=" d-grid mt-5">
                        <input type="submit" name="submit" value="Book and Pay Now" class="btn btn-primary py-3 px-4 text-white fw-bold text-uppercase">

                    </div>
                </form>

            </div>
        </div>
    </div>


</header>



<div class="container">
    <div class="row">
        <div class="col-md-9 col-lg-7 me-5 mb-5">

            <nav class="navbar mt-4">
                <ul class="d-flex gap-5 list-unstyled ">
                    <li class="nav-item"></li>

                    <a href="<?php echo APPURL; ?>/rooms/room-single.php?id=<?php echo $singleRoom->id; ?>" class="singleRoomNav">Details</a>

                    </li>
                    <li class="nav-item"></li>
                    <a href="<?php echo APPURL; ?>/compareRoom.php?id=<?php echo $singleRoom->id; ?>" class="singleRoomNav">Compare</a>
                    </li>

                    <li class="nav-item"></li>
                    <a href="<?php echo APPURL; ?>/reviews.php?id=<?php echo $singleRoom->id; ?>" class="singleRoomNav">Reviews</a>
                    </li>


                </ul>

            </nav>


            <hr>
            <div class="headingTop ">


                <h1>Room Reviews</h1>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">

                                    <form method="POST" action="<?php echo APPURL; ?>/reviews/create-reviews.php" enctype="multipart/form-data">
                                        <!-- Email input -->

                                        <select name="hotel_id" class="form-control">
                                            <option value="">Choose Hotel Name</option>
                                            <?php foreach ($allHotels as $hotel) : ?>
                                                <option value="<?php echo $hotel->id; ?>"><?php echo $hotel->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="form-outline mt-4">
                                            <input type="file" name="image" id="form2Example1" class="form-control" />
                                            <img src="./review_images/" alt="" srcset="">
                                        </div>

                                        <div class="form-outline mb-4 ">
                                            <input type="text" name="client_name" id="form2Example1" class="form-control" placeholder="Enter Your Name" />

                                        </div>

                                        <div class="form-outline mb-4 mt-4">
                                            <input type="text" name="position" id="form2Example1" class="form-control" placeholder="What Is Your Occupation" />

                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" id="textarea" name="user_review" rows="3" placeholder="Please Leave Your Review"></textarea>
                                        </div>
                                        <div class="form-outline mb-4 mt-4 ms-2">
                                            <div class="rating">
                                                <input type="radio" name="star_rating" value="5" id="5"><label for="5">☆</label>
                                                <input type="radio" name="star_rating" value="4" id="4"><label for="4">☆</label>
                                                <input type="radio" name="star_rating" value="3" id="3"><label for="3">☆</label>
                                                <input type="radio" name="star_rating" value="2" id="2"><label for="2">☆</label>
                                                <input type="radio" name="star_rating" value="1" id="1"><label for="1">☆</label>
                                            </div>

                                        </div>


                                        <br>
                                        <div class="d-grid">
                                            <!-- Submit button -->
                                            <button type="submit" name="submit" class="btn btn-primary text-white text-uppercase mb-4 text-center">Submit Your Review</button>

                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
        <div class="col-md-4 col-lg-4 mt-3">



            <hr>



            <div class="sidebar">
                <div class="col bg-secondary mt-4 py-3 px-3 text-white rounded-3">
                    <p class="fw-bold fs-4">Why Stay With Us</p>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-user me-3"></i> Max People: <?php echo $singleRoom->num_persons; ?></li>
                        <li><i class="fa-solid fa-eye me-3"></i>View: <?php echo $singleRoom->view; ?></li>
                        <li><i class="fa-solid fa-van-shuttle me-3"></i>Pickup: <?php echo $singleRoom->view; ?> </li>
                        <li><i class="fa-solid fa-maximize me-3"></i>Room Size: <?php echo $singleRoom->size; ?></li>

                    </ul>


                </div>

                <div class="col bg-primary mt-4 px-3 py-3 text-white rounded-3 mb-5">
                    <p class="fw-bold fs-4">Wanna Now More?</p>

                    <p>Please do not hesitate to contact us. We are here to assist you and answer any questions or concerns you may have. Your satisfaction and comfort are our top priorities, and we are committed to making your experience with us unforgettable. Reach out to our friendly team, and we'll be delighted to assist you in any way we can.</p>

                    <h4 class="text-white"><i class="fa-solid fa-phone-volume me-3"></i> +12 345 6789</h4>
                    <h4 class="text-white"><i class="fa-solid fa-envelope me-3"></i>info@pristineescapes.co.za</h4>
                </div>
            </div>
        </div>

    </div>
</div>



<?php
include_once '../includes/footer.php';

?>