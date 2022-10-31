# Installation instructions of the project

-   `composer install`
-   créer la base de données sur le serveur de test
-   mettre à jour le fichier .env pour connecter le projet à une base de données
-   installer les tables du projet sur la BDD grâce à `php bin/console doctrine:migrations:migrate`
-   un utilisateur est déjà présent dans la base de données : robert@hue.fr dont le mot de passe est `azerty`
-   `symfony server:start`

sécurité : connextion :
avec email (donc unique)
on récupère le password (hash et salf tout ça)
et on ajoute un badge, qui est un tableau qui contient le CSRF token, qui est un jeton de sécurité qui permet de vérifier que le formulaire vienne bien de notre site)

symfony cast verify email pour envoyer un courriel

list all routes : `php bin/console debug:router`
vider le cache : `php bin/console cache:clear --env=dev`
