/*Mise à jour des langues dans la table f_langue*/
UPDATE f_langue SET libelle = "Anglais" WHERE langue = 1 or langue = 11 or langue = 15 or langue = 16 or langue = 19 or langue = 28 or langue = 29 or langue = 30 or langue = 39 or langue = 42;
UPDATE f_langue SET libelle = "Français" WHERE langue = 2 or langue = 3 or langue = 4 or langue = 6 or langue = 7 or langue = 13 or langue = 14 or langue = 17 or langue = 18 or langue = 40 or langue = 46 or langue = 49;
UPDATE f_langue SET libelle = "Instru" WHERE langue=5 or langue = 35 or langue = 41 or langue = 43 or langue = 44;
UPDATE f_langue SET libelle = "Autre" WHERE langue = 8 or langue = 10 or langue = 27 or langue = 33;
UPDATE f_langue SET libelle = "Espagnol" WHERE langue = 9 or langue = 22 or langue = 23 or langue = 24 or langue = 25 or langue = 34;
UPDATE f_langue SET libelle = "Allemand" WHERE langue = 12 or langue = 20 or langue = 38 or langue = 48;
UPDATE f_langue SET libelle = "Portuguais" WHERE langue = 21 or langue = 26 or langue = 50;
UPDATE f_langue SET libelle = "Italien" WHERE langue = 32 or langue = 45;
UPDATE f_langue SET libelle = "n/a" WHERE langue = 36;
UPDATE f_langue SET libelle = "Arabe" WHERE langue = 37;
UPDATE f_langue SET libelle = "Japonais" WHERE langue = 47;

/*Regroupement dans une même table des identiques*/
UPDATE f_cd SET langue=1 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Anglais' AND langue != 1 GROUP BY langue);
UPDATE f_cd SET langue=2 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Français' AND langue != 2 GROUP BY langue);
UPDATE f_cd SET langue=5 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Instru' AND langue != 5 GROUP BY langue);
UPDATE f_cd SET langue=8 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Autre' AND langue != 8 GROUP BY langue);
UPDATE f_cd SET langue=9 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Espagnol' AND langue != 9 GROUP BY langue);
UPDATE f_cd SET langue=12 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Allemand' AND langue != 12 GROUP BY langue);
UPDATE f_cd SET langue=21 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Portuguais' AND langue != 21 GROUP BY langue);
UPDATE f_cd SET langue=32 WHERE langue IN (SELECT langue FROM f_langue t WHERE libelle = 'Italien' AND langue != 32 GROUP BY langue);

/*Suppression des tables "inutiles"*/
DELETE FROM f_langue WHERE (libelle = 'Anglais' or libelle = 'Français' or libelle = 'Instru' or libelle = 'Autre' or libelle = 'Espagnol' or libelle = 'Allemand' or libelle = 'Portuguais' or libelle = 'Italien') AND langue != 1 AND langue != 2 AND langue != 5 AND langue!=8 AND langue!=9 AND langue!=12 AND langue!=21 AND langue!=32;