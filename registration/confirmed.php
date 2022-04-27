<?php
// Подключаем коннект к БД
define('__ROOT__', dirname(dirname(__FILE__)));
require_once (__ROOT__.'/lib/db.php');
 
// Проверка есть ли хеш
if ($_GET['hash']) {
    $hash = $_GET['hash'];
    // Получаем id и подтверждено ли Email
    if ($result = mysqli_query($db, "SELECT `id`, `email_confirmed` FROM `tbl_reg` WHERE `hash`='" . $hash . "'")) {
        while( $row = mysqli_fetch_assoc($result) ) { 
            // echo $row['id'] . " " . $row['email_confirmed'];
            // Проверяет получаем ли id и Email подтверждён ли 
            if ($row['email_confirmed'] == 0) {
                // Если всё верно, то делаем подтверждение
                mysqli_query($db, "UPDATE `tbl_reg` SET `email_confirmed`=1 WHERE `id`=". $row['id'] );
                // echo "Email подтверждён";
                header('Location: confirmed');
                exit;
            } else {
                // echo "Что то пошло не так 1";
            }
        } 
    } else {
        // echo "Что то пошло не так 2";
    }
} else {
    // echo "Что то пошло не так 3";
}

?>