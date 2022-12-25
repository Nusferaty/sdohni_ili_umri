<?php
    session_start();
    if (!isset($_SESSION['account'])) {
        header('Location: /');
    }

    // include './vendor/students.php';
    // include './vendor/courses.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <title>Онлайн магазин Штуки. Профиль пользователя</title>
  <link rel="stylesheet" href="./css/profile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>

<header class = "wrap">
<div class = "menu">
<a href = "index.php" class="button"><p class = "logo">Штуки</p></a>
    <div class = "option">
      <a href="" class="button" ><div class = "links">
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
      <a href="" class="button" ><div class = "links">
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
      <p class = "profile_text" >ФИО: <?=  $_SESSION['account']['person_name'] ?></p>
      <p class = "profile_text" >Номер телефона: <?=  $_SESSION['account']['phone'] ?></p>
      <p class = "profile_text" >Email: <?=  $_SESSION['account']['login'] ?></p>
      <!-- <p class = "profile_text" >Адрес доставки: <?=  $_SESSION['account']['address'] ?></p> -->
    <a href=""><p class = "profile_text">Изменить пароль</p></a>
    <a href="" class="button" ><div class = "links">
        <p class = "menu_text">Редактировать профиль</p>
        <a href="" class="button" ><img src="./IMG/settings.png" class="img_button" alt="Редактировать профиль"></a>
      </div>
  </div>
</div>
</body>

</html>

<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="icon" href="IMG/FAVICON.ico" type="image/x-icon">
    <title>CDO WASP Academy</title>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="menu">
        <p class="logo_text"><img src="IMG/LOGO.png" class="logo"/>WASP Academy</p>
        
        <div class="menu_block">
            <div class="menu_item">
                <a href="tests.php"><p class="logo_text"><img src="IMG/category.svg" class="category_icon"/>Тесты</p></a>
            </div>
            <div class="menu_item">
                <p class="logo_text"><img src="IMG/category.svg" class="category_icon"/>Расписание</p>
            </div>
            <div class="menu_item">
                <p class="logo_text"><img src="IMG/category.svg" class="category_icon"/>Оценки</p>
            </div>
        </div>
        
        <div class="profile">
            <div>
                <span class="avatar">
                    <?php mb_internal_encoding("UTF-8");
                    $name = $_SESSION['user']['name'];
                    $first_letter = mb_substr($name, 0, 1);
                    echo $first_letter
                    ?>
                </span>
            </div>
            <div>
                <p class="profile_text"><?= $_SESSION['user']['name']?></p>
                <p class="profile_text"><?= $_SESSION['user']['surname']?></p>
            </div>
            <a href="vendor/logout.php" class="logout"><img src="IMG/logout.svg" class="logout_img"></a>
        </div>

    </div>

    <div class="content_bg">

        <div>
            <h1>Профиль</h1>
        </div>
        
        <div class="profile_block">
            <span class="avatar_big">
                
                <?php mb_internal_encoding("UTF-8");
                $name = $_SESSION['user']['name'];
                $first_letter = mb_substr($name, 0, 1);
                echo $first_letter
                ?>
                
                
            </span>
            <div class="info_block">
                <div class="FIO">
                    <p class="profile_info">ФИО:</p>
                    <p class="info_text"><?= $_SESSION['user']['surname'] ?></p>
                    <p class="info_text"><?= $_SESSION['user']['name'] ?></p>
                    <p class="info_text"><?= $_SESSION['user']['middle_name'] ?></p>
                </div>
                <div class="FIO">
                    <p class="profile_info">Почта:</p>
                    <p class="info_text"><?= $_SESSION['user']['e_mail'] ?></p>
                </div>
                <div class="FIO">
                    <p class="profile_info">Telegram:</p>
                    <p class="info_text"><?= $_SESSION['user']['telegram_id'] ?></p>
                </div>
            </div>
            
            
        </div>

        <div>
            <h1>Ваши курсы</h1>
        </div>
        
        <div class="course_card">
            <p class="card_text"><?= $_SESSION['course']['name'] ?></p>
            <img src=<?= $_SESSION['course']['image'] ?>  class="card_img"/>
        </div>

    </div>
        

    
    </div>

</body> -->