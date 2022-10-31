# Instructions d'installation du project

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

list all routes : `logo eco itlogo eco it`
vider le cache : `php bin/console cache:clear --env=dev`

Table des matières

    Notion
    Description
    Vérification des conditions requises
    Récupération du projet
    Installation
    Installation des dépendances
    Création de la base de donnée
    Création des tables
    Insertions des jeux de données
    Installation du serveur
    Login

# Notion

Bien le bonjour mon brave. Le lien vers les quelques (grossières) étapes & réfléxions qui m'ont traversées l'esprit durant ce projet sont ici : Notion

# Description

Les documents annexes sont disponibles dans le dossier ANNEXES :

    Charte graphique
    Manuel d'utilisation
    Documentation technique
    Wireframes

Exigences

    Téléchargez Symfony CLI

    Pour vérifier si vous réunissez toutes les conditions requises avant d'installer ce projet :

$ symfony check:requirements

    Mais surtout téléchargez Composer

$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
$ php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
$ php composer-setup.php
$ php -r "unlink('composer-setup.php');"

# Recuperation du projet

$ git clone https://github.com/heavnzor/ECF

# Installation

    Déplacement dans le dossier

$ cd ECF

# Installation des dependances

$ composer install

# Creation de la base de donnees

$ symfony console doctrine:database:create

# Creation des tables

$ symfony console doctrine:migrations:migrate
OU
$ symfony console doctrine:schema:update --force

Insertion des jeux de donnees

$ symfony console doctrine:fixtures:load

Utilisation

Pour lancer le serveur :

symfony server:start

Tester le projet

Pour obtenir des liens de connexions :

contactez-moi par email : heavnzor@protonmail.com
