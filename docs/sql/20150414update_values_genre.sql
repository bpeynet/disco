/**

Ce fichier gère la mise a jour des anciennes valeurs de la BDD Disco vers les nouvelles

*/

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
INSERT INTO f_genre(genre,libelle) VALUES(162,'Expérimental');
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


/*Edition des Genres et Styles*/
BEGIN

	SET @NumCD = (SELECT min(cd) FROM f_cd);
	SET @MaxCD = (SELECT max(cd) FROM f_cd);
	SET @CurrentCDGenre = 0;

	/*Boucle sur tous les CD*/
	WHILE @NumCD <= @MaxCD
	BEGIN
		SET CurrentCDGenre = (SELECT genre FROM f_cd WHERE cd = NumCD)
			
		CASE
			WHEN 1 THEN
				#On ne change rien : Rock
			WHEN 2 THEN
				#On ne change rien : Pop
			WHEN 3 THEN
				#On ne change rien : Reggae/Dub
			WHEN 4 THEN
				#On ne change rien : Electro
			WHEN 5 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(NumCD,155);
			WHEN 6 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(NumCD,155);
			WHEN 7 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD;
				INSERT IGNORE INTO f_cd_genre(cd,genre) VALUES(NumCD,1);
			WHEN 8 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD;
			WHEN 9 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 10 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 11 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD
			WHEN 12 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = NumCD
			WHEN 13 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = NumCD
			WHEN 14 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD
			WHEN 15 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = NumCD
			WHEN 16 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD
			WHEN 17 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD
			WHEN 18 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = NumCD
			WHEN 19 THEN
				 #Divers
			WHEN 20 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 21 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD
			WHEN 22 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD
			WHEN 23 THEN
				#Jazz
			WHEN 24 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD
			WHEN 25 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = NumCD
			WHEN 26 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = NumCD
			WHEN 27 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 28 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 29 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = NumCD
			WHEN 30 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 31 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 32 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 33 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD
			WHEN 34 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 35 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = NumCD
			WHEN 36 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 37 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 38 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 39 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 40 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 41 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD
			WHEN 42 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = NumCD
			WHEN 43 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 44 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = NumCD
			WHEN 45 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 46 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 47 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 48 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 49 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 50 THEN
				#Compilation
			WHEN 51 THEN
				#A DETERMINER
			WHEN 52 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD
			WHEN 53 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 54 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 55 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD
			WHEN 56 THEN
				#B.O.F
			WHEN 57 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD
			WHEN 58 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 59 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 60 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 61 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 62 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 63 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 64 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 65 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 66 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD
			WHEN 67 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 68 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 69 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 70 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD
			WHEN 71 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = NumCD
			WHEN 72 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 73 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD
			WHEN 74 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 75 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 76 THEN
				#easy listening
			WHEN 77 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 78 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 79 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD
			WHEN 80 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD
			WHEN 81 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = NumCD
			WHEN 82 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD
			WHEN 83 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 84 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 85 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 86 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 87 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 88 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 89 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 90 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = NumCD
			WHEN 91 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD
			WHEN 92 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD
			WHEN 93 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 94 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 95 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD
			WHEN 96 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD
			WHEN 97 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 98 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD
			WHEN 99 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD
			WHEN 100 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 101 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 102 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 103 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 104 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD			
			WHEN 105 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = NumCD			
			WHEN 106 THEN
				#inclassable		
			WHEN 107 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD			
			WHEN 108 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = NumCD			
			WHEN 109 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD			
			WHEN 110 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD			
			WHEN 111 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 112 THEN
				UPDATE f_cd SET genre = 154 WHERE cd = NumCD			
			WHEN 113 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 114 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 115 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD			
			WHEN 116 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 117 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD			
			WHEN 118 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 119 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = NumCD			
			WHEN 120 THEN
				UPDATE f_cd SET genre = 23 WHERE cd = NumCD			
			WHEN 121 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 122 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 123 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 124 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 125 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD			
			WHEN 126 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 127 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 128 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 129 THEN
				UPDATE f_cd SET genre = 2 WHERE cd = NumCD			
			WHEN 130 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 131 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 132 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD			
			WHEN 133 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 134 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 135 THEN
				UPDATE f_cd SET genre = 3 WHERE cd = NumCD			
			WHEN 136 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD			
			WHEN 137 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD			
			WHEN 138 THEN
				#Ra			
			WHEN 139 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD			
			WHEN 140 THEN
				UPDATE f_cd SET genre = 158 WHERE cd = NumCD			
			WHEN 141 THEN
				UPDATE f_cd SET genre = 152 WHERE cd = NumCD			
			WHEN 142 THEN
				UPDATE f_cd SET genre = 4 WHERE cd = NumCD			
			WHEN 143 THEN
				#inexistant :/			
			WHEN 144 THEN
				UPDATE f_cd SET genre = 157 WHERE cd = NumCD			
			WHEN 145 THEN
				#Habillage - Création	
			WHEN 146 THEN
				UPDATE f_cd SET genre = 155 WHERE cd = NumCD			
			WHEN 147 THEN
				#inexistant :/		
			WHEN 148 THEN
				UPDATE f_cd SET genre = 1 WHERE cd = NumCD			
			WHEN 149 THEN
				#Documentaire	
			WHEN 150 THEN
				#Création sonore
			WHEN 151 THEN
				UPDATE f_cd SET genre = 156 WHERE cd = NumCD

		END

		SET @NumCD++
	END
END

DROP INDEX tmp;
