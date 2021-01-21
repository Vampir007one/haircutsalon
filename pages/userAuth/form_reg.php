<?php
    // session_start();
    // include($_SERVER['DOCUMENT_ROOT'] . "/pages/connect.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
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