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
                 $getMasterData = $db->query(" SELECT * FROM `users`, `masters` WHERE `users`.`id` = `masters`.`master_id` AND `users`.`id` = '$_GET[id]' ");
                 $masterData = mysqli_fetch_array($getMasterData);
                 echo "ID Сессии: {$_SESSION['id']}";
print <<<HERE
                <div class="master edit">
                <div class="name">
                    <a href="/pages/master/master.php?id=$masterData[id]" class="name-master">$masterData[name]</a><span class = "$span" >$masterData[skill]</span>                    
                    <div class="service">Средняя запись<span>$masterData[avgRecord] чел./день</span></div>
                    <div class="stars"><img src="/img/stars.png" alt="Оценка"> $masterData[rating] <a href="#">95 отзывов</a></div>
                </div>
                <div class="info">
                    <div class="number">$masterData[mobile]</div>
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
                $getData = $db->query("
                SELECT
                `users`.`name`,
                `users`.`id`,
                `comments`.`message`,
                `comments`.`master_id`,
                `comments`.`id`
            FROM
                `users`,
                `comments`
            WHERE
                `comments`.`user_id` = `users`.`id` AND `comments`.`master_id` = '$_GET[id]'
                ");

                $data = mysqli_fetch_array($getData);
                echo "Мастер ID: {$_GET[id]}";

// Возможность мастеру блокировать комментированние
if($_SESSION['id'] == $_GET['id'])
{
                    // Получаем всех пользователей
                    $getUserInfo = $db->query("SELECT * FROM `users`");
                    $userInfo = mysqli_fetch_array($getUserInfo);

                     // Форма
print <<<HERE
                    <form action="" method="post" id="accessUserForm" class="accessCommentsForm">
                        <h2>Ограничение для комментирования:</h2>
                        <p>Вы можете ограничить комменитрование, как для пользователя, так и для всех пользователей</p>
                        <select name="SelectionUsers" id="">
                            <option value="">Не выбрано</option>
                            <option value="0">Все пользователи</option>
HERE;
    do 
    {
print <<<HERE
                            <option value="$userInfo[id]">$userInfo[name]</option>
HERE;
        
    } while ( $userInfo = mysqli_fetch_array($getUserInfo) );
        
printf('
                            </select>
                                <input type="submit" value="Ограничить доступ" id="accessUserBtn">
                        </form>
');

                        if(isset($_POST['SelectionUsers']) )
                        {
                            if($_POST['SelectionUsers'] != '')
                            {
                                if($_POST['SelectionUsers'] == '0')
                                {
                                    $denyAccess = $db->query("
                                    INSERT INTO `access`(
                                        `id`,
                                        `master_id`,
                                        `denyUser_id`,
                                        `denyAll`
                                    )
                                    VALUES(NULL, '$_GET[id]', NULL, '1');
                                    ");

                                    if($denyAccess){echo "Комментирование заблокировано, для всех пользователей";}
                                }
                                else
                                {
                                    $denyAccess1 = $db->query("
                                    INSERT INTO `access`(
                                        `id`,
                                        `master_id`,
                                        `denyUser_id`,
                                        `denyAll`
                                    )
                                    VALUES(NULL, '$_GET[id]', '$_POST[SelectionUsers]', '0');
                                    ");
                                    if($denyAccess1){echo "Коментирование заблокировано для пользователя: <b>$_POST[SelectionUsers]</b>";}
                                }
                            }
                        }
}               

                         // Получаем данные об ответах на комментарии
                         $getReply = $db->query("
                         SELECT
                         `users`.`id`,
                         `users`.`name`,
                         `comments`.`message`,
                         `replies`.`from_id`,
                         `replies`.`to_id`,
                         `replies`.`replyComment`,
                         `replies`.`message_id`
                     FROM
                         `replies`,
                         `comments`,
                         `users`
                     WHERE
                         `message_id` = '$data[id]' AND `replies`.`from_id` = `users`.`id` AND `replies`.`message_id` = `comments`.`id`
                         ");
                         $reply = mysqli_fetch_array($getReply);
print <<<HERE
                <div class="comments">
                    <h2 class="commentsto">Комментарии к мастеру: </h2>

HERE;
                    do 
                    {
print <<<HERE
                        <div class="Comment">
                            <h3 class="username">$data[name]</h3>
                            <p class="textcomments">$data[message]</p>
HERE;
                            if($_SESSION['id'] && $data['message'])
                            {
                                if($reply['message_id'] == $data['id'])
                                {
print <<<HERE
                                    <div id="replyForm">
                                        <h3 class="username">$reply[name]</h3>
                                        <p class="textcomments">$reply[replyComment]</p>
                                    </div>

HERE;
                                }
                                else
                                {
                                    printf('
                                    <form action="" method="POST" id="replyForm">
                                        <h3 class="username">%s</h3>
                                        <textarea name="review" id="" cols="60" rows="5" placeholder="Написать ответ" ></textarea>
                                        <input type="submit" value="Отправить" id="replyCommentBtn">
                                        <input type="text" name="fromId" id="" value="%s" hidden>
                                        <input type="text" name="toId" id="" value="%s" hidden>
                                        <input type="text" name="messageId" id="" value="%s" hidden>
                                        <div id="getInfoComment"></div>
                                    </form>
                                ', $_SESSION['username'], $_SESSION['id'], $data['1'], $data['id']);
                                }
                                

                                if ($_SESSION['id'] == $data['master_id']) 
                                {
                                    printf('
                                    
                                        <form action="" method="POST" id="commentForm">
                                            <input type="submit" value="Удалить" name="delete" id="deleteBtn">
                                            <input type="text" name="comment_id" value="%s" hidden>
                                            <div id="answerDiv"></div>
                                        </form>
                                        </div>

                                    ', $data['id']);
                                }
                                else
                                {
                                    printf('</div>');
                                }
                            }
                            else
                            {
                                printf('</div>');  
                            }
                    } while ($data = mysqli_fetch_array($getData) );
                    
                    if($_SESSION['id'])
                    {
                        // Запрещаем юзеру комментировать
                            $getBlockedUser = $db->query("
                            SELECT
                            `denyUser_id`
                        FROM
                            `access`,
                            `users`
                        WHERE
                            `master_id` = '$_GET[id]' AND `denyUser_id` = '$_SESSION[id]' AND `master_id` = `users`.`id`
                            ");
                        $blockedUser = mysqli_fetch_array($getBlockedUser);

                        // Получаем данные о блоке для всех пользователей
                        $getAllBlocked = $db->query("
                            SELECT
                            `denyAll`
                        FROM
                            `access`,
                            `users`
                        WHERE
                            `master_id` = '$_GET[id]' AND `denyAll` = '1' AND `master_id` = `users`.`id`
                            ");
                        $allBlocked = mysqli_fetch_array($getAllBlocked);
                        if($allBlocked['denyAll'] == '1')
                        {
                            echo "Мастер заблокировал возможность комментирования!";
                        }
                        else
                        {
                            // Сравниваем инфо по юзеру из базы с Адом сессии, если совпадают, то пользователь не может оставлятькоммент
                            if($blockedUser['denyUser_id'] == $_SESSION['id'])
                            {
                                echo "Вы не можете оставить комментарий";
                            }
                            else
                            {
print <<<HERE
                                <div class="Comment">
                                    <h3 class="username">$_SESSION[username]</h3>
                                    <form action="" method="POST" id="reviewForm">
                                        <textarea name="review" id="" cols="60" rows="5" placeholder="Отзыв писать сюда" ></textarea>
                                        <input type="submit" value="Отправить" id="sendReview">
                                        <input type="text" name="masterId" id="" value="$_GET[id]" hidden>
                                        <div id="getAnswer"></div>
                                    </form>
                                </div>                           
HERE;
                            }
                        }
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

<script src="/pages/userAuth/ajaxJS/deleteAndReview_ajax.js"></script>
<!-- <script src="/pages/userAuth/ajaxJS/reviewSend_ajax.js"></script> -->
</body>
</html>