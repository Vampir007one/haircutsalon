<?php
    session_start();
    include("pages/connect.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="urf-8">
<meta name="robots" content="index, follow">
<meta name="Description" content="Официальный сайт сети парикмахерских Самая-Самая">
<meta name="Keywords" content="Парикмахерская Самая-Самая">
<meta name="Author" lang="ru" content="Парикмахерская Самая-Самая">

<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" async="" src="js/watch.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="js/cusel-min-2.5.js"></script>
<script type="text/javascript" src="js/icheck.min.js"></script>

<title>Парикмахерская Самая-Самая.</title>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div class="logo">
            <img src="img/logo.png" alt="Парикмахерская Самая-Самая">
        </div>
        <nav class="nav-menu">
            <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/nav-menu.php")?>
        </nav>
    </div>
    <div class="container">
        <div id="aside">
            <div class="message">НАЙДИ СВОЕГО <span>МАСТЕРА</span></div>
            <?php 
                if (!isset($_SESSION['id'])) 
                {
                    include("pages/userAuth/form_auth.php"); 
                }
                else
                {
                    if (isset($_SESSION['id'])) 
                    {
print <<<HERE
<p>Добро пожаловать $_SESSION[username]</p>
HERE;
                    }
                    else
                    {
                        include("pages/userAuth/form_auth.php"); 
                    }
                }
            ?>
            <div class="catalog-menu">
                <?php include("pages/content/menu.php")?>
            </div>
            
        </div>
        <div id="content">
           <?php include("pages/content/content.php")?>
        </div>
    </div>
    <div id="footer">
        <div class="head-footer">
            <div class="item-1">
                <h3><a href="#">Салоны</a></h3>
                <ul>
                    <li><a href="#"><b>Центральный район</b></a></li>
                    <li><a href="#">ул. Мира 54-89</a></li>
                    <li><a href="#">Ул. Ленина 55-78</a></li>
                    <li><a href="#">Ул. Победы 35-88</a></li>
                </ul>
                <ul>
                    <li><a href="#"><b>Автозаводской район</b></a></li>
                    <li><a href="#">Южное шоссе 58-99</a></li>
                    <li><a href="#">ул. Фрунзе 90-79</a></li>
                    <li><a href="#">ул. Спортивная 99-10</a></li>
                </ul>
                <ul>
                    <li><a href="#"><b>Комсомольский район</b></a></li>
                    <li><a href="#">ул. Чайкиной 89-12</a></li>
                    <li><a href="#">ул. Мурысева 90-15</a></li>
                </ul>
                <ul>
                    <li><a href="#"><b>Шлюзовой</b></a></li>
                    <li><a href="#">ул. Макарова 3-8</a></li>
                    <li><a href="#">ул. Никонова 54-89</a></li>
                </ul>

            </div>
            <div class="item-2">
                <h3><a href="#">О компании</a></h3>
                <ul>
                    <li><a href="#">Подробно о работе сайта</a></li>
                    <li><a href="#">Работа и вакансии</a></li>
                </ul>
            </div>
            <div class="item-3">
                <h3><a href="#">Оставить отзыв</a></h3>
            </div>
        </div>
        <div class="copyright">
            © "Парикмахерская "Самая-Самая". г.Тольятти
        </div>
    </div>
</div>
</body>
</html>