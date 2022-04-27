<?php
    // Init
    define( "DEBUGGING", true ); // or false in production enviroment
    // Functions
    function get_cache_prevent_string( $always = false ) {
        return (DEBUGGING || $always) ? date('_Y-m-d_H:i:s') : "";
    }

    define('__ROOT__', dirname(dirname(__FILE__)));
    include (__ROOT__. '/lib/functions.php');
    include (__ROOT__. '/lib/pschoolcounter.php');
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

    <a href="statistic"><img class="charts" src="assets/images/chart.png"></a>

    <div class="intro">
      <div class="containerglitch">
        <div class="stack" style="--stacks: 3;">
          <span style="--index: 0;">ПРОЕКТНАЯ ШКОЛА</span>
          <span style="--index: 1;">ПРОЕКТНАЯ ШКОЛА</span>
          <span style="--index: 2;">ПРОЕКТНАЯ ШКОЛА</span>
        </div>
        <h1 class="intro_subtitle">join us</h1>
      </div>
      <a href="https://imctech.ru/registration-on-pschool" class="btn">Участвовать</a>
      <!-- <a class="btn-grey">Участвовать
        <div class="btn-grey_popup">регистрация закрыта</div>
      </a> -->
      <img src="assets/images/pointer.png" class="pointer">
  </div>

    <div class="projects_bg">
      <div class="projects">
      <div class="reged"><text><?=$pschoolcounter?></text> студентов уже <a class="link" href="https://imctech.ru/registration-on-pschool">зарегистрировалось</a> на Весеннюю проектную школу 2022</div>
        <div class="wrapper">
          <div class="marquee">
            <p>
              VR/AR GameDev blockchain web data science VR/AR GameDev blockchain web data science
            </p>
            <p>
              VR/AR GameDev blockchain web data science VR/AR GameDev blockchain web data science
            </p>
          </div>
        </div>
      </div>
      
      <div class="program">
        <div class="program-box">
          <img src="assets/images/msh.jpg" ></img>
          <div>Мозгоштурм<div>Проектная школа подразумевает под собой выявление существующих проблем и их решение. Для этого и проводится мозгоштурм, во время которого студенты выявляют проблемы и предлагают свой вариант их решения. Также студенты могут выбрать предложенный внешними IT-компаниями кейс</div></div>
        </div>
        <div class="program-box">
          <img src="assets/images/vrar.jpg" ></img>
          <div>VR/AR<div>Виртуальная реальность — та отрасль, в которой инфраструктура и технологии развиваются параллельно с развитием контента. Поэтому ей требуется постоянная разработка того, что пользователи через них будут смотреть и делать. Центр НТИ ДВФУ VR/AR предоставляет возможность студентам войти в VR/AR</div></div>
        </div>
        <div class="program-box">
          <img src="assets/images/gamedev.jpg" ></img>
          <div>GameDev<div>В современном мире создание видеоигр является одним из наиболее крупных сегментов индустрии развлечений и ежегодно приносит миллиарды долларов. Директор ИМКТ и технический директор компании Game Forest Алексанин Григорий Анатольевич с радостью расскажет вам за GameDev</div></div>
        </div>
        </div>
        <div class="program">
          <div class="program-box">
            <img src="assets/images/other.jpg" ></img>
            <div>Прочее<div>Во время проектной школы команда IMCTech проводит интенсивы и по другим IT направлениям: Blockchain, Data Science, Web и другие. Также выступают спикеры из IT компаний: Farpost, Game Forest, Kaspersky, Яндекс и другие - и общественных организаций ДВФУ: Code WORK, ASAP.IT и другие</div></div>
          </div>
          <div class="program-box">
            <img src="assets/images/pres.jpg" ></img>
            <div>Презентация<div>По окончании проектной школы студенты и/или команды презентуют свои проекты. Это не значит, что нужно полностью реализовать проект к этому времени. Вы можете выбрать проект, который придется реализовывать довольно продолжительное время, поэтому на презентации можно представить от проработанной идеи решения проблемы до полностью готового продукта</div></div>
          </div>
          <div class="program-box">
            <img src="assets/images/zak.jpg" ></img>
            <div>Закрытие<div>После активной работы хочется отдохнуть, не так ли? Для этого команда IMCTech выделяет специальный день, когда студенты смогут забыть про все свои заботы и оторваться на всю катушку: настолки, пицца, VR игры и прочие крутые развлечения, которые не заставят тебя заскучать</div></div>
          </div>
          </div>
          <div class="program" style="max-width: 55%;">
            <div class="program-box">
              <img src="assets/images/cov.jpg" ></img>
              <div>Коворкинг<div>Институт математики и компьютерных технологий любезно предоставляет студентам коворкинг в G464 и прочие технические возможности по просьбе. Пока что коворкинг не отличается чем-то прям сверхъестественным, но мы точно им когда-то займемся. Если у вас есть желание нам помочь, то свяжитесь с нами, пожалуйста</div></div>
            </div>
            <div class="program-box">
              <img src="assets/images/farpost.jpg" ></img>
              <div>Сотрудничество<div>Команда IMCTech активно сотрудничает с компаниями: Farpost, Red Bull, Додо Пицца, Slavda Group и другими - и продолжает расширять этот круг. После Зимней проектной школы 2022 студенты, успешно защитившие свои проекты, были приглашены на экскурсию в офис Farpost</div></div>
            </div>
            </div>

    </div>
  
    <div class="projects_bg">
      <img src="assets/images/Abobus.png" class="abobus"></img>

      <div class="projects">
        <div class="wrapper">
          <div class="marquee">
            <p>
              ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ 
            </p>
            <p>
              ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ ПРОЕКТЫ СТУДЕНТОВ 
            </p>
          </div>
        </div>
      </div>


<div class="pj" style="margin-top: 40px;">
  <div class="pj-container">
    <div class="pj-name">FEFU-Сalypse</div>
    <div class="pj-subname">GameDev</div>
    <div class="pj-text">
      <div class="pj-text-a">Команда "FIniSH Square D" создает игру "FEFU-calypse". В данный момент были разработаны концепты и базовый прототип игры.</div>
      <div class="pj-text-a">Сюжет: 2042 год, Владивосток, Covid-19 мутировал из-за чего люди стали превращаться в зомби подобных существ. Одним из последних безопасных мест оставался Русский остров, но вирус проник и туда. И теперь главному герою - студенту, напрочь позабывшему об учёбе, предстоит раздобыть вакцину, спасти мир и сдать экзамен по программированию, который может оказаться для него последним.</div>
      <div class="pj-text-a">Цель проекта: получить конкурентно-способный продукт на видеоигровом рынке. Привлечь внимание потенциальных абитуриентов к университету. Проект - игра в жанре beat'em up, опирающаюся на атмосферу ДВФУ, с использованием платформы для разработки игр: Unity. С реализацией на языке программирования C#. Мотивацией для реализации данного проекта послужила наша любовь к видеоиграм и ДВФУ.</div> 
    </div> 
    <div class="pj-team">Команда:</div>
    <div>
      <a class="pj-team-c" rel="noopener noreferrer" target="_blank"  href="https://vk.com/pepegger">
        <img class="vk" src="/assets/images/vk.png"></img>
        <text>Степанов Владислав - PM</text>
      </a>
       <br>
        <a class="pj-team-c" rel="noopener noreferrer" target="_blank"  href="https://vk.com/kysssssska">
          <img class="vk" src="/assets/images/vk.png"></img>
          <text>Сайфутдинова Илюза</text>
        </a>
    </div>
  </div>
  <img class="pj-img-d" src="assets/images/e8npOp9YoRY.jpg"></img>
  <img class="pj-img-m" src="assets/images/fc.jpg"></img>
</div>

<div class="pj">
  <img class="pj-img-d" src="https://images.wbstatic.net/big/new/33510000/33518126-6.jpg"></img>
  <div class="pj-container">
    <div class="pj-name">VoiceN</div>
    <div class="pj-subname">Социальный проект</div>
    <div class="pj-text">
      <div class="pj-text-a">Команда "VoiceN", в рамках проектной школы, разработала прототип навыка для Алисы, который включает в себя функционал поиска книг и показ новых поступлений в библиотеке "Логос". </div> 
      <div class="pj-text-a">Цель проекта: предоставить слабовидящим людям продукт, с помощью которого они смогут посредством голоса управлять библиотекой. В том числе прослушивать (перематывать, ставить на паузу и тд.) "говорящие книги", ставить их на книжную полку, слушать записанные радиопередачи и пользоваться прочим функционалом библиотеки "Логос".</div> 
      <div class="pj-text-c">"По большей части нашу команду заинтересовала тема работы с голосовым помощником, а также помощь людям с ограниченными возможностями. Этот проект показал, что действительно, люди заинтересованные в достижении цели, способны за короткий срок погрузиться в тему и показать неплохой результат. Естественно, мы будем продолжать работу над проектом."</div>
    </div> 
    <div class="pj-team">Команда:</div>
    <div>
      <a class="pj-team-none"><text>• Грозецкий Денис - PM</text></a>
      <br>
      <a class="pj-team-none"><text>• Гребенников Владимир</text></a>
      <br>
      <a class="pj-team-none"><text>• Голобородько Димитрий</text></a>
      <br>
      <a class="pj-team-none"><text>• Стефановский Артём</text></a>
      <br>
      <a class="pj-team-none"><text>• Святова Марина</text></a>
      <br>
      <a class="pj-team-none"><text>• Похорукова Алина</text></a>
    </div>
  </div>
  <img class="pj-img-m" src="https://s0.rbk.ru/v6_top_pics/media/img/8/34/755276725589348.jpg"></img>
</div>

<div class="pj">
  <div class="pj-container">
    <div class="pj-name">2D платформер</div>
    <div class="pj-subname">GameDev</div>
    <div class="pj-text">
      <div class="pj-text-a">Команда "RandomName_Team" разрабатывает 2D платформер с элементами Rouge like.</div>
      <div class="pj-text-a">Сюжет: некоторые люди постигли тайны ментальных боёв, за победу в которых победитель получает все знания проигравшего, а разум проигравшего стирается. Правила боя задаёт тот, на кого напали/вызвали на бой, сам бой происходит в сознании принимающей стороны, от сюда и правила боя.</div>
      <div class="pj-text-c">"Участие в зимней проектной школе дало мне и моим товарищам много того, чего, просто учась на отлично, не получишь, и я благодарен ребятам из Академии цифровой трансформации и Студенческого совета ИМКТ за то, что смог стать участником такого классного проекта!"</div>
    </div> 
    <div class="pj-team">Команда:</div>
    <div>
      <a class="pj-team-c" rel="noopener noreferrer" target="_blank"  href="https://vk.com/lakmm"><img class="vk" src="/assets/images/vk.png"></img> <text>Кучеров Валентин - PM</text></a>
      <br>
      <a class="pj-team-c" rel="noopener noreferrer" target="_blank"  href="https://vk.com/vcitich"><img class="vk" src="/assets/images/vk.png"></img><text>Нехорошев Виктор</text></a>
      <br>
      <a class="pj-team-c" rel="noopener noreferrer" target="_blank"  href="https://vk.com/k.matrosova2000"><img class="vk" src="/assets/images/vk.png"></img> <text>Потега Ксения</text></a>
      <br>
      <a class="pj-team-c" rel="noopener noreferrer" target="_blank"  href="https://vk.com/e.maslichenko"><img class="vk" src="/assets/images/vk.png"></img><text>Масличенко Елизавета</text></a>
    </div>
  </div>
  <img class="pj-img-m" src="assets/images/rntm.png"></img>
  <img class="pj-img-d" src="assets/images/rnt.png"></img>
</div>

<div class="pj" style="margin-bottom: 0;">
  <img class="pj-img-d" src="assets/images/fpw.jpg"></img>
  <div class="pj-container">
    <div class="pj-name">FEFU Prepod Wiki</div>
    <div class="pj-subname">Социальный проект</div>
    <div class="pj-text">
      <div class="pj-text-a">Команда "FEFU Prepod Wiki" разработала одноименного <a class="link" rel="noopener noreferrer" target="_blank" href="https://t.me/fefu_prepod_bot">telegram-бота,</a> который по запросу студента выдает основную информацию о преподавателе.</div> 
      <div class="pj-text-a">Для соблюдения этики по отношению к преподавателям они отказались от простой публикации отзывов, так как на эмоциях студент может написать некорректную или неточную информацию. Поэтому они выкладывают в карточки только сухие факты, исходя из статистики. </div> 
      <div class="pj-text-c">"Сама идея у меня возникла после того, как я, будучи первокурсницей, столкнулась с большим количеством новых преподавателей. Неизвестно, что ждёт в новом семестре, непонятно, к чему готовиться, хотелось бы иметь какую-то небольшую базу знаний для того, чтобы найти правильный подход к обучению... Пока мы действуем только внутри ИМКТ, но если другие школы и институты заинтересуются данным проектом, то наша команда всегда открыта к обсуждению и дальнейшему расширению базы данных преподавателей."</div>
      <div class="pj-text-a">Оставить отзыв о преподавателе можно в <a class="link" rel="noopener noreferrer" target="_blank" href="https://forms.gle/HDTXgY6gjUb1WLKw5">гугл-форме.</a></div> 
    </div> 
    <div class="pj-team">Команда:</div>
    <div>
      <a class="pj-team-c" href="https://vk.com/va_hahahaha" rel="noopener noreferrer" target="_blank"><img class="vk" src="/assets/images/vk.png"></img> <text>Юрина Валентина - PM</text></a>
      <br>
      <a class="pj-team-c" href="https://vk.com/idlalexandro" rel="noopener noreferrer" target="_blank"><img class="vk" src="/assets/images/vk.png"></img> <text>Пушкарев Александр</text></a>
      <br>
      <a class="pj-team-c" href="https://m.vk.com/floorisslava" rel="noopener noreferrer" target="_blank"><img class="vk" src="/assets/images/vk.png"></img> <text>Кадомцев Вячеслав</text></a>
    </div>
  </div>
  <img class="pj-img-m" src="assets/images/fpw_m.jpg"></img>
</div>
</div>
</div>


    <div class="footer" id="end">
        <div class="flogo_container">
            <a rel="noopener noreferrer" target="_blank" href="https://www.dvfu.ru"><img class="flogo" src="/assets/images/logos/dvfu.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vk.com/imct_fefu"><img class="flogo" src="/assets/images/logos/imct.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://russky.digital"><img class="flogo" src="/assets/images/logos/rd.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vrnti.ru"><img class="flogo" src="/assets/images/logos/nti.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://www.sberbank.ru"><img class="flogo" src="/assets/images/logos/sber.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://www.farpost.ru"><img class="flogo" src="/assets/images/logos/farpost.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://www.slavda.ru"><img class="flogo" src="/assets/images/logos/slavda.png"></a>
        </div>
        <div class="flogo_container-m">
            <a rel="noopener noreferrer" target="_blank" href="https://www.dvfu.ru"><img class="flogo" src="/assets/images/logos/dvfu.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vk.com/imct_fefu"><img class="flogo" src="/assets/images/logos/imct.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://russky.digital"><img class="flogo" src="/assets/images/logos/rd.png"></a>
        </div>
        <div class="flogo_container-m" style="padding: 10px 70px;">
            <a rel="noopener noreferrer" target="_blank" href="https://www.sberbank.ru"><img class="flogo" src="/assets/images/logos/sber.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://www.farpost.ru"><img class="flogo" src="/assets/images/logos/farpost.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://vrnti.ru"><img class="flogo" src="/assets/images/logos/nti.png"></a>
            <a rel="noopener noreferrer" target="_blank" href="https://www.slavda.ru"><img class="flogo" src="/assets/images/logos/slavda.png"></a>
        </div>
            <div class="footer-text"><?=$pschoolcounter?> студентов уже <a class="link" href="https://imctech.ru/registration-on-pschool">зарегистрировалось</a> на Весеннюю проектную школу 2022</div>
            <div class="footer-text">IMCTech — объединение сотрудников из Академии цифровой трансформации и учащихся из Студенческого совета ИМКТ</div>
            <div class="footer-text">Поддержка - <a class="link" href="mailto:support@imctech.ru">support@imctech.ru</a></div>
            <div class="footer-subtext">Сделано в IMCT</div>
    </div>

  <script>
    var scrUp = document.getElementById("scrup");
  </script>

</body>
</html>