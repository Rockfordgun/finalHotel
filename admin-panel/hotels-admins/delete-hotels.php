<?php


include_once "../../includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $getImage = $pdo->query("SELECT * FROM hotels WHERE id='$id'");
    $getImage->execute();

    $fetch = $getImage->fetch(PDO::FETCH_OBJ);

    unlink("hotels_images/" . $fetch->image);

    $delete = $pdo->query("DELETE FROM hotels WHERE id='$id'");
    $delete->execute();


    header("location: show-hotels.php");
}
