<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/pages/connect.php");
    session_start();
    if($_POST['review'] != '')
    {
        $sql = $db->query("
            INSERT INTO `comments`(
                `id`,
                `user_id`,
                `master_id`,
                `reply`,
                `message`
            )
            VALUES(
                NULL,
                '$_SESSION[id]',
                '$_POST[masterId]',
                NULL,
                '$_POST[review]'
            );
        ");
        if ($sql) 
        {
            $result = [
                'check' => 'Комментарий отправлен',
            ];
        }
        else
        {
            $result = [
                'check' => 'Что-то пошло не так',
            ];
        }
    }
    else
    {
        $result = [
            'check' => 'Проблема с базой',
        ];
    }
    echo json_encode($result);
?>