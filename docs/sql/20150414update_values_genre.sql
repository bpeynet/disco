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
UPDATE IGNORE f_cd_genre SET genre=152 WHERE genre=105 or genre = 12 or genre = 26;
DELETE FROM f_cd_genre WHERE genre=105 or genre = 12 or genre = 26;

UPDATE IGNORE f_cd_genre SET genre=153 WHERE genre=141 or genre=119;
DELETE FROM f_cd_genre WHERE genre=141 or genre=119;

UPDATE IGNORE f_cd_genre SET genre=154 WHERE genre=13 or genre=112 or genre=42 or genre=29 or genre=71 or genre=6;
DELETE FROM f_cd_genre WHERE genre=13 or genre=112 or genre=42 or genre=29 or genre=71 or genre=6;

UPDATE IGNORE f_cd_genre SET genre=4 WHERE genre=83 or genre=37 or genre=116 or genre=118 or genre=10 or genre=36 or genre=113 or genre=114 or genre=28 or genre=9 or genre=20 or genre=31;
DELETE FROM f_cd_genre WHERE genre=83 or genre=37 or genre=116 or genre=118 or genre=10 or genre=36 or genre=113 or genre=114 or genre=28 or genre=9 or genre=20 or genre=31;

UPDATE IGNORE f_cd_genre SET genre=155 WHERE genre=107 or genre=96 or genre=146 or genre=16 or genre=73 or genre=104 or genre=33 or genre=22 or genre=17;
DELETE FROM f_cd_genre WHERE genre=107 or genre=96 or genre=146 or genre=16 or genre=73 or genre=104 or genre=33 or genre=22 or genre=17;

UPDATE IGNORE f_cd_genre SET genre=156 WHERE genre=151 or genre=15 or genre=44 or genre=108 or genre=25 or genre=35;
DELETE FROM f_cd_genre WHERE genre=151 or genre=15 or genre=44 or genre=108 or genre=25 or genre=35;

UPDATE IGNORE f_cd_genre SET genre=157 WHERE genre=95 or genre=79 or genre=99 or genre=99 or genre=8 or genre=82 or genre=144 or genre=52 or genre=66;
DELETE FROM f_cd_genre WHERE genre=95 or genre=79 or genre=99 or genre=99 or genre=8 or genre=82 or genre=144 or genre=52 or genre=66;

UPDATE IGNORE f_cd_genre SET genre=23 WHERE genre=120 or genre=81 or genre=18 or genre=90;
DELETE FROM f_cd_genre WHERE genre=120 or genre=81 or genre=18 or genre=90;

UPDATE IGNORE f_cd_genre SET genre=2 WHERE genre=92 or genre=34 or genre=38 or genre=125 or genre=129 or genre=48 or genre=77 or genre=86 or genre=88 or genre=5 or genre=49 or genre=7 or genre=40 or genre=60 or genre=54;
DELETE FROM f_cd_genre WHERE genre=92 or genre=34 or genre=38 or genre=125 or genre=129 or genre=48 or genre=77 or genre=86 or genre=88 or genre=5 or genre=49 or genre=7 or genre=40 or genre=60 or genre=54;

UPDATE IGNORE f_cd_genre SET genre=3 WHERE genre=21 or genre=24 or genre=70 or genre=11 or genre=109 or genre=55 or genre=135 or genre=110;
DELETE FROM f_cd_genre WHERE genre=21 or genre=24 or genre=70 or genre=11 or genre=109 or genre=55 or genre=135 or genre=110;

UPDATE IGNORE f_cd_genre SET genre=1 WHERE genre=74 or genre=93 or genre=68 or genre=128 or genre=130 or genre=121 or genre=45 or genre=97 or genre=101 or genre=100 or genre=67 or genre=131 or genre=127 or genre=103 or genre=84 or genre=72 or genre=98 or genre=63 or genre=85 or genre=75 or genre=65 or genre=64 or genre=94 or genre=123 or genre=27 or genre=78 or genre=87 or genre=124 or genre=46 or genre=39 or genre=89 or genre=61 or genre=43 or genre=30 or genre=59 or genre=148 or genre=122;
DELETE FROM f_cd_genre WHERE genre=74 or genre=93 or genre=68 or genre=128 or genre=130 or genre=121 or genre=45 or genre=97 or genre=101 or genre=100 or genre=67 or genre=131 or genre=127 or genre=103 or genre=84 or genre=72 or genre=98 or genre=63 or genre=85 or genre=75 or genre=65 or genre=64 or genre=94 or genre=123 or genre=27 or genre=78 or genre=87 or genre=124 or genre=46 or genre=39 or genre=89 or genre=61 or genre=43 or genre=30 or genre=59 or genre=148 or genre=122;

UPDATE IGNORE f_cd_genre SET genre=158 WHERE genre=137 or genre=140 or genre=80 or genre=117 or genre=132 or genre=139 or genre=14 or genre=136 or genre=57 or genre=41 or genre=115;
DELETE FROM f_cd_genre WHERE genre=137 or genre=140 or genre=80 or genre=117 or genre=132 or genre=139 or genre=14 or genre=136 or genre=57 or genre=41 or genre=115;


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
			WHEN 10 THEN
			WHEN 11 THEN
			WHEN 12 THEN
			WHEN 13 THEN
			WHEN 14 THEN
			WHEN 15 THEN
			WHEN 16 THEN
			WHEN 17 THEN
			WHEN 18 THEN
			WHEN 19 THEN
			WHEN 20 THEN
			WHEN 21 THEN
			WHEN 22 THEN
			WHEN 23 THEN
			WHEN 24 THEN
			WHEN 25 THEN
			WHEN 26 THEN
			WHEN 27 THEN
			WHEN 28 THEN
			WHEN 29 THEN
			WHEN 30 THEN
			WHEN 31 THEN
			WHEN 32 THEN
			WHEN 33 THEN
			WHEN 34 THEN
			WHEN 35 THEN
			WHEN 36 THEN
			WHEN 37 THEN
			WHEN 38 THEN
			WHEN 39 THEN
			WHEN 40 THEN
			WHEN 41 THEN
			WHEN 42 THEN
			WHEN 43 THEN
			WHEN 44 THEN
			WHEN 45 THEN
			WHEN 46 THEN
			WHEN 47 THEN
			WHEN 48 THEN
			WHEN 49 THEN
			WHEN 50 THEN
			WHEN 51 THEN
			WHEN 52 THEN
			WHEN 53 THEN
			WHEN 54 THEN
			WHEN 55 THEN
			WHEN 56 THEN
			WHEN 57 THEN
			WHEN 58 THEN
			WHEN 59 THEN
			WHEN 60 THEN
			WHEN 61 THEN
			WHEN 62 THEN
			WHEN 63 THEN
			WHEN 64 THEN
			WHEN 65 THEN
			WHEN 66 THEN
			WHEN 67 THEN
			WHEN 68 THEN
			WHEN 69 THEN
			WHEN 70 THEN
			WHEN 71 THEN
			WHEN 72 THEN
			WHEN 73 THEN
			WHEN 74 THEN
			WHEN 75 THEN
			WHEN 76 THEN
			WHEN 77 THEN
			WHEN 78 THEN
			WHEN 79 THEN
			WHEN 80 THEN
			WHEN 81 THEN
			WHEN 82 THEN
			WHEN 83 THEN
			WHEN 84 THEN
			WHEN 85 THEN
			WHEN 86 THEN
			WHEN 87 THEN
			WHEN 88 THEN
			WHEN 89 THEN
			WHEN 90 THEN
			WHEN 91 THEN
			WHEN 92 THEN
			WHEN 93 THEN
			WHEN 94 THEN
			WHEN 95 THEN
			WHEN 96 THEN
			WHEN 97 THEN
			WHEN 98 THEN
			WHEN 99 THEN
			WHEN 100 THEN
			WHEN 101 THEN
			WHEN 102 THEN
			WHEN 103 THEN
			WHEN 104 THEN
			WHEN 105 THEN
			WHEN 106 THEN
			WHEN 107 THEN
			WHEN 108 THEN
			WHEN 109 THEN
			WHEN 110 THEN
			WHEN 111 THEN
			WHEN 112 THEN
			WHEN 113 THEN
			WHEN 114 THEN
			WHEN 115 THEN
			WHEN 116 THEN
			WHEN 117 THEN
			WHEN 118 THEN
			WHEN 119 THEN
			WHEN 120 THEN
			WHEN 121 THEN
			WHEN 122 THEN
			WHEN 123 THEN
			WHEN 124 THEN
			WHEN 125 THEN
			WHEN 126 THEN
			WHEN 127 THEN
			WHEN 128 THEN
			WHEN 129 THEN
			WHEN 130 THEN
			WHEN 131 THEN
			WHEN 132 THEN
			WHEN 133 THEN
			WHEN 134 THEN
			WHEN 135 THEN
			WHEN 136 THEN
			WHEN 137 THEN
			WHEN 138 THEN
			WHEN 139 THEN
			WHEN 140 THEN
			WHEN 141 THEN
			WHEN 142 THEN
			WHEN 143 THEN
			WHEN 144 THEN
			WHEN 145 THEN
			WHEN 146 THEN
			WHEN 147 THEN
			WHEN 148 THEN
			WHEN 149 THEN
			WHEN 150 THEN

		END

		SET @NumCD++
	END
END

DROP INDEX tmp;
