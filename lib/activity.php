<?php

function activity($login, $pass) {
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
                      $email = $row['email'];

                      $result2 = mysqli_query($db, "SELECT `project` FROM `tbl_springpschool2022` WHERE `email`='" . $email . "'");
                      while( $row2 = mysqli_fetch_assoc($result2) ){
                        $project = $row2['project'];
                        if (isset($project)) {
                          echo '<div class="sps2022">Весенняя проектная школа <div>'.$project.'</div>  <div>2022</div></div>';
                        }
                      }
                      $result3 = mysqli_query($db, "SELECT `project` FROM `tbl_winterpschool2022` WHERE `email`='" . $email . "'");
                      while( $row3 = mysqli_fetch_assoc($result3) ){
                        $project2 = $row3['project'];
                        if (isset($project2)) {
                          echo '<div class="wps2022">Зимняя проектная школа <div>'.$project2.'</div>  <div>2022</div></div>';
                        }
                      }
                    }
                }
            }
        }
    }
}
?>