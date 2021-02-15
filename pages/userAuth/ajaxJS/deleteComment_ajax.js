$(document).ready(function(){
    $("#deleteBtn").click(
        function(){
            sendAjaxForm('answerDiv', 'commentForm', '/pages/userAuth/authPhp/DeleteComment.php');
            return false;
        }
    );
});

function sendAjaxForm(answerDiv, commentForm, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+ commentForm).serialize(),
        success: function(response){
            result = jQuery.parseJSON(response);
            document.getElementById(answerDiv).innerHTML = result.check;
            if (result.check == 'Комментарий удалён') 
            {
                location.reload();   
            }
        },
        error: function(response){
            document.getElementById(answerDiv).innerHTML = "Ошибка данные не отправлены";
        }
    });
}