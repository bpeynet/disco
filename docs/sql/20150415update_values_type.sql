/* Edition des nouveaux Formats dans f_type */
UPDATE f_type SET libelle="Album" WHERE type = 1;
UPDATE f_type SET libelle="Album" WHERE type = 5;
UPDATE f_type SET libelle="Album" WHERE type = 7;
UPDATE f_type SET libelle="Album" WHERE type = 9;
UPDATE f_type SET libelle="Album" WHERE type = 10;
UPDATE f_type SET libelle="Single" WHERE type = 2;
UPDATE f_type SET libelle="Single" WHERE type = 6;
UPDATE f_type SET libelle="Single" WHERE type = 11;
UPDATE f_type SET libelle="EP" WHERE type = 3;
UPDATE f_type SET libelle="Maxi-Single" WHERE type = 4;
UPDATE f_type SET libelle="Maxi-Single" WHERE type = 8;
UPDATE f_type SET libelle="n/a" WHERE type = 12;
UPDATE f_type SET libelle="n/a" WHERE type = 14;
UPDATE f_type SET libelle="Compilation" WHERE type = 13;

/*Mise à jour des Formats dans f_cd*/
UPDATE f_cd SET type=1 WHERE type IN (SELECT DISTINCT type FROM f_type t WHERE libelle = 'Album' AND type != 1);
UPDATE f_cd SET type=2 WHERE type IN (SELECT DISTINCT type FROM f_type t WHERE libelle = 'Single' AND type != 2);
UPDATE f_cd SET type=4 WHERE type IN (SELECT DISTINCT type FROM f_type t WHERE libelle = 'Maxi-Single' AND type != 12);
UPDATE f_cd SET type=12 WHERE type IN (SELECT DISTINCT type FROM f_type t WHERE libelle = 'n/a' AND type != 4);

/*Suppresion des "inutiles" dans f_type*/
DELETE FROM f_type WHERE (libelle = 'Album' or libelle = 'Single' or libelle = 'Maxi-Single' or libelle = 'n/a') AND type != 1 AND type != 2 AND type != 4 AND type!=12;