<?php 
    session_start();
    require_once './vendor/connect.php';
    $sql = "SELECT * FROM goods";
    $query = $connect->query($sql);
    while($temp = $query->fetch(PDO::FETCH_ASSOC)){
        $goods[] = $temp;
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Каталог магазина</title>
  <link rel="stylesheet" href="./css/magazine.css">
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
      <div class = "body">
      <?php foreach ($goods as $good): ?>
        <?php 
        $sql = "SELECT id_teg FROM good_teg where id_good = ".$good['id_goods'];
        $query = $connect->query($sql);
        $tegs_names = array();
        while($teg = $query->fetch(PDO::FETCH_ASSOC)){
        $sql = "SELECT name_teg FROM tegs where id_teg = ".$teg['id_teg'];
        $query = $connect->query($sql);
        while($temp = $query->fetch(PDO::FETCH_ASSOC)){
          array_push($tegs_names, $temp);
      }
      }
      ?>
        <a href=<?="cart_good.php?id=".$good['id_goods']?> ><div class = "block">
          <img src="<?=  $good['picture'] ?>" class="img" alt="<?=  $good['name'] ?>">
          <p class = "text" ><?=  $good['name'] ?></p>
          <p class = "text" ><?=  $good['price'] ?></p>
          <p class = "text" ><?php  foreach ($tegs_names as $teg) {echo $teg['name_teg'].' ';} ?></p>
        </div></a>
        <?php endforeach; ?>
      </div>
      
</body>

</html>