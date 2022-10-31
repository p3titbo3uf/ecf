# Table des matières

-   [Table des matières](#table-des-matières)
-   [Notion](#notion)
-   [Description](#description)
-   [Exigences](#exigences)
    -   [Téléchargez Symfony CLI](#téléchargez-symfony-cli)
    -   [Mais surtout téléchargez Composer](#mais-surtout-téléchargez-composer)
-   [Récupération du projet](#récupération-du-projet)
-   [Installation](#installation)
-   [Installation des dépendances](#installation-des-dépendances)
-   [Création de la base de donnees](#création-de-la-base-de-donnees)
-   [Création des tables](#création-des-tables)
-   [Utilisation](#utilisation)
    [Tester le projet](#tester-le-projet)

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

Un utilisateur est déjà présent dans la base de données : robert@hue.fr dont le mot de passe est `azerty`.

# Table des matières

-   [Table des matières](#table-des-matières)
-   [Notion](#notion)
-   [Description](#description)
-   [Exigences](#exigences)
    -   [Téléchargez Symfony CLI](#téléchargez-symfony-cli)
    -   [Mais surtout téléchargez Composer](#mais-surtout-téléchargez-composer)
-   [Récupération du projet](#récupération-du-projet)
-   [Installation](#installation)
-   [Installation des dépendances](#installation-des-dépendances)
-   [Création de la base de donnees](#création-de-la-base-de-donnees)
-   [Création des tables](#création-des-tables)
-   [Utilisation](#utilisation)
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

    symfony server:start

Un utilisateur est déjà présent dans la base de données : robert@hue.fr dont le mot de passe est `azerty`.
