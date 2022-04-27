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
 
// Проверка есть ли хеш
if ($_REQUEST['hash']) {
    // Кладём этот хеш в отдельную переменную 
    $hash = $_REQUEST['hash'];
    // Проверка на то, что есть пользователь с таки хешом
    $proverka = mysqli_query($db, "SELECT `id` FROM `tbl_reg` WHERE `hash`='" . $hash . "'");
    $proverka = mysqli_fetch_assoc($proverka);
    if (isset($proverka)) {
        // Цикл для получение пользователя с таким хешом
        if (isset($_REQUEST['Submit'])) {
            if ($_REQUEST['new_pass'] == $_REQUEST['new_pass_rep']) {
                $new_pass = $_REQUEST['new_pass'];
                $hased_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $result = mysqli_query($db, "SELECT `id` FROM `tbl_reg` WHERE `hash`='" . $hash . "'");
                while( $row = mysqli_fetch_assoc($result) ) { 
                mysqli_query($db, "UPDATE `tbl_reg` SET password = '$hased_pass' WHERE id=" . $row['id']);
                $new_hash = md5($hash . time());
                mysqli_query($db, "UPDATE `tbl_reg` SET hash= '$new_hash' WHERE id=" . $row['id']);
                }
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
                    <meta http-equiv="Refresh" content="6; URL=https://imctech.ru/">

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
                            <h1 class="box-name">Пароль обновлен</h1>
                            <div class="box-text">Теперь вы можете использовать новый пароль для входа в систему</div>
                            <div class="box-text"><text>Перенаправляем вас на главную страницу...</text></div>
                    </div>
                    <img src="/assets/images/fedya1.png" class="fedya1-m">
                    </div>
                </body>
                </html>';
                exit; 
            }
            else {
                $error = "Пароль не совпадает";
            }
        }
        echo
        '<!DOCTYPE html>
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
        
              <div class="reg-box">
                <div class="regname">Восстановление
                    <div class="error">'.$error.'</div>
                </div>
                <form name="frmContact" method="post" action=""' .$_SERVER['SCRIPT_NAME']. '"">
                    <div class="user-box">
                        <input type="password" name="new_pass" required="" autocomplete="off">
                        <label>Новый пароль</label>
                        <div>***</div>
                    </div>
                    <div class="user-box">
                        <input type="password" name="new_pass_rep" required="" autocomplete="off">
                        <label>Повторите пароль</label>
                        <div>***</div>
                    </div>
                  <input class="prikol" type="submit" name="Submit" id="Submit" value="Отправить">
                </form>
              </div>
        </body>
        </html>';


    } else {
        echo "Письмо недействительно";
    }
} else {
    echo "Письмо недействительно";
}
?>