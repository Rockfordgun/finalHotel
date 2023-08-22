<?php

include_once "../layouts/header.php";
include_once "../../includes/config.php";

if (!isset($_SESSION['adminname'])) {
  echo "<script>window.location.href='" . ADMINURL . "/admins/login-admins.php'</script>";
}

$rooms = $pdo->query("SELECT * FROM rooms");
$rooms->execute();
$allRooms = $rooms->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Rooms</h5>
          <a href="create-rooms.php" class="btn btn-primary mb-4 text-center float-right">Create Room</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>

                <th scope="col">price</th>
                <th scope="col">num of persons</th>
                <th scope="col">size</th>
                <th scope="col">view</th>
                <th scope="col">num of beds</th>
                <th scope="col">hotel name</th>
                <th scope="col">status value</th>
                <th scope="col">change status</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($allRooms as $rooms) : ?>
                <tr>
                  <th scope="row"><?php echo $rooms->id; ?></th>
                  <td><?php echo $rooms->name; ?></td>

                  <td><?php echo $rooms->price; ?></td>
                  <td><?php echo $rooms->num_persons; ?></td>
                  <td><?php echo $rooms->size; ?></td>
                  <td><?php echo $rooms->view; ?></td>
                  <td><?php echo $rooms->num_beds; ?></td>
                  <td><?php echo $rooms->hotel_name; ?></td>
                  <td><?php echo $rooms->status; ?></td>

                  <td><a href="status-rooms.php?id=<?php echo $rooms->id; ?>" class="btn btn-warning text-white text-center ">status</a></td>
                  <td><a href="delete-rooms.php?id=<?php echo $rooms->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



</div>
<?php

include_once "../layouts/footer.php";


?>