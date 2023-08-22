<?php


include_once "../../includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $pdo->query("DELETE FROM bookings WHERE id='$id'");
    $delete->execute();


    header("location: show-bookings.php");
}
