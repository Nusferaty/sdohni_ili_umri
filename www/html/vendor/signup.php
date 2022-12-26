<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['person_name'];
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "INSERT INTO account (person_name, login, password, phone) VALUES (?, ?, ?, ?)";
    $add_user = $connect->prepare($sql);
    $add_user->execute([$name, $login, $password, $phone]);

    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../autorization.php');
?>
