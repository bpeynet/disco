
ALTER TABLE `f_piste` CHANGE `paulo` `rivendell` TINYINT(1) NOT NULL;

ALTER TABLE `f_cd` CHANGE `type` `type` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET type= NULL WHERE type=0;

ALTER TABLE `f_cd` CHANGE `rotation` `rotation` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET rotation= NULL WHERE rotation=0;
UPDATE `f_cd` SET rotation = NULL WHERE rotation > 7;

ALTER TABLE `f_cd` CHANGE `support` `support` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET support= NULL WHERE support=0;

ALTER TABLE `f_cd` CHANGE `genre` `genre` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET genre= NULL WHERE genre=0;

ALTER TABLE `f_cd` CHANGE `langue` `langue` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET langue= NULL WHERE langue=0;

ALTER TABLE `f_cd` CHANGE `label` `label` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET label= NULL WHERE label=0;

ALTER TABLE `f_cd` CHANGE `maison` `maison` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET maison= NULL WHERE maison=0;

ALTER TABLE `f_cd` CHANGE `distrib` `distrib` INT( 10 ) UNSIGNED NULL DEFAULT NULL ;
UPDATE f_cd SET distrib= NULL WHERE distrib=0;

ALTER TABLE `f_cd` ADD `ecoute` VARCHAR(128) UNSIGNED NULL DEFAULT NULL;