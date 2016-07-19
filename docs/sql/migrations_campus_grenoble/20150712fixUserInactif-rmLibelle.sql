UPDATE `f_user` SET inactif = NULL WHERE inactif = '0000-00-00';
ALTER TABLE `f_user` DROP `libelle`;
