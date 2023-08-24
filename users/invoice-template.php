<!DOCTYPE html>
<html>

<head>
    <style>
        /* Define your CSS styles for the invoice here */
    </style>
</head>

<body>
    <div class="invoice">
        <h1>Invoice</h1>
        <p><strong>Booking Details:</strong></p>
        <p><strong>Full Name:</strong> <?php echo $booking['full_name']; ?></p>
        <p><strong>Room Name:</strong> <?php echo $booking['room_name']; ?></p>
        <p><strong>Check-in:</strong> <?php echo $booking['check_in']; ?></p>
        <p><strong>Check-out:</strong> <?php echo $booking['check_out']; ?></p>
        <p><strong>Payment Recieved:</strong> <?php echo $booking['payment']; ?></p>
        <!-- Add more fields as needed -->

        <!-- You can also calculate totals, taxes, etc. here -->

        <p><strong>Thank you for choosing our hotel!</strong></p>
    </div>
</body>

</html>