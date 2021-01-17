<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/pages/connect.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="urf-8">
<meta name="robots" content="index, follow">
<meta name="Description" content="Официальный сайт сети парикмахерских Самая-Самая">
<meta name="Keywords" content="Парикмахерская Самая-Самая">
<meta name="Author" lang="ru" content="Парикмахерская Самая-Самая">
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<title>Парикмахерская Самая-Самая.</title>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div class="logo">
            <img src="/img/logo.png" alt="Парикмахерская Самая-Самая">
        </div>
        <nav class="nav-menu">
            <ul>
                <li class="active"><a href="#">Главная</a></li>
                <li><a href="#">Салоны</a></li>
                <li><a href="#">Цены</a></li>
                <li><a href="#">Достижения</a>
                    <ul>
                        <li><a href="#">Достижения предприятия</a></li>
                        <li><a href="#">Достижения мастеров</a></li>
                    </ul>
                </li>
                <li><a href="#">Мастера</a></li>
                <li><a href="#">Услуги</a></li>
                <li><a href="#">Статьи</a></li>
                <li><a href="#">О компании</a>
                    <ul>
                        <li><a href="#">Подробно о работе сайта</a></li>
                        <li><a href="#">Работа и вакансии</a></li>
                    </ul>
                </li>
                <li class="recall"><a href="#">Оставить отзыв</a>
                    <ul>
                        <li><img src="/img/otziv_big.jpg"><a href="#"><img src="img/otziv_link.png"></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <div id="aside">
            <div class="message">НАЙДИ СВОЕГО <span>МАСТЕРА</span></div>

<div id="formRegLog">
    <h3>Регистрация</h3>
    <form action="" method="POST" id="regForm">
        <div class="inputblock">
            <label for="login">Логин</label>
            <input type="text" name="login" id="login" placeholder="Введите логин">
        </div>
        <div class="inputblock">
            <label for="fio">Имя</label>
            <input type="text" name="fio" id="fio" placeholder="Введите своё имя">
        </div>
        <div class="inputblock">
            <label for="mobile">Номер телефона</label>
            <input type="phone" name="mobile" id="mobile" placeholder="Введите номер телефона">
        </div>
        <div class="inputblock">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Введите пароль">
        </div>
        <div class="inputblock">
            <input type="submit" value="Зарегистрироваться" id="regBtn">
        </div>
        <div class="answerForm" id="answerForm"></div>
    </form>
</div>
<script src="/pages/userAuth/ajaxJS/reg_ajax.js"></script>
            <div class="catalog-menu">
                <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/menu.php")?>
            </div>
            
        </div>
        <div id="content">
           <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/content.php")?>
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