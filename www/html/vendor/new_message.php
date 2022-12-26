<?php
    session_start();
    require_once 'connect.php';

    $id_account = $_SESSION['account']['person_name'];
    $message = $_POST['message'];
    $good = $_SESSION['last_good_id'];

    $sql = "INSERT INTO messages (person_name, message, id_good) VALUES (?, ?, ?)";
    $add_lego = $connect->prepare($sql);
    $add_lego->execute([$id_account, $message, $good]);

    header('Location: /magazine.php');
    ?>