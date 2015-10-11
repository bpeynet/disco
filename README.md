# Disco, deuxième du nom

L'application qui gère la discothèque de [Campus Grenoble](http://campusgrenoble.org)!

Basée sur le framework [Symfony](http://symfony.com/).

Requiert PHP 5.5

## Installation

Créer les tables dans la base de données et importer les données de base :
tout est dans le script docs/sql/base_vide.sql

Ensuite rendez-vous à http://monserver/disco/install pour créer le premier utilisateur.

Adaptez l'e-mail envoyé aux labels : app/Resources/views/mails/retour-label.txt.twig .

## Licence

Disco est distribuée sous licence MIT (voir License.md).
