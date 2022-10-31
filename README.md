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

# Table des matières

[Notion](#notion)
[Description](#description)
[Exigences](#exigences)
[Récupération du projet](#recuperation-du-projet)
[Installation](#installation)
[Installation des dépendances](#installation-des-dependances)
[Création de la base de donnée](#creation-de-la-base-de-donnees)
[Création des tables](#creation-des-tables)
[Utilisation](#utilisation)
[Tester le projet](#tester-le-projet)

# Notion

Bien le bonjour mon brave. Le lien vers les quelques (grossières) étapes & réfléxions qui m'ont traversées l'esprit durant ce projet sont ici : Notion

# Description

Les documents annexes sont disponibles dans le dossier ANNEXES :

    Charte graphique
    Manuel d'utilisation
    Documentation technique
    Wireframes

# Exigences

## Téléchargez Symfony CLI

Pour vérifier si vous réunissez toutes les conditions requises avant d'installer ce projet :
`symfony check:requirements`

## Mais surtout téléchargez Composer

Vous trouverez facielement sur internet une documtation pour l'installer avec une version compatible avec votre environnement de travail.

# Récupération du projet

`git clone https://github.com/p3titbo3uf/ecf`

# Installation

Déplacement dans le dossier

`cd ecf`

# Installation des dépendances

`composer install`

# Création de la base de donnees

`php bin/console doctrine:database:create`

# Création des tables

`php bin/console doctrine:migrations:migrate`
OU
`php bin/console doctrine:schema:update --force`

# Utilisation

Pour lancer le serveur :

`php bin/console server:start`

# Tester le projet

Pour obtenir des liens de connexions :

contactez-moi par courriel : petit.boeuf@laposte.net
