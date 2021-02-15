$(document).ready(function(){
    $("#DeleteUserBtn").click(
        function(){
            sendAjaxForm('getInfoSuccess', 'deleteUsersForm', '/pages/userAuth/authPhp/deleteUsersMod.php');
            return false;
        }
    );
});

function sendAjaxForm(getInfoSuccess, deleteUsersForm, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+ deleteUsersForm).serialize(),
        success: function(response){
            deleteUser = jQuery.parseJSON(response);
            document.getElementById(getInfoSuccess).innerHTML = deleteUser.check;
            if (deleteUser.check == 'Пользователь удалён') 
            {
                location.reload();    
            }
        },
        error: function(response){
            document.getElementById(getInfoSuccess).innerHTML = "Ошибка данные не отправлены";
        }
    });
}

$(document).ready(function(){
    $("#DeleteApplicationBtn").click(
        function(){
            sendAjaxForm('getInfoSuccessApp', 'deleteApplicationForm', '/pages/userAuth/authPhp/deleteApplication.php');
            return false;
        }
    );
});

function sendAjaxForm(getInfoSuccessApp, deleteApplicationForm, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+ deleteApplicationForm).serialize(),
        success: function(response){
            deleteApplication = jQuery.parseJSON(response);
            document.getElementById(getInfoSuccessApp).innerHTML = deleteApplication.check;
            if (deleteApplication.check == 'Заявка удалёна') 
            {
                location.reload();    
            }
        },
        error: function(response){
            document.getElementById(getInfoSuccessApp).innerHTML = "Ошибка данные не отправлены";
        }
    });
}