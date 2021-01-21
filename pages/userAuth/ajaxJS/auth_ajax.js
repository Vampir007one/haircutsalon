$(document).ready(function(){
    $("#authBtn").click(
        function(){
            sendAjaxForm('answerForm', 'authForm', '/pages/userAuth/authPhp/auth.php');
            return false;
        }
    );
});

function sendAjaxForm(answerForm, authForm, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+authForm).serialize(),
        success: function(response){
            result = jQuery.parseJSON(response);
            document.getElementById(answerForm).innerHTML = result.check;
            if(result.check == "Добро пожаловать!")
            {
                location.reload();
            }
        },
        error: function(response){
            document.getElementById(answerForm).innerHTML = "Ошибка данные не отправлены";
        }
    });
}