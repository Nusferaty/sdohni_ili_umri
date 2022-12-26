<?php 
    session_start();
    require_once './vendor/connect.php';
    $good_id = $_GET['id'];
    $_SESSION['last_good_id'] = $good_id;
    $sql = "SELECT * FROM goods where id_goods = ".$good_id;
    $query = $connect->query($sql);
    $good = $query->fetch(PDO::FETCH_ASSOC);
    $sql = "SELECT * FROM messages where id_good = ".$good_id;
    $query = $connect->query($sql);
    while($temp = $query->fetch(PDO::FETCH_ASSOC)){
        $messages[] = $temp;
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Каталог магазина</title>
  <link rel="stylesheet" href="./css/cart_good.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
      <a href="" class="button" ><div class = "links">
        <p class = "menu_text">Конструктор</p>
        <a href="lego.php" class="button" ><img src="./IMG/lego.png" class="img_button" alt="Конструктор товара"></a>
      </div>
      </a>
      <a href="" class="button" ><div class = "links">
        <p class = "menu_text">Контакты</p>
        <a href="" class="button" ><img src="./IMG/contact.png" class="img_button" alt="Контакты продавца"></a>
      </div>
      </a>
      <a href="" class="button" ><img src="./IMG/cart.png" class="img_button" alt="Корзина покупок"></a>
      <div class="exit">
        <a href="/autorization.php">
          <?php 
          if(isset($_SESSION['account'])){
            echo '<div class = "links"><img src="./IMG/profile.png" class="img_button" alt="Профиль пользователя"><p class = "menu_text">Профиль</p></div>';
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
  <div class = "cart">
    <div class = "part_1">
      <div class = "part_text">
      <p class = "text"><?=  $good['name'] ?></p>
      </div>
      <p class = "text" >Описание товара:</p>
      <p class = "text" ><?=  $good['info'] ?></p>
    </div>
    <div class = "part_2">
    <img src="<?=  $good['picture'] ?>" class="img" alt="<?=  $good['name'] ?>">
    <p class = "text" >Цена: <?=  $good['price'] ?></p>
    <?php 
      if(isset($_SESSION['account'])){
        echo '<form action="vendor/new_good.php" method="post">
        <div class = "link">
        <input type = "number" class = "kol_vo" name = "amount" required>
        <button class = "but" type="submit">Добавить в корзину</button>
        </div></form>';
        }
      else {
        echo '';
        }?>
    <a href = "magazine.php">
        <p class = "text">Обратно в каталог</p>
    </a>
    </div>
    </div>
    <div class = "otz">
    <p class = "text" >Отзывы:</p>
    <?php if (!empty ($messages)) {foreach ($messages as $message): ?>
      <div class = "mes">
          <p class = "text" ><?=  $message['person_name'] ?></p>
          <p class = "text" ><?=  $message['message'] ?></p>
      </div>
    <?php endforeach; }?>
    </div>
  </div>
</body>
</html>