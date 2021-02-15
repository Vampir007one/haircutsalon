//для добавления комментария в базу
$(document).ready(function(){
    $("#sendReview").click(
        function(){
            sendAjaxFormSendReview('getAnswer', 'reviewForm', '/pages/userAuth/authPhp/sendReview.php');
            return false;
        }
    );
});
//для добавления удаления комментария из базы
$(document).ready(function(){
    $("#deleteBtn").click(
        function(){
            sendAjaxFormDeleteComment('answerDiv', 'commentForm', '/pages/userAuth/authPhp/DeleteComment.php');
            return false;
        }
    );
});
// для добавления ответа на комментарий в базу
$(document).ready(function(){
    $("#replyCommentBtn").click(
        function(){
            sendAjaxFormReplyComment('getInfoComment', 'replyForm', '/pages/userAuth/authPhp/replyComment.php');
            return false;
        }
    );
});

// Функция для отправки ответа 
function sendAjaxFormReplyComment(getInfoComment, replyForm, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+ replyForm).serialize(),
        success: function(response){
            getReply = jQuery.parseJSON(response);
            document.getElementById(getInfoComment).innerHTML = getReply.check;
            if (getReply.check == 'Ответ отправлен') 
            {
                location.reload();    
            }
        },
        error: function(response){
            document.getElementById(getInfoComment).innerHTML = "Ошибка данные не отправлены";
        }
    });
}
    // Функция для отправки комментария
function sendAjaxFormSendReview(getAnswer, reviewForm, url){
    jQuery.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: jQuery("#"+ reviewForm).serialize(),
        success: function(response){
            sendComment = jQuery.parseJSON(response);
            document.getElementById(getAnswer).innerHTML = sendComment.check;
            if (sendComment.check == 'Комментарий отправлен') 
            {
                location.reload();    
            }
        },
        error: function(response){
            document.getElementById(getAnswer).innerHTML = "Ошибка данные не отправлены";
        }
    });
}
    // Функция для удаления комментария
function sendAjaxFormDeleteComment(answerDiv, commentForm, url){
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