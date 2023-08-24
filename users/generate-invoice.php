<?php
require_once '../vendor/autoload.php'; // Adjust the autoload path as needed
require_once '../includes/config.php'; // Adjust the config path as needed

use Dompdf\Dompdf;
use Dompdf\Options;

// Fetch booking details from the database (replace with your logic)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch booking details based on $bookingId from the database
    $bookingQuery = $pdo->prepare("SELECT * FROM bookings WHERE id = :id");
    $bookingQuery->execute(['id' => $id]);
    $booking = $bookingQuery->fetch(PDO::FETCH_ASSOC);

    if ($booking) {
        // Create a PDF instance
        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);
        $pdf = new Dompdf($pdfOptions);

        // Load HTML content for the invoice
        ob_start();
        include 'invoice-template.php'; // Replace with your invoice template file
        $html = ob_get_clean();

        // Load HTML into PDF
        $pdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render PDF (first page)
        $pdf->render();

        // Output PDF for download
        $pdf->stream("invoice.pdf", array("Attachment" => false));
    } else {
        // Booking not found, handle error
        echo "Booking not found";
    }
}
