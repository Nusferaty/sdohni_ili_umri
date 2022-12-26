<?php
    session_start();
    require_once 'connect.php';
    $name = $_POST['name'];
    $login = $_POST['login'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $id = $_SESSION['account']['id_account'];
    
    if ($name != 0)
    {
        $sql = " UPDATE account SET person_name = '$name' where id_account = '$id'";
        $add_ifo = $connect->prepare($sql);
        $add_ifo->execute();
    }
    elseif($login != 0)
    {
        $sql = " UPDATE account SET login ='$login' where id_account = '$id'";
        $add_ifo = $connect->prepare($sql);
        $add_ifo->execute();
    }
    elseif($phone != 0)
    {
        $sql = " UPDATE account SET phone ='$phone' where id_account = '$id'";
        $add_ifo = $connect->prepare($sql);
        $add_ifo->execute();
    }
    elseif($password != 0)
    {
        $sql = " UPDATE account SET password ='$password' where id_account = '$id'";
        $add_ifo = $connect->prepare($sql);
        $add_ifo->execute();
    }

    unset($_SESSION['account']);
    header('Location: ../autorization.php');
    ?>