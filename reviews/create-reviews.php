<?php



include_once "../includes//config.php";

$hotels = $pdo->query("SELECT * FROM hotels");
$hotels->execute();
$allHotels = $hotels->fetchAll(PDO::FETCH_OBJ);



if (isset($_POST['submit'])) {
    if (empty($_POST['client_name']) || empty($_POST['position']) || empty($_POST['user_review']) || empty($_POST['star_rating']) || empty($_POST['hotel_id'])) {
        echo "<script>alert('One Or More Input Are Empty')</script>";
    } else {
        $client_name = $_POST['client_name'];
        $position = $_POST['position'];
        $user_review = $_POST['user_review'];
        $star_rating = $_POST['star_rating'];
        $hotel_id = $_POST['hotel_id'];
        $image = $_FILES['image']['name'];

        $dir = "review_images/" . basename($image);

        // Fetch hotel name based on hotel_id
        $hotel_name_query = $pdo->prepare("SELECT name FROM hotels WHERE id = :hotel_id");
        $hotel_name_query->execute([
            ":hotel_id" => $hotel_id,
        ]);
        $hotel_name_result = $hotel_name_query->fetch(PDO::FETCH_ASSOC);
        $hotel_name = $hotel_name_result['name'];

        $insert = $pdo->prepare("INSERT INTO reviews (client_name, position, user_review, star_rating, hotel_id, hotel_name, image)
            VALUES (:client_name, :position, :user_review, :star_rating, :hotel_id, :hotel_name, :image)");

        $insert->execute([
            ":client_name" => $client_name,
            ":position" => $position,
            ":user_review" => $user_review,
            ":star_rating" => $star_rating,
            ":hotel_id" => $hotel_id,
            ":hotel_name" => $hotel_name,
            ":image" => $image,
        ]);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
        header("location: http://localhost/finalHotel/");
    }
}
