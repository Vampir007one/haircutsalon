<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/pages/connect.php");

    if($_POST['OnlyUserDelete'] != '')
    {
        $delete = $db->query("DELETE FROM `users` WHERE `id` = '$_POST[OnlyUserDelete]'");
        if($delete)
        {
            $deleteUser = [
                'check' => 'Пользователь удалён',
            ];
        }
        else
        {
            $deleteUser = [
                'check' => 'Пользователь не удалён',
            ];
        }
    }
    else
    {
        $deleteUser = [
            'check' => 'Что-то пошло не так',
        ]; 
    }

    echo json_encode($deleteUser);
?>