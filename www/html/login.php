<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Регистрация на сайте</title>
  <link rel="stylesheet" href="./css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class = "login">
  <h1>Регистрация</h1>
  <div class = "pole">
    <label>ФИО</label>
    <input type="text" name="person_name" placeholder="Введите Ваше имя" required>
  </div>
  <div class = "pole">
    <label>Логин</label>
    <input type="email" name="login" placeholder="Введите Вашу электронную почту" required>
  </div>
  <div class = "pole">
    <label>Номер телефона</label>
    <input type="number" name="phone" placeholder="Введите Ваш номер телефона" required>
  </div>
  <div class = "pole">
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите Ваш пароль" required>
  </div>
  <a href="profile.php" class="button">
    <img src="./IMG/registration.png"  class="img_button_exit" alt="Завершить регистрацию">
</a>
</div>
</body>
</html>