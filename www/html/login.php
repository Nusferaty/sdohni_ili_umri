<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Регистрация на сайте</title>
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<div class = "login">
  <form action="vendor/signup.php" method="post">
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
    <div class = "pole_but">
    <button class = "but" type="submit">Зарегестрироваться</button>
    </div>
  </form>
</div>
</body>
</html>