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
    <link rel="icon" href="/assets/images/fox.png">
    <link rel="stylesheet" href="/assets/css/main_style.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" href="/assets/css/error.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/assets/css/main_mobile.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/assets/css/error_m.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
    <link rel="stylesheet" type="text/css" media="(orientation: landscape)" href="/assets/css/error.css?version=3.2<?php echo get_cache_prevent_string(); ?>">
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
    <script src="/assets/js/nav.js"></script>

    <title>IMCTech</title>
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

    <div class="box">
      <img src="/assets/images/fedya2.png" class="fedya2-d">
      <div class="errorpage">
        <div class="errorpagename">404</div>  
        <div class="errorpagetext">Страница не найдена</div>
      </div>
      <img src="/assets/images/fedya2.png" class="fedya2-m">
    </div>


    <div class="footer" style="position: fixed; height: auto; bottom: 0;" id="end">
      <div class="footer-text">IMCTech — объединение сотрудников из Академии цифровой трансформации и учащихся из Студенческого совета ИМКТ</div>
      <div class="footer-text">Поддержка - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></div>
      <div class="footer-subtext">Сделано в IMCT</div>
    </div>

</body>
</html>