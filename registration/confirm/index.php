<?php
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }
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
    <script src="/assets/js/loading.js"></script>

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

    <div class="box">
      <img src="/assets/images/fedya1.png" class="fedya1-d">
      <div class="box-container">
            <h1 class="box-name">Подтвердите регистрацию на почте</h1>
            <div class="box-text">Остается только подтвердить email, перейдя по ссылке в присланном письме</div>
            <div class="box-text">Проверьте папку "Спам" или "Нежелательная почта"</div>
            <div class="box-text">В случае возникновения проблем при регистрации обратитесь в поддержку - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></text></div>
      </div>
      <img src="/assets/images/fedya1.png" class="fedya1-m">
    </div>
</body>
</html>