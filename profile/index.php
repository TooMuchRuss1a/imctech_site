<?php
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }

    define('__ROOT__', dirname(dirname(__FILE__)));
    include (__ROOT__. '/lib/functions.php');
    include (__ROOT__. '/lib/zayavki.php');
    include (__ROOT__. '/lib/profile.php');
    include (__ROOT__. '/lib/activity.php');
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
    <script src="/assets/js/dropdown.js?version=3.2<?php echo get_cache_prevent_string(); ?>"></script>

    <title>IMCTech - Профиль</title>
</head>

<body>

<header id="nav" class="header">
      <div class="header_inner">
      <div class="header_logo">
          <a class="header_logo_link" href="/"><img class="header_logoimg" src="/assets/images/logos/imctech.png"><text> IMCTech</text></a>
        </div>
        <div class="nav">
        <?php echo login($_COOKIE['login'], $_COOKIE['password'])?>
        </div>
      </div>
    </header>

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

    <div class="box-profile">
      <div class="box-profile-container">
            <?php profile($_COOKIE['login'], $_COOKIE['password'])?>
      </div>
      <div class="underprofile">
      <div class="activity">
        <?php activity($_COOKIE['login'],$_COOKIE['password']); ?>
      </div>
      <div class="zayavki">
      <?php zayavki($_COOKIE['login'],$_COOKIE['password']); ?>
      <div class="more"><a class="link" href="https://imctech.ru/g468">+</a></div>
      </div>
      </div>
    </div>
</body>
</html>