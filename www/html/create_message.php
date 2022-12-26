<?php 
    session_start();
    require_once './vendor/connect.php';
    // $good_id = $_GET['id'];
    // $_SESSION['last_good_id'] = $good_id;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Каталог магазина</title>
  <link rel="stylesheet" href="./css/create_message.css">
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
      <a href="info.php" class="button" ><div class = "links">
        <p class = "menu_text">Контакты</p>
        <a href="info.php" class="button" ><img src="./IMG/contact.png" class="img_button" alt="Контакты продавца"></a>
      </div>
      </a>
      <a href="carte.php" class="button" ><img src="./IMG/cart.png" class="img_button" alt="Корзина покупок"></a>
      <div class="exit">
        <a href="/autorization.php">
          <?php 
          if(isset($_SESSION['account'])){
            echo '<div class = "links"><img src="./IMG/profile.png" class="img_button" alt="Профиль пользователя">
            <p class = "menu_text">Профиль</p></div>';
          }
          else {
            echo '<img src="./IMG/exit.png"  class="img_button_exit" alt="Войти/выйти в профиль">';
          }?>
        </a>
      </div>
    </div>
  </div>
</header>
<body>
  <div class = "colon">
  <form action="vendor/new_message.php" method="post">
    <div class = "link">
        <p class = "text">Введите отзыв:</p>
        <input type = "text" class = "kol_vo" name = "message" required>
        <button class = "but" type="submit">Добавить отзыв</button>
        </div></form>
  </div>
</body>
</html>