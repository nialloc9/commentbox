<?php


    if(isset($_POST['task']) && $_POST['task'] =='comment_insert'){

        $userId = $_POST['userId'];
        $comment =  str_replace("\n", "<br>", $_POST['comment']);
        $std = new stdClass();
        $std->user = null;
        $std->comment = null;
        $std->error = false;


        require_once '../sql/models/comments.php';

        if(class_exists('Comments') && class_exists('Subscribers')){
            $userInfo = Subscribers::getSubscriber( $userId );

            if($userInfo == null){
                //Cause some problems
                $std->error = true;
            }

            $commentInfo = Comments::insert($comment, $userId);
            if($commentInfo ==null){
                //Cause some problems
                $std->error = true;
            }


            $std->user = $userInfo;
            $std->comment = $commentInfo;



        }
        echo json_encode( $std );
    }else{

    }
?>