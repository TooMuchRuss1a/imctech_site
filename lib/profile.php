<?php

function profile($login, $pass) {
    if (isset($_COOKIE['login']) && (isset($_COOKIE['password']))) {
        define('__ROOT__', dirname(dirname(__FILE__)));
        include('db.php');

        // берёт из БД пароль и id пользователя 
        $takeID = mysqli_query($db, "SELECT `id` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
        if (mysqli_num_rows($takeID) > 0) {
            $result = mysqli_query($db, "SELECT `password`, `id`, `name`, `agroup`, `email`, `vk`, `tg`, `ban` FROM `tbl_reg` WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
            while( $row = mysqli_fetch_assoc($result) ){ 
                // Проверяет есть ли id
                if ($row['id']) {
                    // если id есть, то он сравнивает пароли функцией password_verify
                    if (password_verify($pass, $row['password'])) {
                      echo '
                      <h1 class="box-profile-name">Профиль</h1>
                      <div class="box-profile-fio">'.$row['name'].'</div>
                      <div class="box-profile-text">'.$row['agroup'].'</div>
                      <div class="box-profile-text"><a rel="noopener noreferrer" target="_blank" href="'.$row['vk'].'" class="link">'.$row['vk'].'</a></div>
                      <div class="box-profile-text"><a href="mailto:'.$row['email'].'" class="link">'.$row['email'].'</a></div>
                      <div class="box-profile-text">TgID: '.$row['tg'].'</div>';
                    }
                }
            }
        }
    }
}
?>