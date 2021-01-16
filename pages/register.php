<?php
    include("connect.php");
?>
<div id="formRegLog">
    <h3>Регистрация</h3>
    <form action="" method="post">
        <div class="inputblock">
            <label for="login">Логин</label>
            <input type="text" name="login" id="login" placeholder="Введите логин">
        </div>
        <div class="inputblock">
            <label for="password">Пароль</label>
            <input type="text" name="password" id="password" placeholder="Введите пароль">
        </div>
        <div class="inputblock">
            <input type="submit" value="Войти">
        </div>
    </form>
</div>