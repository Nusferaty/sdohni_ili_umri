<?php 
     session_start();
     if (!isset($_SESSION['account'])) {
       header('Location: /autorization.php');
   }
     require_once './vendor/connect.php';
     $sql = "SELECT * FROM variant_pay";
     $query = $connect->query($sql);
     while($temp = $query->fetch(PDO::FETCH_ASSOC)){
       $variant_pays[] = $temp;
     }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Оформление заказа</title>
  <link rel="stylesheet" href="./css/make_order.css">
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
    <p class = "text_1" >Оформление заказа</p>
    <form action="vendor/make.php" class = "vid" method="post">
      <div class = "link">
        <div class = "pole">
          <label class = "text">Выберите способ оплаты:</label>
          <select name="variant_pay" class = "inp" placeholder="Выберите способ оплаты:">
            <?php foreach ($variant_pays as $pay): ?>
              <option value=<?= $pay['id_variant_pay'] ?>>
                <?= $pay['pay_name'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class = "pole">
          <p class = "text" >Адрес:</p>
          <input type = "text" class = "inp" name = "address" required>
        </div>
      </div>
      <button class = "but" type="submit">Оформить заказ</button>
    </form>
  </div>
</body>
</html>