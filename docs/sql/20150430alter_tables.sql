ALTER TABLE `f_cd` CHANGE `dsortie` `dsortie` DATE NOT NULL;
ALTER TABLE `f_cd` CHANGE `dsaisie` `dsaisie` DATE NOT NULL;
ALTER TABLE `f_cd` DROP `jsaisie`;

DROP TABLE f_grdr;
DROP TABLE f_groupe;
ALTER TABLE `f_user` CHANGE `groupe` `role` VARCHAR(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

UPDATE `f_user` SET role = 'ROLE_SUPER_ADMIN' WHERE role = 'SUPERADMIN';
UPDATE `f_user` SET role = 'ROLE_USER' WHERE role = 'USER';
UPDATE `f_user` SET role = 'ROLE_PROGRA' WHERE role = 'PROGRA';

ALTER TABLE `f_user` CHANGE `pwd` `password` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, CHANGE `login` `username` VARCHAR(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `f_user` CHANGE `password` `password` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

DELETE FROM f_airplay_cd WHERE cd NOT IN (SELECT cd from f_cd);
ALTER TABLE `f_airplay` DROP `annee`, DROP `mois`, DROP `chrono`, DROP `courant`;

ALTER TABLE `f_rotation` DROP `apu`;
UPDATE `disco`.`f_rotation` SET `retour_label` = 'a été mis en rotation faible.' WHERE `f_rotation`.`rotation` = 1;
UPDATE `disco`.`f_rotation` SET `retour_label` = 'a été mis en rotation moyenne.' WHERE `f_rotation`.`rotation` = 2;
UPDATE `disco`.`f_rotation` SET `retour_label` = 'a été mis en rotation forte.' WHERE `f_rotation`.`rotation` = 3;
UPDATE `disco`.`f_rotation` SET `retour_label` = 'a été mis à disposition des émissions spéciales.' WHERE `f_rotation`.`rotation` = 4;
UPDATE `disco`.`f_rotation` SET `retour_label` = 'n''a pas été retenu.' WHERE `f_rotation`.`rotation` = 5;
UPDATE `disco`.`f_rotation` SET `retour_label` = 'n''a pas été retenu.' WHERE `f_rotation`.`rotation` = 7;
UPDATE `disco`.`f_rotation` SET `retour_label` = 'a été mis à disposition des émissions spéciales.' WHERE `f_rotation`.`rotation` = 6;

UPDATE `f_cd` SET rotation = NULL WHERE rotation > 7;


ALTER TABLE `f_airplay_cd` DROP `dbkey`;