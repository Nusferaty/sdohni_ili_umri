<?php

    session_start();
    require_once 'connect.php';
    $address = $_POST['address'];
    $id_pay = $_POST['variant_pay'];
    $id_account = $_SESSION['account']['id_account'];
    
    $sql = "INSERT INTO make_order (address, id_variant_pay) VALUES (?, ?)";
    $add_lego = $connect->prepare($sql);
    $add_lego->execute([$address, $id_pay]);

    $sql = "DELETE FROM carte where id_account=".$id_account;
    $add_lego = $connect->prepare($sql);
    $add_lego->execute();

    header('Location: /carte.php');
    ?>