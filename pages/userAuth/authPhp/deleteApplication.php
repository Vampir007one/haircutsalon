<?php
    include($_SERVER["DOCUMENT_ROOT"] . "/pages/connect.php");

    if($_POST['Applicationdata'] != '')
    {
        $delete = $db->query("DELETE FROM `application` WHERE `id` = '$_POST[Applicationdata]'");
        if($delete)
        {
            $deleteApplication = [
                'check' => 'Заявка удалёна',
            ];
        }
        else
        {
            $deleteApplication = [
                'check' => 'Заявка не удалёна',
            ];
        }
    }
    else
    {
        $deleteApplication = [
            'check' => 'Что-то пошло не так',
        ]; 
    }

    echo json_encode($deleteApplication);
?>