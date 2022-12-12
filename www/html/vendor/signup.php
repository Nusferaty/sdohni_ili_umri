<?php

    session_start();
    require_once 'connect.php';

    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $middle_name = $_POST['middle_name'];
    $study_place = $_POST['study_place'];
    $grade_id = $_POST['grade_id'];
    $education_direction = $_POST['education_direction'];
    $course_id = $_POST['course_id'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $e_mail = $_POST['e_mail'];
    $telegram_id = $_POST['telegram_id'];


    if ($password === $password_confirm) {

        /*$password = hash('sha256', $password);*/

        $sql = "INSERT INTO students (surname, name, middle_name, study_place, grade_id, education_direction, course_id, login, password, e_mail, telegram_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $add_user = $connect->prepare($sql);
        $add_user->execute([$surname, $name, $middle_name, $study_place, $grade_id, $education_direction, $course_id, $login, $password, $e_mail, $telegram_id]);

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
