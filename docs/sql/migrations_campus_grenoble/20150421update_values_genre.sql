/**

Ce fichier gère la mise a jour des anciennes valeurs de la BDD Disco vers les nouvelles

*/

/* on ajoute un tag principal pour savoir si c'est un genre ou un type */
ALTER TABLE `f_genre` ADD `primaire` BOOLEAN NOT NULL ;
UPDATE f_genre SET primaire=TRUE WHERE genre IN (152,153,154,4,155,156,157,23,2,3,1,158);


/*Ces genre n'existent pas, on les ajoute donc*/
INSERT INTO f_genre(genre,libelle) VALUES(152,'Chanson');
INSERT INTO f_genre(genre,libelle) VALUES(153,'Classic');
INSERT INTO f_genre(genre,libelle) VALUES(154,'Country/Blues');
INSERT INTO f_genre(genre,libelle) VALUES(155,'Folk/Accoustique');
INSERT INTO f_genre(genre,libelle) VALUES(156,'Funk/Soul');
INSERT INTO f_genre(genre,libelle) VALUES(157,'Hip-Hop');
INSERT INTO f_genre(genre,libelle) VALUES(158,'World-Latino');
INSERT INTO f_genre(genre,libelle) VALUES(159,'Bass Music');
INSERT INTO f_genre(genre,libelle) VALUES(160,'Court');
INSERT INTO f_genre(genre,libelle) VALUES(161,'Down-Tempo');
UPDATE f_genre SET libelle = 'Expérimental' WHERE genre = 58;
INSERT INTO f_genre(genre,libelle) VALUES(163,'Extrême');
INSERT INTO f_genre(genre,libelle) VALUES(164,'Français');
INSERT INTO f_genre(genre,libelle) VALUES(165,'GOLD');
INSERT INTO f_genre(genre,libelle) VALUES(166,'Groove/RnB');
INSERT INTO f_genre(genre,libelle) VALUES(167,'Instru');
INSERT INTO f_genre(genre,libelle) VALUES(168,'Local');
INSERT INTO f_genre(genre,libelle) VALUES(169,'Long');
INSERT INTO f_genre(genre,libelle) VALUES(170,'Math-rock/post-rock');
INSERT INTO f_genre(genre,libelle) VALUES(171,'Poésie');
INSERT INTO f_genre(genre,libelle) VALUES(172,'Reprise');

CREATE UNIQUE INDEX tmp ON f_cd_genre(cd,genre);

/*Mise à jour des genres secondaires*/
UPDATE IGNORE f_cd_genre SET genre=152 WHERE genre IN (105,12,26);
DELETE FROM f_cd_genre WHERE genre IN (105,12,26);

UPDATE IGNORE f_cd_genre SET genre=153 WHERE genre IN (141,119);
DELETE FROM f_cd_genre WHERE genre IN (141,119);

UPDATE IGNORE f_cd_genre SET genre=154 WHERE genre IN (13,112,42,29,71,6);
DELETE FROM f_cd_genre WHERE genre IN (13,112,42,29,71,6);

UPDATE IGNORE f_cd_genre SET genre=4 WHERE genre IN (83,37,116,118,10,36,113,114,28,9,20,31);
DELETE FROM f_cd_genre WHERE genre IN (83,37,116,118,10,36,113,114,28,9,20,31);

UPDATE IGNORE f_cd_genre SET genre=155 WHERE genre IN (107,96,146,16,73,104,33,22,17);
DELETE FROM f_cd_genre WHERE genre IN (107,96,146,16,73,104,33,22,17);

UPDATE IGNORE f_cd_genre SET genre=156 WHERE genre IN (151,15,44,108,25,35);
DELETE FROM f_cd_genre WHERE genre IN (151,15,44,108,25,35);

UPDATE IGNORE f_cd_genre SET genre=157 WHERE genre IN (95,79,99,99,8,82,144,52,66);
DELETE FROM f_cd_genre WHERE genre IN (95,79,99,99,8,82,144,52,66);

UPDATE IGNORE f_cd_genre SET genre=23 WHERE genre IN (120,81,18,90);
DELETE FROM f_cd_genre WHERE genre IN (120,81,18,90);

UPDATE IGNORE f_cd_genre SET genre=2 WHERE genre IN (92,34,38,125,129,48,77,86,88,5,49,7,40,60,54);
DELETE FROM f_cd_genre WHERE genre IN (92,34,38,125,129,48,77,86,88,5,49,7,40,60,54);

UPDATE IGNORE f_cd_genre SET genre=3 WHERE genre IN (21,24,70,11,109,55,135,110);
DELETE FROM f_cd_genre WHERE genre IN (21,24,70,11,109,55,135,110);

UPDATE IGNORE f_cd_genre SET genre=1 WHERE genre IN (74,93,68,128,130,121,45,97,101,100,67,131,127,103,84,72,98,63,85,75,65,64,94,123,27,78,87,124,46,39,89,61,43,30,59,148,122);
DELETE FROM f_cd_genre WHERE genre IN (74,93,68,128,130,121,45,97,101,100,67,131,127,103,84,72,98,63,85,75,65,64,94,123,27,78,87,124,46,39,89,61,43,30,59,148,122);

UPDATE IGNORE f_cd_genre SET genre=158 WHERE genre IN (137,140,80,117,132,139,14,136,57,41,115);
DELETE FROM f_cd_genre WHERE genre IN (137,140,80,117,132,139,14,136,57,41,115);

DROP INDEX tmp ON f_cd_genre;

UPDATE f_cd SET type = 13 WHERE genre = 50;

DELETE FROM f_genre WHERE genre IN (105,12,26,141,119,83,37,116,118,10,36,113,114,28,9,20,31,107,96,146,16,73,104,33,22,17,151,15,44,108,25,35,95,79,99,99,8,144,52,66,120,81,18,90,92,34,38,125,129,48,77,86,88,5,49,7,40,60,54,21,24,70,11,109,55,135,110,74,93,68,128,130,121,45,97,101,100,67,127,103,84,98,85,75,65,64,94,27,78,87,124,46,39,89,61,43,30,59,148,122,137,140,80,117,132,139,14,136,57,41,115,6,13,19,29,42,71,112,145,32,47,53,62,76,91,102,126,133,134,138,150);
