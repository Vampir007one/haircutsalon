$(document).ready(function(){
    $("#sendReview").click(
        function(){
            sendAjaxForm('getAnswer', 'Review', '/pages/userAuth/authPhp/sendReview.php');
            return false;
        }
    );
});

function sendAjaxForm(getAnswer, Review, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+Review).serialize(),
        success: function(response){
            result = jQuery.parseJSON(response);
            document.getElementById(getAnswer).innerHTML = result.check;
            if(result.check == 'Комментарий отправлен')
            {
                location.reload();
            }
        },
        error: function(response){
            document.getElementById(getAnswer).innerHTML = "Ошибка данные не отправлены";
        }
    });
}