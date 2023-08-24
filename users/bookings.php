<?php
include_once "../includes/header.php";
require_once "../includes/config.php";

if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href='" . APPURL . "'</script>";
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $bookings = $pdo->query("SELECT * FROM bookings WHERE user_id= '$id'");
    $bookings->execute();

    $allBookings = $bookings->fetchAll((PDO::FETCH_OBJ));
}




?>



<div class="container mt-4">


    <div class="table-responsive">
        <?php if (count($allBookings) > 0) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col text-capitalize">Check in</th>
                        <th scope="col text-capitalize">Check out</th>
                        <th scope="col">Full name </th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Room name </th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Download Invoice</th>
                    </tr>
                </thead>
                <tbody>

                    <?php


                    foreach ($allBookings as $booking) : ?>

                        <tr class="">

                            <td><?php echo $booking->check_in; ?></td>
                            <td><?php echo $booking->check_out; ?></td>
                            <td><?php echo $booking->full_name; ?></td>
                            <td><?php echo $booking->email; ?></td>
                            <td><?php echo $booking->phone_number; ?></td>
                            <td><?php echo $booking->room_name; ?></td>
                            <td><?php echo $booking->status; ?></td>
                            <td><?php echo $booking->payment; ?></td>
                            <td><?php echo $booking->created_at; ?></td>



                            <td><a href="delete-booking.php?id=<?php echo $booking->id; ?>" class="btn btn-danger  text-center ">Cancel Booking </a></td>
                            <td><a href="generate-invoice.php?id=<?php echo $booking->id; ?>" class="btn btn-primary text-white">Download Invoice</a></td>
                        <?php endforeach; ?>
                        </tr>

                </tbody>
            </table>

        <?php else : ?>
            <div class="alert alert-light" role="alert">
                You have not made any bookings yet!
            </div>

        <?php endif; ?>




    </div>

</div>

<?php
include_once "../includes/footer.php";
?>