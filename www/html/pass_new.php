<?php
    session_start();
    if (!isset($_SESSION['account'])) {
        header('Location: /');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Онлайн магазин Штуки. Профиль пользователя</title>
  <link rel="stylesheet" href="./css/pass_new.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>

<header class = "wrap">
<div class = "menu">
    <a href = "index.php" class="button"><p class = "logo">Штуки</p></a>
    <div class = "option">
      <a href="magazine.php" class="button" ><div class = "links">
        <p class = "menu_text">Каталог</p>
        <img src="./IMG/magazine.png" class="img_button" alt="Каталог товаров">
      </div>
      </a>
      <a href="lego.php" class="button" ><div class = "links">
        <p class = "menu_text">Конструктор</p>
        <a href="lego.php" class="button" ><img src="./IMG/lego.png" class="img_button" alt="Конструктор товара"></a>
      </div>
      </a>
      <a href="" class="button" ><div class = "links">
        <p class = "menu_text">Контакты</p>
        <a href="" class="button" ><img src="./IMG/contact.png" class="img_button" alt="Контакты продавца"></a>
      </div>
      </a>
      <a href="carte.php" class="button" ><img src="./IMG/cart.png" class="img_button" alt="Корзина покупок"></a>
      <a href="carte.php" class="button" ><div class = "links">
        <p class = "menu_text">Профиль</p>
        <a href="profile.php" class="button" >
            <img src="./IMG/profile.png" class="img_button" alt="Профиль пользователя">
        </a>
      </div>
      </a>
    </div>
  </div>
</header>

<body>
<div class = "profile_menu">
  <div class = "p_m">
    <a href="profile.php"><p class = "profile_text">Личные данные</p> </a>
    <a href=""><p class = "profile_text">История заказов</p> </a>
    </div>
    <div class = "line"></div>
    <div class = "person_info">
        <form action="vendor/update_profile.php" method="post">
            <div class = "pole">
                <label class = "text">ФИО</label>
                <input type="text" name="name" placeholder="Введите Ваше ФИО">
            </div>
            <div class = "pole">
                <label class = "text">Номер телефона</label>
                <input type="phone" name="phone" placeholder="Введите Ваш номер телефона">
            </div>
            <div class = "pole">
                <label class = "text">Email</label>
                <input type="email" name="login" placeholder="Введите Вашу почту">
            </div>
            <div class = "pole">
                <label class = "text">Пароль</label>
                <input type="password" name="password" placeholder="Введите Ваш пароль">
            </div>
            <button class = "but" type="submit">Обновить данные</button>
        </form>
    </div>
</div>
</body>

</html>