<?php
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }

    define('__ROOT__', dirname(dirname(__FILE__)));
    include (__ROOT__. '/lib/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <script src="/assets/js/dropdown.js?version=3.2<?php echo get_cache_prevent_string(); ?>"></script>

    <title>IMCTech - Регистрация</title>
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
<div class="box">
  <div class="box-container">
        <h1 class="box-name">Telegram ID и зачем он нужен?</h1>
        <div class="box-text">Telegram user ID — это цифровой код, который присваивается каждому аккаунту при регистрации.</div>
        <div class="box-text">Найти ID своего аккаунта в меню мессенджера не получится.</div>
        <div class="box-text">Но наш <a class="link" rel="noopener noreferrer" target="_blank" href="https://t.me/IMCTechBot">телеграм бот (*тык*)</a> дает возможность узнать свой телеграм ID. Для этого нужно просто ввести в чат бота команду <text class="command">/id</text></div>
        <div class="box-text">Telegram ID нам нужен для того, чтобы наш телеграм бот смог идентифицировать пользователя для последующей работы.</div>
        <div class="box-text" style="margin-bottom: 20px;">Наш телеграм бот позволяет взамодейстовать со студентами наиболее удобным для всех способом - ни в коем случае не блокируйте его!</div>
        <img src="assets/images/tgbot.jpg" ></img> 
  </div>  
</div>

<div class="footer" id="end">
  <div class="footer-text">IMCTech — объединение сотрудников из Академии цифровой трансформации и учащихся из Студенческого совета ИМКТ</div>
  <div class="footer-text">Поддержка - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></div>
  <div class="footer-subtext">Сделано в IMCT</div>
</div>

</body>
</html>