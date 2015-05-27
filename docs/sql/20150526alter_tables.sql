ALTER TABLE `f_label` CHANGE `mail_progra` `mail_progra` VARCHAR(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL; 
UPDATE `f_label` SET `mail_progra` = NULL WHERE `mail_progra` = '';

/*Problème au niveau des genres...*/

UPDATE f_cd SET genre = NULL WHERE genre = 19 OR genre = 150;