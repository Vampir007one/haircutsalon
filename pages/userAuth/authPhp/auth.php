<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . '/pages/connect.php');
    if ($_POST['login'] != '' && $_POST['password'] != '' ) 
    {
      $getAllUserData = $db->query("SELECT * FROM `users` WHERE `login` = '$_POST[login]' ");
      $allUserdata = mysqli_fetch_array($getAllUserData);
      $password = md5($_POST['password']);
      if ($allUserdata['login'] == $_POST['login']) 
      {
        if($allUserdata['password'] == $password)
        {
          $_SESSION['id'] = $allUserdata['id'];
          $_SESSION['login'] = $allUserdata['login'];
          $_SESSION['username'] = $allUserdata['name'];
          $_SESSION['role'] = $allUserdata['role'];
          $result = [
            'check' => 'Добро пожаловать!',
          ];
        }
        else
        {
          $result = [
            'check' => 'Логин или пароль введены неверно',
          ];
        }
      }
      else
      {
        $result = [
          'check' => 'Логин или пароль введены неверно',
        ];
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