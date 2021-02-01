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
                if (!isset($_SESSION['id'])) 
                {
                    include($_SERVER['DOCUMENT_ROOT'] . "/pages/userAuth/form_auth.php"); 
                }
                else
                {
                    if (isset($_SESSION['id'])) 
                    {
print <<<HERE
<div class="hiuser">
    <p>Добро пожаловать</p>
    <h3>$_SESSION[username]</h3>
    <span><a href="/pages/userAuth/logout.php">Выйти</a></span>
</div>
HERE;
                    }
                    else
                    {
                        include("pages/userAuth/form_auth.php"); 
                    }
                }
            ?>
            <div class="catalog-menu">
                <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/menu.php")?>
            </div>
            
        </div>
            <div id="content">
            <?php
                 // getMasterData
                 $getMasterData = $db->query("SELECT * FROM `masters` WHERE `id` = '$_GET[id]'");
                 $masterData = mysqli_fetch_array($getMasterData);
print <<<HERE
                <div class="master edit">
                <div class="name">
                    <a href="/pages/master/master.php?id=$masterData[id]" class="name-master">$masterData[name]</a><span class = "$span" >$masterData[skill]</span>                    
                    <div class="service">Средняя запись<span>$masterData[avgRecord] чел./день</span></div>
                    <div class="stars"><img src="/img/stars.png" alt="Оценка"> $masterData[rating] <a href="#">95 отзывов</a></div>
                </div>
                <div class="info">
                    <div class="number">$masterData[mobilephone]</div>
                    <a href="#">$masterData[district]</a>
                </div>
                <div class="all-img">
                    <div class="left-info">
                        <a href="#"><img src="/img/parix/$masterData[photo]" alt="$masterData[name]"></a>
                        <a href="#">Информация</a>
                        <a href="#">Все работы</a>
                        <a href="#">Оставить отзыв</a>
                    </div>
                    <div class="album-list">
                        <ul>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            <li><a href="#"><img src="/img/small/$masterData[portfolio]" alt=""></a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="price-list">
                    <a href="#">Полный прайс-лист мастера</a>
                </div>
                </div>
HERE;



                // getMessage
                $getMessage = $db->query("SELECT * FROM `comments` WHERE `master_id` = '$_GET[id]' ");
                $message = mysqli_fetch_array($getMessage);
                // getSender
                $getSender = $db->query("SELECT * FROM `users` WHERE `id` = '$message[user_id]'");
                $senderdata = mysqli_fetch_array($getSender);
                // getUserdata
                $getUser = $db->query("SELECT * FROM `users` ");
                $userdata = mysqli_fetch_array($getUser);
print <<<HERE
                <div class="comments">
                <h2 class="commentsto">Комментарии к мастеру: </h2>

HERE;

                    do 
                    {
print <<<HERE
                    <div class="Comment">
                        <h3 class="username">$senderdata[name]</h3>
                        <p class="textcomments">$message[message]</p>
HERE;
                        if($_SESSION['id'] && $message['message'])
                        {
                            printf('
                                <form action="" method="post">
                                        <input type="submit" value="Ответить">
                                    </form>
                                </div>    
                            ');
                        }
                        else
                        {
                            printf('
                                </div>   
                            ');
                        }          

                    } while ($message = mysqli_fetch_array($getMessage));
                    
                    if($_SESSION['id'])
                    {
print <<<HERE
<div class="Comment">
    <h3 class="username">$userdata[name]</h3>
    <form action="" method="POST" id="Review">
        <textarea name="review" id="" cols="60" rows="5" placeholder="Отзыв писать сюда" ></textarea>
        <input type="submit" value="Отправить" id="sendReview">
        <input type="text" name="masterId" id="" value="$masterData[id]" hidden>
        <div id="getAnswer"></div>
    </form>
</div>
HERE;
                    }
                    else
                    {
                        echo "<span style ='color: #555; font-size: 10px; margin: 10px 0px'>Только зарегистрированные пользователи могут оставлять комментарии</span>";
                    }


print <<<HERE
                    </div>
HERE;
?>
                </div>
            </div>
        
           
        
    <div id="footer">
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/footer.php");?>
    </div>
</div>
<script src="/pages/userAuth/ajaxJS/reviewSend_ajax.js"></script>
</body>
</html>