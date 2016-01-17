<?php
    if(isset($GLOBALS['comments']) && is_array($comments)): ///This just checks to see if the global variable comments is available. If it is then it will do the code below. If there is a problem an error message wont appear but either will teh comments.
?>

<?php
    foreach ($comments as $key => $comment):
        foreach ($comment as $key2 => $comment2):
            $user = Subscribers::getSubscriber($comment2->userId);



    ?>

    <li class="comment-holder" id="_<?php echo $comment2->comment_id; ?>">

        <div class="user-img">
            <img src='<?php echo $user[2]; ?>' class="user-img-pic"/>
        </div>

        <div class="comment-body">
            <h3 class="username-field">
                <?php echo $user[1]; ?>
            </h3>

            <div class="comment-text">
                <?php
                echo $comment2->comment;

                ?>
            </div>
        </div>

        <?php
            if($user_id == $comment2->userId): //This checks to see if the user who is logged in is the same as the user that made this comment. If it is then the delete button will appear.
        ?>

        <div class="comment-buttons-holder">
            <ul>
                <li id="<?php echo $comment2->comment_id; ?>" class="delete-btn">X</li>
            </ul>
        </div>

        <?php endif; ?>
    </li>

<?php endforeach; endforeach;?>
<?php endif; ?>
