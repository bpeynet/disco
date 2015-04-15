/*Mise à jour des langues dans la table f_langue*/
UPDATE f_langue SET libelle = "Anglais" WHERE langue IN (1,11,15,16,19,28,29,30,39,42);
UPDATE f_langue SET libelle = "Français" WHERE langue IN (2,3,4,6,7,13,14,17,18,40,46,49);
UPDATE f_langue SET libelle = "Instru" WHERE langue IN (5,35,41,43,44);
UPDATE f_langue SET libelle = "Autre" WHERE langue IN (8,10,27,33);
UPDATE f_langue SET libelle = "Espagnol" WHERE langue IN (9,22,23,24,25,34);
UPDATE f_langue SET libelle = "Allemand" WHERE langue IN (12,20,38,48);
UPDATE f_langue SET libelle = "Portuguais" WHERE langue IN (21,26,50);
UPDATE f_langue SET libelle = "Italien" WHERE langue IN (32,45);
UPDATE f_langue SET libelle = "n/a" WHERE langue = 36;
UPDATE f_langue SET libelle = "Arabe" WHERE langue = 37;
UPDATE f_langue SET libelle = "Japonais" WHERE langue = 47;

/*Regroupement dans une même table des identiques*/
UPDATE f_cd SET langue=1 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Anglais' AND langue != 1);
UPDATE f_cd SET langue=2 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Français' AND langue != 2);
UPDATE f_cd SET langue=5 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Instru' AND langue != 5);
UPDATE f_cd SET langue=8 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Autre' AND langue != 8);
UPDATE f_cd SET langue=9 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Espagnol' AND langue != 9);
UPDATE f_cd SET langue=12 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Allemand' AND langue != 12);
UPDATE f_cd SET langue=21 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Portuguais' AND langue != 21);
UPDATE f_cd SET langue=32 WHERE langue IN (SELECT DISTINCT langue FROM f_langue t WHERE libelle = 'Italien' AND langue != 32);

/*Suppression des tables "inutiles"*/
DELETE FROM f_langue WHERE libelle IN ('Anglais','Français','Instru','Autre','Espagnol','Allemand','Portuguais','Italien') AND langue NOT IN (1,2,5,8,9,12,21,32);