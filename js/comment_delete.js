$(document).ready(function(){
    add_delete_handlers();
});

function add_delete_handlers(){
    $('.delete-btn').each(function(){
        var btn = this;
        $(btn).click(function(){

            comment_delete(btn.id);

        });
    });
}

function comment_delete(_comment_id){

    $.post('ajax/comment_delete.php', {
            task: 'comment_delete',
            comment_id: _comment_id
        }
    ).success(function(data){
            $('#_' + _comment_id).detach();
        });

}