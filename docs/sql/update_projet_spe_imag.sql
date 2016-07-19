/* table toujours vide. ne sert que d'intermédiaire lors de l'envoi du fichier audio */
CREATE TABLE IF NOT EXISTS f_audio (
  id integer NOT NULL AUTO_INCREMENT,
  KEY id (id)
) ;
 
DELETE FROM f_genre WHERE libelle = 'Français';
