<?php
    require_once  'sql/models/comments.php';

    $user_id = 2;

?>

<!DOCTYPE html>
<header>
    <title>Comment Box</title>
    <link href="css/layout.css" rel="stylesheet"/>
    <script type="text/javascript" src="../jquery/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/comment_insert.js?t=<?php echo time(); ?>"></script> <!-- Adding the time is a good tip to make sure we get a new version of the js each time we refresh. This is incase the browser caches the file.-->
    <script type="text/javascript" src="js/comment_delete.js?t=<?php echo time(); ?>"></script>

</header>
<body>

    <div class="wrapper">
        <div class="page-data">
            Page data is in here.
        </div>
        <div class="comment-wrapper">

            <h3 class="comment-title">User feedback....</h3>

            <div class="comment-insert">
                <h3 class="who-says"><span>Says:</span> Niall O' Connor</h3>
                <div class="comment-insert-container">
                    <label for="comment-post-text">
                        <textarea id="comment-post-text" class="comment-insert-text"></textarea>
                    </label>
                </div>

                <div class="comment-post-btn-wrapper" id="comment-post-btn">
                    Post
                </div>
            </div>

            <div class="comments-list">
                <ul class="comments-holder-ul">
                    <?php $comments = Comments::getComments(); ?>
                    <?php require_once 'includes/comment_box.php';
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <input type="hidden" id="userId" name = 'userId' value="<?php echo $user_id; ?>"/>
    <input type="hidden" id="username" value="Niall"/>
</body>

</html>
