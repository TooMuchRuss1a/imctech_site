<?php
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }
    define('__ROOT__', dirname(dirname(__FILE__)));
    include ('lib/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta property="og:type"             content="article"/>
    <meta property="og:locale"           content="ru_RU"/>
    <meta property="og:site_name"        content="IMCTech"/>
    <meta property="og:title"            content="JOIN US"/>
    <meta property="og:description"      content="Строим цифровое будущее"/>
    <meta property="og:url"              content="https://imctech.ru/"/>
    <meta property="og:image"            content="https://imctech.ru/assets/images/main.jpg"/>
    <meta property="og:image:secure_url" content="https://imctech.ru/assets/images/main.jpg"/>
    <meta property="og:image:type"       content="image/jpeg"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MPV9RSCKXV"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-MPV9RSCKXV');
    </script>

    <link rel="icon" href="/assets/images/fox.png">
    <link rel="stylesheet" href="/assets/css/main_style.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" href="assets/css/style.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/assets/css/main_mobile.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="assets/css/mobile.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" type="text/css" media="(orientation: landscape)" href="assets/css/style.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;800&family=Press+Start+2P&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script src="/assets/js/scroll.js"></script>
    <script src="/assets/js/loading.js"></script>
    <script src="/assets/js/nav.js?version=3.2<?php echo get_cache_prevent_string(); ?>"></script>
    <script src="/assets/js/dropdown.js?version=3.2<?php echo get_cache_prevent_string(); ?>"></script>

    <title>IMCTech</title>
    <meta property="og:title" content="IMCTech"/>
    <meta property="og:description" content="Главная страница"/>
    <meta property="og:image" content="https://imctech.ru/assets/images/afishaaa.jpg"/>
</head>

<body>
  <div class="se-pre-con">
    <div class="gooey">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <header id="nav" class="header">
      <div class="header_inner">
      <div class="header_logo">
          <a class="header_logo_link" href="#"><img class="header_logoimg" src="/assets/images/logos/imctech.png"><text> IMCTech</text></a>
        </div>
        <div class="nav">
        <?php echo login($_COOKIE['login'], $_COOKIE['password'])?>
        </div>
      </div>
    </header>


    <a href="#">
      <div id="scrup" class="scroll-up"></div>
    </a>

    <div class="imctech">
      <div class="imctech_title">
        IMCTech
      </div>
      <div class="imctech_subtitle-d">Академия цифровой трансформации</div>
      <div class="imctech_subtitle-m">Студенческий совет ИМКТ</div>
      <div class="imctech_x">x</div>
      <div class="imctech_subtitle-d">Студенческий совет ИМКТ</div>
      <div class="imctech_subtitle-m">Академия цифровой трансформации </div>
      <a href="#pschool">
        <div class="scroll-down"></div>
      </a>
    </div>


    <div class="intro">
        <div class="container">
          <h1 class="intro_title" id="pschool">проектная школа</h1>
          <h1 class="intro_subtitle">больше чем проекты</h1>
          <h1 class="intro_text">Школа нацелена на подготовку студентов к работе над реальными проектами. Вам покажут, что это круто и интересно. Принять участие может любой человек вне зависимости от направления, курса и института. В рамках школы участники будут генерировать идеи для решения реальных проблем и реализовывать их. Во время работы организаторы будут активно поддерживать участников. В конце проектной школы каждый студент или команда презентуют свой проект. Вполне возможно, что какой-то из них будет ждать большое будущее.</h1>
        </div>
        <a href="https://imctech.ru/pschool" class="btn">Подробнее</a>
        <!-- <a class="btn-grey">Участвовать
          <div class="btn-grey_popup">регистрация закрыта</div>
        </a> -->
    </div>

    <div class="area" >
    <ul class="circles">
      <div class="g468">
        <div class="container">
          <h1 class="g468_title" id="pschool">Коворкинг - G468</h1>
          <h1 class="g468_subtitle">прикоснуться к прекрасному</h1>
          <h1 class="g468_text">Для тех, кто хочет заняться чем-то серьезным, но мощностей ноутбука не хватает</h1>
        </div>
        <a href="https://imctech.ru/g468" class="btn">Записаться</a>
        <!-- <a class="btn-grey">Записаться
          <div class="btn-grey_popup">в разработке</div>
        </a> -->
    </div>
            <img src="/assets/images/cursor.png">
            <img src="/assets/images/cursor.png">
            <img src="/assets/images/cursor.png">
            <img src="/assets/images/cursor.png">
            <img src="/assets/images/heart.png">
            <img src="/assets/images/bomb.png">
            <img src="/assets/images/cursor.png">
            <img src="/assets/images/heart.png">
            <img src="/assets/images/cursor.png">
            <img src="/assets/images/heart.png">
    </ul>
    </div >

    <div class="footer" id="end">
        <div class="flogo_container">
            <a rel="noopener noreferrer" target="_blank" href="https://www.dvfu.ru"><img class="flogo" src="/assets/images/logos/dvfu.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vk.com/imct_fefu"><img class="flogo" src="/assets/images/logos/imct.png"></a>
        </div>
        <div class="flogo_container-m">
            <a rel="noopener noreferrer" target="_blank" href="https://www.dvfu.ru"><img class="flogo" src="/assets/images/logos/dvfu.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vk.com/imct_fefu"><img class="flogo" src="/assets/images/logos/imct.png"></a>
        </div>
        <div class="footer-text">IMCTech — объединение сотрудников из Академии цифровой трансформации и учащихся из Студенческого совета ИМКТ</div>
        <div class="footer-text">Поддержка - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></div>
        <div class="footer-subtext">Сделано в IMCT</div>
    </div>

  <script>
    var myNav = document.getElementById("nav");
    var scrUp = document.getElementById("scrup");
    var dd = document.getElementById("myDropdown1");
    if (dd === null) {
      dd = document.getElementById("nav");
    }
  </script>

</body>
</html>