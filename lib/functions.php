<?php
$private_key = "!=§$/$%/$!&$%!!$$&=§=$%$!%&$%";
$status_g468 = 1;

function login($login, $pass) {
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
                        if ($row['ban'] == "0") {
                          date_default_timezone_set('Asia/Vladivostok');
                          $act_date = date("H:i:s d.m.Y");
                          mysqli_query($db, "UPDATE `tbl_reg` SET `last_activity` = '$act_date' WHERE (`login`='" . $login . "' AND `email_confirmed` = 1)");
                            $msg = '<div class="dropdown1">
                            <button onclick="myFunction()" class="dropbtn1">'.$login.'</button>
                            <div id="myDropdown1" class="dropdown1-content">
                            <div class="dd-text">ФИО</div>
                            <div class="dd-text-description">'.$row['name'].'</div>
                            <div class="dd-text">Группа</div>
                            <div class="dd-text-description">'.$row['agroup'].'</div>
                            <div class="dd-text">ВК</div>
                            <div style="text-transform:lowercase;" class="dd-text-description">'.$row['vk'].'</div>
                            <div class="dd-text">email</div>
                            <div style="text-transform:lowercase;" class="dd-text-description">'.$row['email'].'</div>
                            <div class="dd-text">Tg ID</div>
                            <div class="dd-text-description">'.$row['tg'].'</div>
                            <div class="dd-text"><a href="https://imctech.ru/profile">Профиль</a><a href="https://imctech.ru/login/unlogin.php">Выход</a></div>
                            </div>
                          </div>';
                        }
                        else {
                            // setcookie("login", "", time()-(60*60*24*7), '/', "imctech.ru");
                            // setcookie("password", "", time()-(60*60*24*7), '/', "imctech.ru");
                            $msg = '<div class="dropdown1">
                            <button onclick="myFunction()" class="dropbtn1" style="color:rgb(255,50,50);">'.$login.'</button>
                            <div id="myDropdown1" class="dropdown1-content">
                            <div class="dd-text"><a href="https://imctech.ru/profile">Профиль</a></div>
                            <div class="dd-text" style="color:rgb(255,50,50);">вы заблокированы</div>
                            <div class="dd-text-description" style="color:rgb(255,50,50);">'.$row['ban'].'</div>
                            <div class="dd-text"><a href="https://imctech.ru/profile">Профиль</a><a href="https://imctech.ru/login/unlogin.php">Выход</a></div>
                            </div>
                          </div>';
                        }
                    }
                    else {
                        // setcookie("login", "", time()-(60*60*24*7), '/', "imctech.ru");
                        // setcookie("password", "", time()-(60*60*24*7), '/', "imctech.ru");
                        $msg = '<a class="nav_link" href="https://imctech.ru/login">Войти</a>';
                    }
                }
                else {
                    // setcookie("login", "", time()-(60*60*24*7), '/', "imctech.ru");
                    // setcookie("password", "", time()-(60*60*24*7), '/', "imctech.ru");
                    // $msg = '<a class="nav_link" href="https://imctech.ru/login">Войти</a>';
                }
            }
        }
        else {
            // setcookie("login", "", time()-(60*60*24*7), '/', "imctech.ru");
            // setcookie("password", "", time()-(60*60*24*7), '/', "imctech.ru");
            // $msg = '<a class="nav_link" href="https://imctech.ru/login">Войти</a>';
        }
    }
    else {
      $msg = '<a class="nav_link" href="https://imctech.ru/login">Войти</a>';
    }
    return $msg;
}

$dropdown = '<div class="dropdown">
    <div class="dropdown-title">команда</div>
    <div id="dd" class="dropdown-content">
      <div>
        <a rel="noopener noreferrer" target="_blank" href="https://vk.com/toomuchrussia">
          <img class="ava" src="https://sun1-13.userapi.com/s/v1/ig2/fPsYN6_XW7T4EGDupn29sO9mzkJmFCELz6szWrxIPZZtOQYdTGi3zkBWoADCimQzYeQM29QkGw5cHQ_aH6WQKHUi.jpg?size=50x50&quality=95&crop=165,150,1344,1344&ava=1"></img>
          <text>Демьянов Виктор Витальевич </text>
          <div>Заместитель председателя сс имкт</div>
          <div class="subtext">по всем вопросам</div>
        </a>
      </div>
      <div>
        <a rel="noopener noreferrer" target="_blank" href="https://vk.com/mkhrmval">
          <img class="ava" src="https://sun1-21.userapi.com/s/v1/ig2/GcWYipbACwcb17m6FXoqd3J7SxAxvvRjCfy96ozmnRKsL17ui2BZ_Q2WVxsGlQAI--GtnubugXcd3Ch1HKF095YC.jpg?size=50x50&quality=95&crop=316,142,466,466&ava=1"></img>
          <text>Мухарамова Алина ринатовна</text>
          <div>Председатель сс имкт</div>
        </a>
      </div>
      <div>
        <a rel="noopener noreferrer" target="_blank" href="https://vk.com/pikvic">
          <img class="ava" src="https://sun1-19.userapi.com/s/v1/ig1/oy-846-21e3Aq9ofWmzLiZV1_RDWNWJ87Cqjz7uUwgWaB-IvY0-yIjFOIAkzjST7aM3Wn2du.jpg?size=50x50&quality=96&crop=1,0,1438,1438&ava=1"></img>
          <text>Загуменнов Алексей андреевич</text>
          <div>директор центра прикладных исследований и разработок</div>
        </a>
      </div>
      <div>
        <a rel="noopener noreferrer" target="_blank" href="https://vk.com/academy4">
          <img class="ava" src="https://sun1-92.userapi.com/s/v1/ig2/F1gvETTPyhmGGTI_lLtexR5Iks16KADGCPt-frTWeoPz2Owl9m3ozilfXnPjYnHVRDUjR8xAzXqm5r0OA3GzdiXE.jpg?size=50x50&quality=96&crop=0,0,640,640&ava=1"></img>
          <text>Еременко Александр Сергеевич</text>
          <div>директор академии цифровой трансформации</div>
        </a>
      </div>
    </div>
  </div>';

?>