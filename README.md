sécurité : connextion :
avec email (donc unique)
on récupère le password (hash et salf tout ça)
et on ajoute un badge, qui est un tableau qui contient le CSRF token, qui est un jeton de sécurité qui permet de vérifier que le formulaire vienne bien de notre site)

symfony cast verify email pour envoyer un courriel

list all routes : `logo eco itlogo eco it`
vider le cache : `php bin/console cache:clear --env=dev`

# Table des matières

[TOC]

# Notion

Il s'agit là d'un projet académique, je suis encore à l'étape de l'apprentissage de la force.

# Description

Les documents annexes sont disponibles dans le dossier Annexes :

    Schéma relationel

# Exigences

## Téléchargez Symfony CLI

Pour vérifier si vous réunissez toutes les conditions requises avant d'installer ce projet :

    symfony check:requirements

## Mais surtout téléchargez Composer

Vous trouverez facielement sur internet une documtation pour l'installer avec une version compatible avec votre environnement de travail.

# Récupération du projet

    git clone https://github.com/p3titbo3uf/ecf

# Installation

Déplacement dans le dossier

    cd ecf

# Installation des dépendances

    composer install

# Création de la base de donnees

S'assurer que le fichier env pointe vers une base de données qui existe.

    php bin/console doctrine:database:create

# Création des tables

    php bin/console doctrine:migrations:migrate

OU

    php bin/console doctrine:schema:update --force

# Utilisation

Pour lancer le serveur :

    symfony server:start

Un utilisateur est déjà présent dans la base de données : robert@hue.fr dont le mot de passe est `azerty`
