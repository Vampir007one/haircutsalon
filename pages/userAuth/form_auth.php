<!-- FILE AUTH USER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<div id="formRegLog">
    <h3>Авторизация</h3>
    <form action="" method="POST" id="authForm">
        <div class="inputblock">
            <label for="login">Логин</label>
            <input type="text" name="login" id="login" placeholder="Введите логин">
        </div>
        <div class="inputblock">
            <label for="password">Пароль</label>
            <input type="text" name="password" id="password" placeholder="Введите пароль">
        </div>
        <div class="inputblock">
            <input type="submit" value="Войти" id="authBtn">
        </div>
        <a href="/pages/registration.php">Регистрация</a>
        <a href="">Восстановить пароль</a>
    </form>
    <div class="answerForm" id="answerForm"></div>

</div>
<script src="/pages/userAuth/ajaxJS/auth_ajax.js"></script>