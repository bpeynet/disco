ALTER TABLE `f_cd` CHANGE `user_progra` `user_progra` INT(10) UNSIGNED NULL DEFAULT NULL;
UPDATE `f_cd` SET user_progra = null WHERE user_progra = 0 ;

ALTER TABLE `f_genre` CHANGE `primaire` `principal` TINYINT(1) NOT NULL;

ALTER TABLE `f_piste` CHANGE `artiste` `artiste` INT(10) UNSIGNED NULL DEFAULT NULL;
UPDATE `f_piste` SET `artiste` = NULL WHERE `artiste` = 0;


UPDATE `f_piste` SET `langue` = 0 WHERE `langue` != 1 ;