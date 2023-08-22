<?php


include_once './includes/header.php';
include_once './includes/config.php';


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






?>

<header class="mainHeader" style="background: url(./img/mainBanner.jpg); height:500px;  background-position: center;
    background-size: cover;">
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
                <h4 class="mt-5 ">We Have Compared The Following Hotels For You</h4>
                <hr class="hr" width="300" />

            </div>

            <table class="table">

                <?php
                if (isset($_POST['compare'])) {
                    $roomName1 = $_POST['room1'];
                    $roomName2 = $_POST['room2'];

                    $room1Attributes = getRoomAttributes($pdo, $roomName1);
                    $room2Attributes = getRoomAttributes($pdo, $roomName2);

                    echo "
                <thead>
                <tr>
                    <th>Hotel Attributes</th>
                    <th>$roomName1</th>
                    <th>$roomName2</th>
                </tr>
                </thead>";




                    echo "
                <tbody>
                <tr>
                <td>Number of Persons</td>
                <td>{$room1Attributes['num_persons']}</td>
                <td>{$room2Attributes['num_persons']}</td>
                </tr>";

                    echo "<tr>
                <td>View</td>
                <td>{$room1Attributes['view']}</td>
                <td>{$room2Attributes['view']}</td>
                </tr>";

                    echo "<tr><td>Number of Beds</td>
                <td>{$room1Attributes['num_beds']}</td>
                <td>{$room2Attributes['num_beds']}</td>
                </tr>";

                    echo "<tr><td>WiFi</td>
                <td>" . ($room1Attributes['wifi'] ? 'Yes' : 'No') . "</td>
                <td>" . ($room2Attributes['wifi'] ? 'Yes' : 'No') . "</td>
                </tr>";

                    echo "<tr><td>Price</td>
                <td>{$room1Attributes['price']}</td>
                <td>{$room2Attributes['price']}</td>
                </tr>";

                    echo "<tr><td>Airport Pickups</td>
                <td>" . ($room1Attributes['pickups'] ? 'Yes' : 'No') . "</td>
                <td>" . ($room2Attributes['pickups'] ? 'Yes' : 'No') . "</td>
                </tr>";
                }
                ?>
                </tbody>
            </table>



        </div>
        <div class="col-md-4 col-lg-4 mt-3">
            <section>
                <div>
                    <form method="post">
                        <label for="hotel" class="fw-bold fs-6 text-secondary">Select Hotel:</label>
                        <select name="hotel" id="hotel" class="hotelCompare" onchange="this.form.submit()">
                            <option value="0">Select your hotel</option>
                            <option value="1">Ocean Oasis Resort</option>
                            <option value="2">Serene Valley Retreat</option>
                            <option value="3">Wilderness Haven Lodge</option>
                            <option value="4">Snowfall Lodge</option>
                            <option value="5">Panorama Heights</option>
                        </select>
                        <br>
                        <label for="room1" class="fw-bold fs-6 text-secondary">Select Room 1:</label>
                        <select name="room1" id="room1" class="room1Compare">
                            <?php
                            $selectedHotelId = $_POST['hotel'] ?? 0; // Default to Ocean Oasis Resort
                            $rooms = getRoomsByHotel($pdo, $selectedHotelId);
                            foreach ($rooms as $room) {
                                echo "<option value='{$room['name']}'>{$room['name']}</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <label for="room2" class="fw-bold fs-6 text-secondary">Select Room 2:</label>
                        <select name="room2" id="room2" class="room2Compare">
                            <?php
                            // Use the same $rooms array here to populate room options
                            foreach ($rooms as $room) {
                                echo "<option value='{$room['name']}'>{$room['name']}</option>";
                            }
                            ?>
                        </select>
                        <br>

                        <div class="d-grid mt-3">
                            <button class="btn btn-secondary btn-lg text-uppercase text-white" type="submit" name="compare" value="Compare">Compare Hotels</button>
                        </div>
                    </form>
                </div>
            </section>






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
include_once './includes/footer.php';

?>