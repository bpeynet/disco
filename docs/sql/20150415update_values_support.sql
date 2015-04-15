/* Mise à jour de la table f_support */
UPDATE f_support SET libelle="CD" WHERE support = 1;
UPDATE f_support SET libelle="CD" WHERE support = 2;
UPDATE f_support SET libelle="CD" WHERE support = 3;
UPDATE f_support SET libelle="CD" WHERE support = 13;
UPDATE f_support SET libelle='7"' WHERE support = 4;
UPDATE f_support SET libelle='7"' WHERE support = 6;
UPDATE f_support SET libelle="2xCD" WHERE support = 5;
UPDATE f_support SET libelle="K7" WHERE support = 7;
UPDATE f_support SET libelle="mini-CD" WHERE support = 8;
UPDATE f_support SET libelle="2xLP" WHERE support = 9;
UPDATE f_support SET libelle="LP" WHERE support = 10;
UPDATE f_support SET libelle='12"' WHERE support = 11;
UPDATE f_support SET libelle="n/a" WHERE support = 12;
UPDATE f_support SET libelle="n/a" WHERE support = 14;

/* Mise à jour de la table f_cd */
UPDATE f_cd SET support = 1 WHERE support IN (SELECT DISTINCT support FROM f_support WHERE libelle = 'CD' AND support != 1);
UPDATE f_cd SET support = 4 WHERE support = 6;
UPDATE f_cd SET support = 12 WHERE support = 14;

/* Suppresion des entrées de la table f_support "inutiles" */
DELETE FROM f_support WHERE support IN (2,3,13,6,14);