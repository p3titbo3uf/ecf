# Installation instructions of the project

-   `composer install`
-   créer la base de données sur le serveur de test
-   mettre à jour le fichier .env pour connecter le projet à une base de données
-   installer les tables du projet sur la BDD grâce à `php bin/console doctrine:migrations:migrate`
-   php bin/console doctrine:query:sql "INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `roles`) VALUES (null, 'Robert', 'Hue', 'robert@hue.fr', '$2y$13$2kH3tw9avvxHP/UeGlRxue7y1A2RUAPSX8FZw9iy8PCkth3Gk/Dei', '[\"ROLE_TECH\"]');"
    mdp => azerty
-   symfony server:start

sécurité : connextion :
avec email (donc unique)
on récupère le password (hash et salf tout ça)
et on ajoute un badge, qui est un tableau qui contient le CSRF token, qui est un jeton de sécurité qui permet de vérifier que le formulaire vienne bien de notre site)

symfony cast verify email pour envoyer un courriel
