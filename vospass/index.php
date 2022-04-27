<?php
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }

// Подключаем к БД
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/lib/db.php');
 
// Проверяем нажата ли кнопка отправки формы
if (isset($_REQUEST['Submit'])) {
    $email = $_REQUEST['email'];
    if (strpos($_REQUEST['email'], 'dvfu.ru') == true) {
        if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
            $secret = '6LcYs80eAAAAADvFWZdflvdgOvR1sQCCyrqUsugE';
            $ip = $_SERVER['REMOTE_ADDR'];
            $response = $_POST['g-recaptcha-response'];
            $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
            $arr = json_decode($rsp, TRUE);
            if ($arr['success']) {

        $bd_id = mysqli_fetch_assoc(mysqli_query($db, "SELECT `id` FROM `tbl_reg` WHERE `email`='$email' AND email_confirmed = 1"));
        if (isset($bd_id)) {
            // хешируем хеш, который состоит из email и времени
            $hash = md5($email . time());
            
            // Переменная $headers нужна для Email заголовка
            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "To: <$email>\r\n";
            $headers .= "From: <support@imctech.ru>\r\n";
            // Сообщение для Email
            $message = '
                    <html>
                    <head>
                    <title>Восстановление пароля</title>
                    </head>
                    <body>
                    <p>Чтобы восстановить пароль перейдите по <a href="http://imctech.ru/vospass/genpass.php?hash=' . $hash . '">ссылке</a></p>
                    </body>
                    </html>
                    ';
            
            // Меняем хеш в БД
            mysqli_query($db, "UPDATE `tbl_reg` SET hash='$hash' WHERE email='$email' AND email_confirmed = 1");
            // проверка отправилась ли почта
            if (mail($email, "Восстановление пароля через Email", $message, $headers)) {
                // Если да, то выводит сообщение
                echo '
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

                        <title>IMCTech - Восстановление пароля</title>
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
                                <h1 class="box-name">Сообщение отправлено</h1>
                                <div class="box-text">Чтобы восстановить пароль, нужно перейти по ссылке в присланном письме</div>
                                <div class="box-text">Проверьте папку "Спам" или "Нежелательная почта"</div>
                                <div class="box-text">В случае возникновения проблем обратитесь в поддержку - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></text></div>
                        </div>
                        <img src="/assets/images/fedya1.png" class="fedya1-m">
                        </div>
                    </body>
                    </html>';
                    exit;
            } else {
                $error = "Письмо почему-то не отправилось";
            }
        }
        else {$error = "Почты не существует";}
    }
    else {$error = "Капча не пройдена";}
}
else {$error = 'Не установлен флажок "Я не робот"';}
    } else {
        // Если ошибка есть, то выводить её 
        $error = "Введите корпоративную почту ДВФУ"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/images/fox.png">
    <link rel="stylesheet" href="/assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/style.css">
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

    <title>IMCTech - Сброс пароля</title>
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
        <div class="regname">Восстановление
            <div class="error" id="recaptchaError"><?=$error?></div>
        </div>
        <form name="frmContact" method="post" action="<?= $_SERVER['SCRIPT_NAME'] ?>">
            <div class="user-box">
                <input type="text" name="email" required="" autocomplete="off">
                <label>Почта ДВФУ</label>
                <div>ivanov.ii@students.dvfu.ru</div>
            </div>
            <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcYs80eAAAAAHcpAI3xP1tKPyGWUXgX01K2Y75R"></div>
          <input class="prikol" type="submit" name="Submit" id="Submit" value="Отправить">
        </form>
      </div>
</body>
</html>