<?php
// Init
define( "DEBUGGING", true ); // or false in production enviroment
// Functions
function get_cache_prevent_string( $always = false ) {
    return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
}

// Подключение БД
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/lib/db.php');

if (isset($_REQUEST['prikol'])) {
  $login = $_COOKIE["login"];
  $result = mysqli_query($db, "SELECT `email`, `name`, `agroup`, `vk`, `tg` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $agroup = $row['agroup'];
  $email = $row['email'];
  $vk = $row['vk'];
  $tg = $row['tg'];

  $testResult = mysqli_query($db, "SELECT `email` FROM `tbl_springpschool2022` WHERE (`email`='" . $email . "')");
  $testRow = mysqli_fetch_assoc($testResult);
  $testEmail = $testRow['email'];
  if (!isset($testEmail)) {

  date_default_timezone_set('Asia/Vladivostok');
  $reg_date = date("d.m.Y H:i:s");
  mysqli_query($db, "INSERT INTO `tbl_springpschool2022` (`id`, `tg`, `name`, `agroup`, `vk`, `email`, `reg_date`) VALUES ('0', '$tg', '$name', '$agroup', '$vk', '$email', '$reg_date')");
  header('Location: thx');
  exit;
  }
  else {
    header('Location: error');
    exit;
  }
}

if ((isset($_COOKIE['login'])) && (isset($_COOKIE['password']))) {
  $login = $_COOKIE['login'];
  $pass = $_COOKIE['password'];

      // берёт из БД пароль и id пользователя 
      $takeID = mysqli_query($db, "SELECT `password`, `id`, `name`, `agroup`, `vk`, `tg`, `ban` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
      if (mysqli_num_rows($takeID) > 0) {
          $result = mysqli_query($db, "SELECT `password`, `id`, `name`, `agroup`, `vk`, `tg`, `ban` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
          while( $row = mysqli_fetch_assoc($result) ){ 
              // Проверяет есть ли id
              if ($row['id']) {
                // если id есть, то он сравнивает пароли функцией password_verify
                if (password_verify($pass, $row['password'])) {
                    if ($row['ban'] == "0") {
                      // Если функция возвращает true, то вы входите
                      
                      echo '<!DOCTYPE html>
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
                      
                          <title>IMCTech - Проектная школа</title>
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
                      
                            <div class="reg-box">
                              <div class="regname">Заявка
                                  <div style="color: white; opacity: 0.8;">'.$row['name'].'</div>
                                  <div style="color: white;">Если желаете принять участие в Весенней проектной школе, то нажмите "Участвовать"</div>
                              </div>
                              <form name="frmContact" method="post" action=" "' .$_SERVER['SCRIPT_NAME']. '"">
                                <input class="prikol" type="submit" name="prikol" id="Submit" value="Участвовать">
                              </form>
                            </div>
                      </body>
                      </html>';
                      // скрипт больше не выполняется
                      exit;
                    }
                  }
              }
          }
      }
}

// Проверка нажата ли кнопка отправки формы
if (isset($_REQUEST['Submit'])) {
  if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
    $secret = '';
    $ip = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
    $arr = json_decode($rsp, TRUE);
    if ($arr['success']) {

      $login = $_REQUEST['login'];
      $pass = $_REQUEST['pass'];

      // берёт из БД пароль и id пользователя 
      $takeID = mysqli_query($db, "SELECT `password`, `id`, `name`, `agroup`, `vk`, `tg`, `ban` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
      if (mysqli_num_rows($takeID) > 0) {
          $result = mysqli_query($db, "SELECT `password`, `id`, `name`, `agroup`, `vk`, `tg`, `ban` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
          while( $row = mysqli_fetch_assoc($result) ){ 
              // Проверяет есть ли id
              if ($row['id']) {
                  // если id есть, то он сравнивает пароли функцией password_verify
                  if (password_verify($pass, $row['password'])) {
                    if ($row['ban'] == "0") {
                      // Если функция возвращает true, то вы входите
                      setcookie("login", $login, time()+259200, '/', "imctech.ru");
                      setcookie("password", $pass, time()+259200, '/', "imctech.ru");
                      
                      echo '<!DOCTYPE html>
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
                      
                          <title>IMCTech - Проектная школа</title>
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
                      
                            <div class="reg-box">
                              <div class="regname">Заявка
                                  <div style="color: white; opacity: 0.8;">'.$row['name'].'</div>
                                  <div style="color: white;">Если желаете принять участие в Весенней проектной школе, то нажмите "Участвовать"</div>
                              </div>
                              <form name="frmContact" method="post" action=" "' .$_SERVER['SCRIPT_NAME']. '"">
                                <input class="prikol" type="submit" name="prikol" id="Submit" value="Участвовать">
                              </form>
                            </div>
                      </body>
                      </html>';
                      // скрипт больше не выполняется
                      exit;
                    }
                    else {
                      $error = "Вы заблокированы";
                      $reason = $row['ban'];
                    }
                  } else {
                          // Если функция возвращает false, то выводит ошибку
                          $error = "Неверный пароль";
                  }
              }
          }
      }
      else {
          $error = "Логин не существует или почта не подтверждена";
      }
    }
    else {$error = "Капча не пройдена";}
  }
  else {$error = 'Не установлен флажок "Я не робот"';}

    if (strpos($_REQUEST['login'], 'dvfu.ru') == true) {
      $error = "Логин = почта без @students.dvfu.ru";
    }
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="/lib/recaptcha/recaptcha.css">
    <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/lib/recaptcha/mobile_recaptcha.css?version=3.2<?php echo get_cache_prevent_string(); ?>">

    <title>IMCTech - Проектная школа</title>
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

    <div class="reg-box">
        <div class="regname">Авторизация
            <div style="margin: 0 0 0 0;"><?=$error?></div>
            <div style="margin: 0 0 0 0;"><?=$reason?></div>
            <div class="reg"><a rel="noopener noreferrer" target="_blank" href="https://imctech.ru/registration">Регистрация</a></div>
        </div>
        <form name="frmContact" method="post" action="<?= $_SERVER['SCRIPT_NAME'] ?>">
            <div class="user-box">
                <input type="text" name="login" required="" autocomplete="off">
                <label>Логин</label>
                <div>ivanov.ii</div>
            </div>
            <div class="user-box" style="margin-bottom: 40px;">
                <input type="password" name="pass" required="" autocomplete="off">
                <label>Пароль</label>
                <div>***</div>
                <a style="bottom: -10px; right: 0;padding: 0 0; font-size:0.13rem" rel="noopener noreferrer" target="_blank" href="https://imctech.ru/vospass">Забыли пароль?</a>
            </div>
            <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcYs80eAAAAAHcpAI3xP1tKPyGWUXgX01K2Y75R"></div>
          <input class="prikol" type="submit" name="Submit" id="Submit" value="Войти">
        </form>
      </div>

      <div class="footer" id="end">
      <div class="footer-text">Поддержка - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></div>
    </div>
</body>
</html>
