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