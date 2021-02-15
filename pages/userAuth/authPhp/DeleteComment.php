<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/pages/connect.php");
        if(isset($_POST['comment_id']) )
        {
            if($_POST['comment_id'] != '')
            {
                $deleteComment = $db->query("DELETE FROM `comments` WHERE `id` = '$_POST[comment_id]'");
                if ($deleteComment) 
                {
                    $result=[
                        'check' => 'Комментарий удалён',
                    ];
                }
            }
            else
            {
                $result=[
                    'check' => 'Что-то пошло не так',
                ];
            }
        }
    echo json_encode($result);
?>