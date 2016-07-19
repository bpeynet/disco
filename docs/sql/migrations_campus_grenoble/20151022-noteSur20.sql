ALTER TABLE `f_cd_note` ADD `note2` INT UNSIGNED NOT NULL DEFAULT '10';
UPDATE `f_cd_note` SET `note2`=round(note*4);
ALTER TABLE `f_cd_note` DROP `note`;
ALTER TABLE `f_cd_note` CHANGE `note2` `note` INT( 10 ) UNSIGNED NOT NULL DEFAULT '10';
