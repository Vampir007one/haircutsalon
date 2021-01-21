<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/pages/connect.php');
    if ($_POST['login'] != '' && $_POST['fio'] != '' && $_POST['mobile'] != '' && $_POST['password'] != '' ) 
    {
      $getuserdata = $db ->query("SELECT `login` FROM `users` WHERE `login` = '$_POST[login]'");
      $userdata = mysqli_fetch_array($getuserdata);
      if ($userdata['login'] == $_POST['login']) 
      {
        $result = [
            'check' => 'Пользователь с таким логином уже есть в системе',
        ];
      }
      else
      {
          $password = md5($_POST['password']);
          $insertUserDataDB = $db->query("
            INSERT INTO `users`(
                `id`,
                `login`,
                `name`,
                `mobile`,
                `password`,
                `role`
            )
            VALUES(NULL, '$_POST[login]', '$_POST[fio]', '$_POST[mobile]', '$password', '0')");
          if ($insertUserDataDB) 
          {
            $getAllUserData = $db->query("SELECT * FROM `users` WHERE `login` = '$_POST[login]' ");
            $allUserdata = mysqli_fetch_array($getAllUserData);
            $_SESSION['id'] = $allUserdata['id'];
            $_SESSION['login'] = $allUserdata['login'];
            $_SESSION['username'] = $allUserdata['name'];
            $result = [
                'check' => 'Регистрация прошла успешно <br> <a href="/">Войти в аккаунт</a>',
            ];
          }
      }
    }
    else
    {
        $result = [
            'check' => 'Что-то пошло не так',
        ];
    }
    
    echo json_encode($result);
?>