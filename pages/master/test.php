<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>TestsFile</title>
</head>
<body>
    <!-- Если нет отзыва -->
    <div class="Comment">
        <h3 class="username">Иванов Иван</h3>
        <p class="textcomments">Привет!</p>
        <form action="" method="POST" id="replyForm">
            <h3 class="username">Иванов Иван</h3>
            <textarea name="review" id="" cols="60" rows="5" placeholder="Написать ответ" ></textarea>
            <input type="submit" value="Отправить" id="sendReview">
            <input type="text" name="masterId" id="" value="$_GET[id]" hidden>
            <div id="getAnswer"></div>
        </form>
    </div>
    <!-- Если отзыв есть -->
    <div class="Comment">
        <h3 class="username">Иванов Иван</h3>
        <p class="textcomments">Привет!</p>
        <div id="replyForm">
            <h3 class="username">Иванов Иван</h3>
            <p class="textcomments">Привет!</p>
        </div>
    </div>
</body>
</html>