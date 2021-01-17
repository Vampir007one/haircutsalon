$(document).ready(function(){
    $("#regBtn").click(
        function(){
            sendAjaxForm('answerForm', 'regForm', '/pages/userAuth/authPhp/reg.php');
            return false;
        }
    );
});

function sendAjaxForm(answerForm, regForm, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+regForm).serialize(),
        success: function(response){
            result = jQuery.parseJSON(response);
            document.getElementById(answerForm).innerHTML = result.check;
        },
        error: function(response){
            document.getElementById(answerForm).innerHTML = "Ошибка данные не отправлены";
        }
    });
}