$(document).ready(function(){

    //This will fire once the page has been fully loaded.

    $('#comment-post-btn').click(function(){
        comment_post_btn_click();
    });
});

function comment_post_btn_click(){
    //Text within the textarea which the user has entered.
    var _comment = $('#comment-post-text').val(); //Text that the user enters.
    var _userId = $('#userId').val();
    var _username = $('#username').val();

    if(_comment.length >0 && _userId != null ){
        $('.comment-insert-container').css('border', '1px solid #e1e1e1');

        $.post('ajax/comment_insert.php',
            {
                task: 'comment_insert',
                userId: _userId,
                comment: _comment
            }
        ).error(
            function() {
                console.log('Error');
            })
            .success(
            function(data) {
                //Success
                //Task: Insert html into teh ul/li
                comment_insert(jQuery.parseJSON(data));}
        );

        console.log('  Comment  ' + _comment + '  Username:  ' + _username + '  User Id:  ' + _userId);
        //Proceed
    }else{
        //Text are was empty let's put a a border of red on it.
        $('.comment-insert-container').css('border', '1px solid #ff0000');
    }
    //Remove the text from the textarea, ready for another comment
    $('#comment-post-text').val('');
}

function comment_insert(data){
    var t = '';
    t+='<li class="comment-holder" id="_'+data.comment.comment_id+'">';
    t+="<div class='user-img'>";
    t+='<img src="'+data.user.profile_img+'" class="user-img-pic"/>';
    t+='</div>';
    t+='<div class="comment-body">';
    t+='<h3 class="username-field">'+data.user.userName+'</h3>';
    t+='<div class="comment-text">'+data.comment.comment+'</div>';
    t+='</div>';
    t+='<div class="comment-buttons-holder">';
    t+='<ul>';
    t+='<li id= "'+data.comment.comment_id+'" class="delete-btn">X</li>';
    t+='</ul>';
    t+='</div>';
    t+='</li>';

    $('.comments-holder-ul').prepend(t);
    add_delete_handlers();
}

