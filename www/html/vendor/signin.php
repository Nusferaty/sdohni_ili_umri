<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM account WHERE login = ? AND password = ?";
    $check_account = $connect->prepare($sql);
    $check_account->execute([$login, $password]);
    if ($check_account->rowCount() > 0) {

        $account = $check_account->fetch(PDO::FETCH_ASSOC);

        $_SESSION['account'] = [
            "id_account" => $account['id_account'],
            "login" => $account['login'],
            "person_name" => $account['person_name'],
            "phone" => $account['phone'],
            "address" => $account['address']
        ];
  
        header('Location: ../profile.php');
        
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../autorization.php');
    }
    ?>

<pre>
    <?php
    print_r($check_account);
    print_r($account);
    ?>
</pre>
