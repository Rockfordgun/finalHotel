<?php
session_start();

if (isset($_SESSION['userId'])) {
    require_once './includes/dbh.inc.php'; // Include your database connection code

    $userId = $_SESSION['userId'];

    $sql = "SELECT * FROM user_profiles WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($profile) {
        echo "Name: " . $profile['name'] . "<br>";
        echo "Surname: " . $profile['surname'] . "<br>";
        echo "Email: " . $profile['email'] . "<br>";
        echo "Address: " . $profile['address'] . "<br>";
        echo "Gender: " . $profile['gender'] . "<br>";
        echo "Country: " . $profile['country'] . "<br>";
        echo "Phone: " . $profile['phone'] . "<br>";
    } else {
        echo "Profile not found.";
    }
} else {
    echo "Please log in.";
}
