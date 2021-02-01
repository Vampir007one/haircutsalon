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
                    include($_SERVER["DOCUMENT_ROOT"] . "/pages/userAuth/form_auth.php"); 
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
                        include($_SERVER["DOCUMENT_ROOT"] . "/pages/userAuth/form_auth.php"); 
                    }
                }
            ?>
            <div class="catalog-menu">
                <?php include($_SERVER["DOCUMENT_ROOT"] . "/pages/content/menu.php")?>
            </div>
            
        </div>
        <div id="content">

            <div class="applicationTitles">
                <h3>Вы можете записаться на стрижку к любому мастеру</h3>
                <h4>Мы работаем с 9:00 до 16:00 пн-вс</h4>
            </div>            
            <div class="application">
            <?php
                // getMastersData
                $getMastersData = $db->query("SELECT * FROM `users`, `masters` WHERE `users`.`id` = `masters`.`master_id`");
                $MastersData = mysqli_fetch_array($getMastersData);
            ?>
                <form action="" method="post" class="applicationForm">
                    <label for="select">Выберите мастера</label>
                    <select name="master" id="select" >
                        <?php
                            do 
                            {
print <<<HERE
                                <option value="$MastersData[id]">$MastersData[name]</option>
HERE;
                            } while ($MastersData = mysqli_fetch_array($getMastersData));
                        ?>
                    </select>
                    <label for="district">Выберите район</label>
                    <select name="district" id="district">
                        <option value="Центральный район">Центральный район</option> 
                        <option value="Автозаводской район">Автозаводской район</option>
                        <option value="Комсомольский район">Комсомольский район</option>
                    </select>
                    <label for="date">Выберите дату</label>
                    <input type="date" name="date" id="date">
                    <label for="time">Выберите время</label>
                    <input type="time" name="time" id="time">
                    <label for="hair">Напишите предпочитаемую причёску</label>
                    <input type="text" name="hair" id="hair">
                    <input type="submit" value="Отправить">
                    <?php
                     
                    if ( isset($_POST['master']) && isset($_POST['district']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['hair']) ) 
                    {
                        if ($_POST['master'] != '' && $_POST['district'] != '' && $_POST['date'] != '' && $_POST['time'] != '') 
                        {
                            $getMasterDistrict = $db->query(" SELECT * FROM `users`, `masters` WHERE `users`.`id` = `masters`.`master_id` AND `users`.`id` = '$_POST[master]' ");
                            $masterDistrict = mysqli_fetch_array($getMasterDistrict);
                            if ($masterDistrict['district'] == $_POST['district']) 
                            {
                                $sendUser = $db->query("
                                INSERT INTO `application`(
                                    `client_id`,
                                    `master_id`,
                                    `district`,
                                    `date`,
                                    `time`,
                                    `hair`
                                )
                                VALUES('$_SESSION[id]' ,'$_POST[master]', '$_POST[district]', '$_POST[date]', '$_POST[time]', '$_POST[hair]');
                                ");

                                if ($sendUser) 
                                {
                                    echo "Ваша заявка отправлена";
                                }

                            }
                            else
                            {
                                echo "Мастер не работает в этом районе";
                            }
                        }
                        else
                        {
                            echo "При заполнение полей была допущена ошибка";
                        }
                    }
                ?>
                </form>
            </div>

            <table>
                <tr>
                    <th>ФИО клиента</th>
                    <th>Район</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Предпочтение в причёске</th>
                </tr>
                <tr>
                    <td>Иванов Иван Иванович</td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <?php 
                // if($_SESSION['role'] == '1')
                // {
                //     if($_SESSION['id'] == $MastersData['id'])
                //     {
                //         echo 'ok';
                //     }
                //     $getMastersData = $db->query("SELECT * FROM `users`, `masters` WHERE `users`.`id` = `masters`.`master_id` AND `id` = '$_SESSION[id]'");
                //     $MastersData = mysqli_fetch_array($getMastersData);
                //     if($MastersData['id'] == $_SESSION['id'])
                //     {
                //         echo $MastersData['name'];
                //     }
                // }
            ?>
            
        </div>
    </div>
    <div id="footer">
        <?php include($_SERVER['DOCUMENT_ROOT'] . "/pages/content/footer.php");?>
    </div>
</div>
</body>
</html>