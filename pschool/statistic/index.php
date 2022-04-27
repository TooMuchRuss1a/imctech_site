<?php
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }

    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    include (__ROOT__. '/lib/functions.php');
    include (__ROOT__. '/lib/pschoolcounter.php');
    include (__ROOT__. '/lib/db.php');

    $groups = array();
    $result = mysqli_query($db, "SELECT `agroup` FROM `tbl_springpschool2022` ORDER BY agroup");
        while( $row = mysqli_fetch_assoc($result) ){
            // echo $row['agroup'];
            if (isset($groups[substr($row['agroup'], 7)])) {
                $groups[substr($row['agroup'], 7)]++;
            }
            else {
                $groups[substr($row['agroup'], 7)] = 1;
            }
        }
        ksort($groups);
        foreach ($groups as $key => $value) {
            $groupsArray .= '["'.$key.'", ' . $value . '],';
            // echo '"'.$key.'"', $value;
        }


        // echo $groupsArray;
        $table = "";
        $result = mysqli_query($db, "SELECT `project`, `customer`, `team`, `students` FROM `tbl_projects` ORDER BY id DESC");
        while( $row = mysqli_fetch_assoc($result) ){
            $table .= '<tr><td>'.$row['project'].'</td><td>'.$row['customer'].'</td><td>'.$row['team'].'</td><td>'.$row['students'].'</td></tr>';
        }
        // $table .= "<tr>
        // <td>1</td>
        // <td>1</td>
        // <td>1</td>
        // <td>1</td></tr>";


        

        // <tr>
        //             <td>Gloria</td>
        //             <td>Reeves</td>
        //             <td>67439</td>
        //             <td>10/18/1985 <br> 10/18/1985 <br> 10/18/1985</td>
        // </tr>

        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta charset="UTF-8">
    <meta property="og:type"             content="article"/>
    <meta property="og:locale"           content="ru_RU"/>
    <meta property="og:site_name"        content="IMCTech"/>
    <meta property="og:title"            content="Проектная школа"/>
    <meta property="og:description"      content="JOIN US"/>
    <meta property="og:url"              content="https://imctech.ru/pschool"/>
    <meta property="og:image"            content="https://imctech.ru/assets/images/pschool.jpg"/>
    <meta property="og:image:secure_url" content="https://imctech.ru/assets/images/pschool.jpg"/>
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
    <script src="/assets/js/scroll.js"></script>
    <script src="/assets/js/loading.js"></script>
    <script src="/assets/js/dropdown.js?version=3.2<?php echo get_cache_prevent_string(); ?>"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Направление подготовки', 'Кол-во'],
            <?=$groupsArray?>
        ]);

        var options = {
            'chartArea': {
    'backgroundColor': {
        'fill': '#111',
        'opacity': 100
     },
 },
          colors: ['#ddd'],
          backgroundColor: '#111',
          legend: { position: 'none' },
          chart: {
            title: 'Аналитика по направлениям',
            subtitle: 'Весенняя проектная школа' },
          axes: {
            x: {
              0: { side: 'down', label: 'Всего - <?=$pschoolcounter?> студентов'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>

    <title>IMCTech</title>
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


    <a href="#">
      <div id="scrup" class="scroll-up"></div>
    </a>

    <div class="intro_title">АНАЛИТИКА</div>
    <table class="table">
        <thead>
            <tr>
                <th>ПРОЕКТ</th>
                <th>ЗАКАЗЧИК</th>
                <th>КОМАНДА</th>
                <th>ИСПОЛНИТЕЛИ</th>
            </tr>
        </thead>
        <tbody>
            <?=$table ?>
        </tbody>
    </table>
    <div id="top_x_div" class="gstat"></div>

    <div class="footer" id="end">
        <div class="flogo_container">
            <a rel="noopener noreferrer" target="_blank" href="https://www.dvfu.ru"><img class="flogo" src="/assets/images/logos/dvfu.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vk.com/imct_fefu"><img class="flogo" src="/assets/images/logos/imct.png"></a>
        </div>
        <div class="flogo_container-m">
            <a rel="noopener noreferrer" target="_blank" href="https://www.dvfu.ru"><img class="flogo" src="/assets/images/logos/dvfu.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vk.com/imct_fefu"><img class="flogo" src="/assets/images/logos/imct.png"></a>
        </div>
            <div class="footer-text">IMCTech — объединение сотрудников из Академии цифровой трансформации и учащихся из Студенческого совета ИМКТ</div>
            <div class="footer-text">Поддержка - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></div>
            <div class="footer-subtext">Сделано в IMCT</div>
    </div>

  <script>
    var scrUp = document.getElementById("scrup");
  </script>

</body>
</html>