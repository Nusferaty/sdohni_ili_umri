<?php 

    session_start();
    if (!isset($_SESSION['account'])) {
      header('Location: /autorization.php');
  }
    require_once './vendor/connect.php';
    $sql = "SELECT * FROM model";
    $query = $connect->query($sql);
    while($temp = $query->fetch(PDO::FETCH_ASSOC)){
      $models[] = $temp;
    }
    $sql = "SELECT * FROM carving";
    $query = $connect->query($sql);
    while($temp = $query->fetch(PDO::FETCH_ASSOC)){
      $carvings[] = $temp;
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Конструктор</title>
  <link rel="stylesheet" href="./css/lego.css">
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
    <div class = "part_text">
      <p class = "text">Конструктор</p>
    </div>
    <form action="vendor/new_lego.php" method="post">
      <div class = "login">
        <div class = "pole">
          <label class = "text">Модель:</label>
          <select name="model_id" class = "inp" placeholder="Модель:">
            <?php foreach ($models as $model): ?>
              <option value=<?= $model['id_model'] ?>>
                <?= $model['model_name'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class = "pole">
          <label class = "text">Вид резьбы:</label>
          <select name="carving_id" class = "inp" placeholder="Вид резьбы:">
            <?php foreach ($carvings as $carving): ?>
              <option value=<?= $carving['id_carving'] ?>>
                <?= $carving['carving_name'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class = "pole">
          <p class = "text">Количество:</p><input type = "number" class = "inp" name = "amount" required>
        </div>
        <div class = "pole">
          <p class = "text" >Описание заказа:</p><input type = "text" class = "inp" name = "description" required>
        </div>
      <div>
      <button class = "but" type="submit">Добавить заказ</button>
    </form>
  </div>
</body>
</html>