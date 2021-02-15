<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/pages/connect.php");

        if($_POST['review'] != '')
        {
            $reply = $db->query("
                INSERT INTO `replies`(
                    `id`,
                    `from_id`,
                    `to_id`,
                    `replyComment`,
                    `message_id`
                )
                VALUES(NULL, '$_POST[fromId]', '$_POST[toId]', '$_POST[review]', '$_POST[messageId]')
                ");

                
            if($reply)
            {
                $getReply =[
                    'check' => 'Ответ отправлен',
                ];
            }
           
        }
    
    echo json_encode($getReply);
?>