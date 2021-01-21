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

<script type="text/javascript" async="" src="js/watch.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="js/cusel-min-2.5.js"></script>
<script type="text/javascript" src="js/icheck.min.js"></script>
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
            <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/nav-menu.php")?>
        </nav>
    </div>
    <div class="container">
        <div id="aside">
            <div class="message">НАЙДИ СВОЕГО <span>МАСТЕРА</span></div>
            <?php 
                include($_SERVER['DOCUMENT_ROOT'] . '/pages/userAuth/form_reg.php')
            ?>
            <div class="catalog-menu">
                <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/menu.php")?>
            </div>
            
        </div>
        <div id="content">
           <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/content.php")?>
        </div>
    </div>
    <div id="footer">
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/footer.php");?>
    </div>
</div>
</body>
</html>