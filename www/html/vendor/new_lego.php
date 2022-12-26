<?php

    session_start();
    require_once 'connect.php';

    $model = $_POST['model_id'];
    $carving = $_POST['carving_id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $place = 0.1;
    $id_account = $_SESSION['account']['id_account'];

    
    $sql = "INSERT INTO lego (id_model, id_carving, place, amount, description, id_account) VALUES (?, ?, ?, ?, ?, ?)";
    $add_lego = $connect->prepare($sql);
    $add_lego->execute([$model, $carving, $place, $amount, $description, $id_account]);

    header('Location: /carte.php');
    ?>