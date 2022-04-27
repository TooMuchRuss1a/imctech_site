<?php 
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }

// Подключаем коннект к БД
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/lib/db.php');
 
// Проверяем нажата ли кнопка отправки формы
if (isset($_REQUEST['Submit'])) {
    $email_form = $_REQUEST['email'];
    $name_form = $_REQUEST['name'];
    $agroup_form = $_REQUEST['agroup'];
    $vk_form = $_REQUEST['vk'];
    $tg_form = $_REQUEST['tg'];

    
    // Все последующие проверки, проверяют форму и выводят ошибку
    // Проверка на совпадение паролей
    if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) {
        $error = 'Пароль не совпадает';
    }
    
    // Проверка есть ли вообще повторный пароль
    if (!$_REQUEST['pass_rep']) {
        $error = 'Введите повторный пароль';
    }
    
    // Проверка есть ли пароль
    if (!$_REQUEST['pass']) {
        $error = 'Введите пароль';
    }
 
    // Проверка есть ли email
    if ((strpos($_REQUEST['email'], 'dvfu.ru') == false)) {
        $error = 'Введите корпоративный email ДВФУ';
    }

    // Проверка есть ли ФИО
    if (!$_REQUEST['name']) {
        $error = 'Введите ФИО';
    }

    // Проверка ФИО на наличие только букв
    if (preg_match('/[^а-я ^ё]+/msiu', $_REQUEST['name'])) {
        $error = 'Введите ФИО только русскими буквами';
    }
 
    // Проверка есть ли группа
    if (!$_REQUEST['agroup']) {
        $error = 'Введите группу';
    }

    if (!ctype_digit($_REQUEST['tg'])) {
        $error = 'Telegram ID состоит только из цифр';
    }

    $emailID = mysqli_query($db, "SELECT id FROM tbl_reg WHERE (email='".mysqli_real_escape_string($db, $_REQUEST['email'])."' AND email_confirmed=1)");
    if(mysqli_num_rows($emailID) > 0)
    {
        $error = 'Эта почта уже зарегистрирована';
    }

    if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
        $secret = '6LcYs80eAAAAADvFWZdflvdgOvR1sQCCyrqUsugE';
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
        $arr = json_decode($rsp, TRUE);
        if ($arr['success']) {
        }
        else {$error = "Капча не пройдена";}
    }
    else {$error = 'Не установлен флажок "Я не робот"';}
 
    // Если ошибок нет, то происходит регистрация 
    if (!$error) {
        $email = $_REQUEST['email'];
        $mass = explode("@", $email);
        $login = $mass[0];
        $name = $_REQUEST['name'];
        $agroup = $_REQUEST['agroup'];
        $vk = $_REQUEST['vk'];
        $tg = $_REQUEST['tg'];

        // Пароль хешируется
        $pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT);
        // хешируем хеш, который состоит из логина и времени
        $hash = md5($login . time());
        
        // Переменная $headers нужна для Email заголовка
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "To: <$email>\r\n";
        $headers .= "From: <confirm@imctech.ru>\r\n";
        // Сообщение для Email
        $message = '
                <html>
                <head>
                <title>Подтвердите Email</title>
                </head>
                <body>
                <p>Чтобы подтвердить Email, перейдите по <a rel="noopener noreferrer" target="_blank" href="http://imctech.ru/registration/confirmed.php?hash=' . $hash . '">ссылке</a></p>
                </body>
                </html>
                ';
        
        // Добавление пользователя в БД
        date_default_timezone_set('Asia/Vladivostok');
        $reg_date = date("H:i:s d.m.Y");
        mysqli_query($db, "INSERT INTO `tbl_reg` (`id`, `login`, `email`, `name`, `agroup`, `vk`, `tg`, `password`, `hash`, `email_confirmed`, `ban`, `is_admin`, `reg_date`) VALUES ('0', '$login', '$email', '$name', '$agroup', '$vk', '$tg', '$pass', '$hash', '0', '0', '0', '$reg_date')");
        // проверяет отправилась ли почта
        if (mail($email, "Подтвердите Email на сайте", $message, $headers)) {
            // Если да, то выводит сообщение
            header('Location: confirm');
            exit;
        }
    } else {
        // Если ошибка есть, то выводить её 
        // $error; 
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

      <div class="reg-box">
        <div class="regname">Регистрация
            <div class="error"><?=$error?></div>
        </div>
        <form name="frmContact" method="post" action="<?= $_SERVER['SCRIPT_NAME'] ?>">
            <div class="user-box">
                <input type="text" name="email" required="" autocomplete="off" value="<?= $email_form?>">
                <label>Почта ДВФУ</label>
                <div>ivanov.ii@students.dvfu.ru</div>
            </div>
            <div class="user-box">
                <input type="password" name="pass" required="" autocomplete="off">
                <label>Придумайте пароль</label>
                <div>***</div>
            </div>
            <div class="user-box">
                <input type="password" name="pass_rep" required="" autocomplete="off">
                <label>Повторите пароль</label>
                <div>***</div>
            </div>
            <div class="user-box">
                <input type="text" name="name" required="" autocomplete="off" value="<?= $name_form?>">
                <label>ФИО</label>
                <div>Иванов Иван Иванович</div>
            </div>
            <div class="user-box">
                <input type="text" name="agroup" required="" autocomplete="off" value="<?= $agroup_form?>">
                <label>Группа</label>
                <div>Б1234-01.01.01при</div>
            </div>
            <div class="user-box">
                <input type="text" name="vk" required="" autocomplete="off" value="<?= $vk_form?>">
                <label>Ссылка на ВК</label>
                <div>https://vk.com/durov</div>
            </div>
            <div class="user-box" style="margin-bottom: 40px;">
                <input type="text" name="tg" required="" autocomplete="off" value="<?= $tg_form?>">
                <label>Telegram ID</label>
                <div>1234567890</div>
                <a rel="noopener noreferrer" target="_blank" href="https://imctech.ru/tgid">Как узнать телеграм ID?</a>
            </div>
            <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcYs80eAAAAAHcpAI3xP1tKPyGWUXgX01K2Y75R"></div>
          <input class="prikol" type="submit" name="Submit" id="Submit" value="Зарегистрироваться">
        </form>
      </div>
</body>
</html>