<?php

    class Subscribers{
        public static function getSubscriber($userId){
            $db = new PDO('mysql:host=localhost;dbname=commentbox;charset=utf8','root','');

            $stmt = $db->prepare("SELECT * FROM subscribers WHERE id = $userId");
            if($stmt->execute()){

                $count = $stmt->rowCount();
                if($count == 1){
                    foreach($stmt->fetchAll() as $row) {
                        return $row;
                    }
                }
            }
        }
    }
?>