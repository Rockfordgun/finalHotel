<?php
include_once "../admin-panel/layouts/header.php";
include_once "../includes/config.php";

if (!isset($_SESSION['adminname'])) {
  echo "<script>window.location.href='" . ADMINURL . "/admins/login-admins.php'</script>";
}


//count hotels
$hotels = $pdo->query("SELECT COUNT(*) AS count_hotel FROM hotels");
$hotels->execute();

$allHotels = $hotels->fetch(PDO::FETCH_OBJ);

//count admins
$admins = $pdo->query("SELECT COUNT(*) AS count_admins FROM admins");
$admins->execute();

$allAdmins = $admins->fetch(PDO::FETCH_OBJ);

//count rooms
$rooms = $pdo->query("SELECT COUNT(*) AS count_rooms FROM rooms");
$rooms->execute();

$allRooms = $rooms->fetch(PDO::FETCH_OBJ);

//count bookings
$bookings = $pdo->query("SELECT COUNT(*) AS count_bookings FROM bookings");
$bookings->execute();

$allBookings = $bookings->fetch(PDO::FETCH_OBJ);

//count bookings
$users = $pdo->query("SELECT COUNT(*) AS count_users FROM users");
$users->execute();

$allUsers = $users->fetch(PDO::FETCH_OBJ);

?>
<div class="container-fluid">

  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Hotels</h5>
          <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
          <p class="card-text">number of hotels: <?php echo $allHotels->count_hotel; ?></p>

        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Rooms</h5>

          <p class="card-text">number of rooms: <?php echo $allRooms->count_rooms; ?></p>

        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>

          <p class="card-text">number of admins: <?php echo $allAdmins->count_admins; ?></p>

        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bookings</h5>

          <p class="card-text">number of admins: <?php echo $allBookings->count_bookings; ?></p>

        </div>
      </div>
    </div>


  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Users</h5>

          <p class="card-text">number of users: <?php echo $allUsers->count_users; ?></p>

        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>
</div>
</div>


<?php
include_once "../admin-panel/layouts/header.php";
?>