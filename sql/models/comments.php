<?php

require_once 'subscribers.php';
class Comments{
    public static function getComments(){
        $db = new PDO('mysql:host=localhost;dbname=commentbox;charset=utf8','root','');

        $output = array();

        $stmt = $db->prepare("SELECT * FROM comments ORDER BY comment_id DESC");

        $query = $stmt->execute();
        if( $query ) {
            $count = $stmt->rowCount();
            if($count>0){
                while($rows = $stmt->fetchAll(PDO::FETCH_OBJ)) {
                    $output[] = $rows;
                }
            }
        }
        return $output;
    }

    //return a stdClass object from the database.
    public static  function insert($comment_txt, $userId){
        //Insert data into the database
        $db = new PDO('mysql:host=localhost;dbname=commentbox;charset=utf8','root','');
        $stmt = $db->prepare("INSERT INTO comments VALUES('', '$comment_txt', '$userId')");

        if($query = $stmt->execute()){
            $insert_id = $db->lastInsertId();

            $std = new stdClass();
            $std->comment_id = $insert_id;
            $std->comment = $comment_txt;
            $std->userId = (int)$userId;

            return $std;
        }else{
            return null;
        }

    }

    public static function update($data){

    }

    public static function delete($commentId){
        //delete the comments from the comments database using the id of the commment_id

        $db = new PDO('mysql:host=localhost;dbname=commentbox;charset=utf8','root','');
        $stmt = $db->prepare("DELETE FROM comments WHERE comment_id =:commentId");

        $stmt->bindParam(':commentId', $commentId);
        if($stmt->execute()){
            return true;
        }else{
            return null;
        }
    }
}
?>