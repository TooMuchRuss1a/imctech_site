<?php
// Init
define( "DEBUGGING", true ); // or false in production enviroment
// Functions
function get_cache_prevent_string( $always = false ) {
  $cache_prevent_data = (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    return $cache_prevent_data;
}
date_default_timezone_set('Asia/Vladivostok');
// Подключение БД
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/lib/db.php');

include (__ROOT__. '/lib/functions.php');

if ($status_g468 == 0) {
  echo '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <link rel="icon" href="/assets/images/fox.png">
      <link rel="stylesheet" href="/assets/css/main_style.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/assets/css/main_mobile.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="assets/css/mobile.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" type="text/css" media="(orientation: landscape)" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;800&family=Press+Start+2P&display=swap" rel="stylesheet">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
      <script src="/assets/js/loading.js"></script>
      <meta http-equiv="Refresh" content="6; URL=https://imctech.ru/">
  
      <title>IMCTech - G468</title>
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
            <h1 class="box-name">Ошибка</h1>
            <div class="box-text">К сожалению, мы не принимаем заявки в данный момент</div>
            <div class="box-text"><text>Перенаправляем вас на главную страницу...</text></div>
      </div>
      <img src="/assets/images/fedya1.png" class="fedya1-m">
    </div>
  </body>
  </html>';
  exit;
}
else {

if (isset($_REQUEST['prikol'])) {
  $login = $_COOKIE["login"];
  $result = mysqli_query($db, "SELECT `email`, `name`, `agroup`, `vk`, `tg` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $agroup = $row['agroup'];
  $email = $row['email'];
  $vk = $row['vk'];
  $tg = $row['tg'];
  $date = $_REQUEST['date'];
  $time1 = $_REQUEST['time1'];
  $time2 = $_REQUEST['time2'];
  $comment = $_REQUEST['comment'];
  if ($time1 >= $time2) {
    $error = "Окончание брони должно быть позже начала";
  }
  else {
  $time = $time1 . "-" . $time2;
  $datetime = date("H:i:s d.m.Y");
  mysqli_query($db, "INSERT INTO `tbl_g468` (`id`, `date`, `time`, `comment`, `name`, `agroup`, `email`, `vk`, `tg`, `datetime`, `status`, `visited`) VALUES ('0', '$date', '$time', '$comment', '$name', '$agroup', '$email', '$vk', '$tg', '$datetime', 'На рассмотрении', '0')");
  echo '<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <link rel="icon" href="/assets/images/fox.png">
      <link rel="stylesheet" href="/assets/css/main_style.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/assets/css/main_mobile.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="assets/css/mobile.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="stylesheet" type="text/css" media="(orientation: landscape)" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;800&family=Press+Start+2P&display=swap" rel="stylesheet">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
      <script src="/assets/js/loading.js"></script>
      <meta http-equiv="Refresh" content="10; URL=https://imctech.ru/">
  
      <title>IMCTech - G468</title>
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
              <h1 class="box-name">Заявка отправлена</h1>
              <div class="box-text">Наша команда в скором времени рассмотрит вашу заявку на бронь ПК и уведомит вас с помощью нашего <a class="link" rel="noopener noreferrer" target="_blank" href="https://t.me/IMCTechBot">телеграм-бота</a></div>
              <div class="box-text">Ни в коем случае не блокируйте его!</div>
              <div class="box-text"><text>Перенаправляем вас на главную страницу...</text></div>
        </div>  
        <img src="/assets/images/fedya1.png" class="fedya1-m">
      </div>
  </body>
  </html>';
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
            $date1 = new DateTime();
            $date2 = new DateTime();
            $date3 = new DateTime();

            // Modify the date it contains
            $date1->modify('next monday');
            $date2->modify('next monday +1 week');
            $date3->modify('next monday +2 week');

            // Output
            $dateF1 = $date1->format('d.m.Y');
            $dateF2 = $date2->format('d.m.Y');
            $dateF3 = $date3->format('d.m.Y');
            
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <link rel="icon" href="/assets/images/fox.png">
                <link rel="stylesheet" href="/assets/css/main_style.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/assets/css/main_mobile.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="assets/css/mobile.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" type="text/css" media="(orientation: landscape)" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;800&family=Press+Start+2P&display=swap" rel="stylesheet">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
                <script src="/assets/js/loading.js"></script>
            
                <title>IMCTech - G468</title>
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
                        <div style="color: white; margin: 0 0 0 0;">'.$row['name'].'</div>
                        <div style="margin: 0 0 0 0;">'.$error.'</div>
                    </div>
                    <form name="frmContact" method="post" action=" "' .$_SERVER['SCRIPT_NAME']. '"">
                    <div class="user-box">
                      <select name="date" required="" autocomplete="off">
                        <option selected disabled hidden></option>
                        <option value="'.$dateF1.'">'.$dateF1.'</option>
                        <option value="'.$dateF2.'">'.$dateF2.'</option>
                        <option value="'.$dateF3.'">'.$dateF3.'</option>
                      </select>
                      <label>Дата</label>
                    </div>
                    <div class="user-box">
                      <select name="time1" required="" autocomplete="off">
                        <option selected disabled hidden></option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                      </select>
                      <label>С</label>
                    </div>
                    <div class="user-box">
                      <select name="time2" required="" autocomplete="off">
                        <option selected disabled hidden></option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                      </select>
                      <label>До</label>
                    </div>
                    <div class="user-box">
                    <label style="top:0; position:relative;">Комментарий</label>
                    <textarea rows="5" maxlength="200" placeholder="Хочу замоделить кампус" required="" autocomplete="off" name="comment"></textarea>
                    </div>
                      <input class="prikol" type="submit" name="prikol" id="Submit" value="Отправить">
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
                    
                    // Если функция возвращает true, то вы входите
            $date1 = new DateTime();
            $date2 = new DateTime();
            $date3 = new DateTime();

            // Modify the date it contains
            $date1->modify('next monday');
            $date2->modify('next monday +1 week');
            $date3->modify('next monday +2 week');

            // Output
            $dateF1 = $date1->format('d.m.Y');
            $dateF2 = $date2->format('d.m.Y');
            $dateF3 = $date3->format('d.m.Y');
            
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <link rel="icon" href="/assets/images/fox.png">
                <link rel="stylesheet" href="/assets/css/main_style.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="/assets/css/main_mobile.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" type="text/css" media="(orientation: portrait)" href="assets/css/mobile.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="stylesheet" type="text/css" media="(orientation: landscape)" href="assets/css/style.css?version=3.2'.get_cache_prevent_string().'">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Montserrat:wght@400;800&family=Press+Start+2P&display=swap" rel="stylesheet">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
                <script src="/assets/js/loading.js"></script>
            
                <title>IMCTech - G468</title>
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
                        <div style="color: white; margin: 0 0 0 0;">'.$row['name'].'</div>
                        <div style="margin: 0 0 0 0;">'.$error.'</div>
                    </div>
                    <form name="frmContact" method="post" action=" "' .$_SERVER['SCRIPT_NAME']. '"">
                    <div class="user-box">
                      <select name="date" required="" autocomplete="off">
                        <option selected disabled hidden></option>
                        <option value="'.$dateF1.'">'.$dateF1.'</option>
                        <option value="'.$dateF2.'">'.$dateF2.'</option>
                        <option value="'.$dateF3.'">'.$dateF3.'</option>
                      </select>
                      <label>Дата</label>
                    </div>
                    <div class="user-box">
                      <select name="time1" required="" autocomplete="off">
                        <option selected disabled hidden></option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                      </select>
                      <label>С</label>
                    </div>
                    <div class="user-box">
                      <select name="time2" required="" autocomplete="off">
                        <option selected disabled hidden></option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                      </select>
                      <label>До</label>
                    </div>
                    <div class="user-box">
                    <label style="top:0; position:relative;">Комментарий</label>
                    <textarea rows="5" maxlength="200" placeholder="Хочу замоделить кампус" required="" autocomplete="off" name="comment"></textarea>
                    </div>
                      <input class="prikol" type="submit" name="prikol" id="Submit" value="Отправить">
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
    if (strpos($_REQUEST['login'], 'dvfu.ru') == true) {
      $error = "Логин = почта без @students.dvfu.ru";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta charset="UTF-8">
    <meta property="og:type"             content="article"/>
    <meta property="og:locale"           content="ru_RU"/>
    <meta property="og:site_name"        content="IMCTech - G468"/>
    <meta property="og:title"            content="IMCTech - G468"/>
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
    <script src="/assets/js/loading.js"></script>

    <title>IMCTech - G468</title>
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
            <div class="regist"><a href="https://imctech.ru/registration">Регистрация</a></div>
        </div>
        <form name="frmContact" method="post" action="<?= $_SERVER['SCRIPT_NAME'] ?>">
            <div class="user-box">
                <input type="text" name="login" required="" autocomplete="off">
                <label>Логин</label>
                <div>ivanov.ii</div>
            </div>
            <div class="user-box">
                <input type="password" name="pass" required="" autocomplete="off">
                <label>Пароль</label>
                <div>***</div>
            </div>
          <input class="prikol" type="submit" name="Submit" id="Submit" value="Войти">
        </form>
      </div>
</body>
</html>