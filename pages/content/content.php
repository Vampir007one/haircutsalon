<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<div id="search">
                <form action="#" method="post" name="searchForm">
                    <input type="search" name="search" id="search-field" placeholder="Печатайте название услуги">
                </form>
                
                <div class="metro">
                    <a href="#">Уточните адрес</a>
                </div>
                
                <div class="selectPhoto">
                    <input type="checkbox" name="photoSelect"> Фото Взрослые<br />
                    <input type="checkbox" name="photoSelect"> Фото Молодежные<br />
                    <input type="checkbox" name="photoSelect"> Фото Детские
                </div>
            </div>    
        
            <div class="item-info">
                <h4>В системе представлено:</h4>
                более 300 мастеров по всему Тольятти,<br />
                более 30 000 фотографий работ,<br />
                прайс-лист от 140 руб. <br />
                чтобы Вы нашли своего мастера!
            </div>
            <div class="item-info">
                <h4>Все мастера сети</h4>          
                регулярно повышают квалификацию,<br />
                участвуют в конурсах парикмахеров,<br />
                проходят обязательную аттестацию<br />
                по качеству оказываемых услуг.
            </div>
            <?php

    if($_SESSION['role'] == '1') 
    {
        // Получаем инфо только по пользователям
        $getOnlyUser = $db->query("SELECT `id`, `name` FROM `users` WHERE `role` = '0'");
        $onlyUser = mysqli_fetch_array($getOnlyUser);

        // Получаем инфо по мастерам
        $getApplication = $db->query("SELECT * FROM `application` WHERE `master_id` = '$_SESSION[id]'");
        $application = mysqli_fetch_array($getApplication);

print <<<HERE
            <div class="masterFunction">
            <h2>Функции мастера:</h2>
            <table align="center" width="100%">
                <tr>
                    <th>Удаление пользователей:</th>
                    <th>Удаление заявок:</th>
                </tr>
                <tr>
                    <!--Удаление пользователей--!>
                    <td>
                        <form action="" method="post" id="deleteUsersForm">
                            <p>Выберите пользователя, которого хотите удалить и нажмите удалить</p>
                            <select name="OnlyUserDelete" id="">
                                <option value="0">Не выбрано</option>
HERE;
do 
{
print <<<HERE
                                <option value="$onlyUser[id]">$onlyUser[name]</option>
HERE;
} while ($onlyUser = mysqli_fetch_array($getOnlyUser) );
print <<<HERE
                            </select>
                                    <input type="submit" value="Удалить пользователя" id="DeleteUserBtn">
                                    <div id="getInfoSuccess"></div>
                                </form>
                    </td>   
                            <!-- Удаление пользователей -->
HERE;
print <<<HERE
                            
                            <td>
                                <form action="" method="post" id="deleteApplicationForm">
                                    <p>Выберите заявку, которую хотите удалить и нажмите удалить</p>
                                    <select name="Applicationdata" id="">
                                        <option value="0">Не выбрано</option>
HERE;
                    do 
                    {
print <<<HERE
                                        <option value="$application[id]">
                                            <p>Дата: $application[date]</p>
                                            <p>Время: $application[time]</p>
                                        </option>
HERE;
                    } while ($application = mysqli_fetch_array($getApplication) );
print <<<HERE
                                    </select>
                                    <input type="submit" value="Удалить заявку" id="DeleteApplicationBtn">
                                    <div id="getInfoSuccessApp"></div>
                                </form>
                            </td>
                            </tr>
                        </table>
                    </div>
HERE;
                                    
    }
                
            ?>
            <?php
                include($_SERVER['DOCUMENT_ROOT'] . "/pages/connect.php");
                // getMasterData
                $getMasterData = $db->query("SELECT * FROM `users`, `masters` WHERE `users`.`id` = `masters`.`master_id`");
                $masterData = mysqli_fetch_array($getMasterData);
                // count Masters id
                $countMastersId = $db->query("SELECT COUNT(`master_id`) FROM `masters`");
                $countMasters = mysqli_fetch_array($countMastersId);
                $count = 0;
                


            ?>

            <!-- Мастера -->
            <?php 
                do 
                {
                    if($masterData['skill'] == 'стилист')
                    {
                        $span = '';
                    }
                    if($masterData['skill'] == 'универсал')
                    {
                        $span = 'universal';
                    }
                    if($masterData['skill'] == 'модельер')
                    {
                        $span = 'model';
                    }
                    
print <<<HERE
                    <div class="master">
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
                } while ($masterData = mysqli_fetch_array($getMasterData) );
            ?>

            <div class="clear"></div>            
            
            <?php
                if ($_SESSION['id']) 
                {
                    printf('
                    <a href="/pages/application.php"><div class="more_content">ЗАЯВКА НА СТРИЖКУ</div></a>
                    ');
                }
            ?>
            
            <!-- КОнец мастеров -->

<script src="/pages/userAuth/ajaxJS/deleteUserMod.js"></script>