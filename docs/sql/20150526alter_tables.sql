ALTER TABLE `f_label` CHANGE `mail_progra` `mail_progra` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL; 
UPDATE `f_label` SET `mail_progra` = NULL WHERE `mail_progra` = '';

/*Problème au niveau des genres...*/

UPDATE f_cd SET genre = NULL WHERE genre = 19 OR genre = 150;

ALTER TABLE `f_genre` DROP `principal`;
UPDATE `f_genre` SET actif = 0;
UPDATE `f_genre` SET actif = 1 WHERE genre IN(152,153,154,4,155,156,157,23,2,3,1,158);
ALTER TABLE `f_genre` CHANGE `actif` `principal` TINYINT(1) UNSIGNED NOT NULL DEFAULT '0';

DROP TABLE f_rappel;

ALTER TABLE `f_user` CHANGE `role` `role` VARCHAR(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;