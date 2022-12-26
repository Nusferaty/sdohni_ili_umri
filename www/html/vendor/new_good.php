<?php

    session_start();
    require_once 'connect.php';
    $good = $_SESSION['last_good_id'];
    $date = 'now()';
    $amount = $_POST['amount'];
    $id_account = $_SESSION['account']['id_account'];

    
    $sql = "INSERT INTO carte (amount, id_good, date, id_account) VALUES (?, ?, ?, ?)";
    $add_lego = $connect->prepare($sql);
    $add_lego->execute([$amount, $good, $date, $id_account]);

    header('Location: /carte.php');
    ?>