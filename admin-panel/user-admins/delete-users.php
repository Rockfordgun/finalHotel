<?php


include_once "../../includes/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $pdo->query("DELETE FROM users WHERE id='$id'");
    $delete->execute();


    header("location: show-users.php");
}
