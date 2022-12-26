<?php 
    session_start();
    require_once './vendor/connect.php';
    $sql = "SELECT * FROM carte where id_account = ".$_SESSION['account']['id_account'];
    $query = $connect->query($sql);
    while($temp = $query->fetch(PDO::FETCH_ASSOC)){
        $cartes[] = $temp;
      }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Корзина</title>
  <link rel="stylesheet" href="./css/carte.css">
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
      <a href="carte.php" class="button" ><img src="./IMG/cart.png" class="img_button" alt="Корзина покупок"></a>
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
      <p class = "text"><?php if (!empty ($cartes)) {foreach ($cartes as $carte): ?>
      <div class = "mes">
        <?php if ($carte['id_good'] == 0){
          echo '<p class = "text" >Конструктор</p><p class = "text" >'.$carte['amount'].'</p>';
          } 
        else {
          $sql = "SELECT name FROM goods where id_goods = ". $carte['id_good'];
          $query = $connect->query($sql);
          $good_name = $query->fetch(PDO::FETCH_ASSOC);
          echo '<p class = "text" >'.$good_name['name'].'</p><p class = "text" >'.$carte['amount'].'</p>';
        }
        ?>
      </div>
    <?php endforeach; }?></p>
      </div>
    </div>
    <a href="make_order.php" class="button" >Оформить заказ</a>
  </div>
</body>
</html>