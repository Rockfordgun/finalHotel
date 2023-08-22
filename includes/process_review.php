<?php
if (isset($_POST['submit'])) {
    $host = '127.0.0.1';
    $dbname = 'hotelbooking';
    $dbusername = 'admin';
    $dbpassword = 'Spectrum0!';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $hotelName = $_POST['hotelName'];
        $hotelID = $_POST['hotelID'];
        $clientName = $_POST['clientName'];
        $clientPosition = $_POST['clientPosition'];
        $starRating = $_POST['starRating'];
        $userReview = $_POST['userReview'];

        // Handle file upload if needed
        if ($_FILES['userImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../img/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['userImage']['name']);
            move_uploaded_file($_FILES['userImage']['tmp_name'], $uploadFile);
        }

        $sql = "INSERT INTO reviews (hotel_id, hotel_name, user_review, client_name, star_rating, position, img) 
VALUES (:hotelId, :hotelName, :userReview, :clientName, :starRating, :clientPosition, :userImage)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':hotelId', $hotelID, PDO::PARAM_INT); // Use $hotelID here
        $stmt->bindParam(':hotelName', $hotelName, PDO::PARAM_STR);
        $stmt->bindParam(':userReview', $userReview, PDO::PARAM_STR);
        $stmt->bindParam(':clientName', $clientName, PDO::PARAM_STR);
        $stmt->bindParam(':starRating', $starRating, PDO::PARAM_INT);
        $stmt->bindParam(':clientPosition', $clientPosition, PDO::PARAM_STR);


        // Bind the image file if provided
        if (isset($uploadFile)) {
            $stmt->bindParam(':userImage', $uploadFile, PDO::PARAM_STR);
        } else {
            $stmt->bindValue(':userImage', null, PDO::PARAM_NULL);
        }

        $stmt->execute();

        echo "Review submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
