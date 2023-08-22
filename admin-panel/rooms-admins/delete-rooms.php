<?php


include_once "../../includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $getImage = $pdo->query("SELECT * FROM rooms WHERE id='$id'");
    $getImage->execute();

    $fetch = $getImage->fetch(PDO::FETCH_OBJ);

    unlink("rooms_images/" . $fetch->image);

    $delete = $pdo->query("DELETE FROM rooms WHERE id='$id'");
    $delete->execute();


    header("location: show-rooms.php");
}
