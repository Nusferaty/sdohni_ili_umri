<?php
session_start();
if (isset($_SESSION['account'])) {
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Войти в профиль</title>
  <link rel="stylesheet" href="./css/autorization.css">
</head>
<body>
<form action="vendor/signin.php" method="post">
<div class = "login">
  <h1>Вход</h1>
  <div class = "pole">
    <label>Логин</label>
    <input type="email" name="login" placeholder="Введите Вашу электронную почту" required>
  </div>
  <div class = "pole">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите Ваш пароль" required>
  </div>
  <div class = "pole_but">
    <button class = "but" type="submit">Войти</button>
    <a href="login.php" class="button"><img src="./IMG/button_login.png" class="img_button" alt="Зарегестрироваться"></a>
  </div>
<?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
</form>
</body>
</html>