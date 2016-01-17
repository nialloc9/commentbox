CREATE TABLE `commentbox`.`subscribers` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `profile_img` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `commentbox`.`comments` ( `comment_id` INT NOT NULL , `comment` TEXT NOT NULL , `user_id` INT(11) NOT NULL ) ENGINE = InnoDB;

