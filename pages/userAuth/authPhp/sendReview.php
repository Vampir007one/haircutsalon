<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/pages/connect.php");
    session_start();
    if($_POST['review'] != '')
    {
        $sendReview = $db->query("
            INSERT INTO `comments`(
                `id`,
                `user_id`,
                `master_id`,
                `message`
            )
            VALUES(
                NULL,
                '$_SESSION[id]',
                '$_POST[masterId]',
                '$_POST[review]'
            );
        ");
            if ($sendReview) 
            {
                $sendComment = [
                    'check' => 'Комментарий отправлен',
                ];
            }
            else
            {
                $sendComment = [
                    'check' => 'Что-то пошло не так',
                ];
            }
    }
    else
    {
        $sendComment = [
            'check' => 'Проблема с базой',
        ];
    }
    echo json_encode($sendComment);
?>