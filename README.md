# SiteWeb-Skeleton
Structure de base pour démarrer un projet Web

## Source :
* **livre**
  *  *'Créer son site Web, Du projet à la réalisation*, Émilie Courts, Vuibert, sept 2016
*  **formation O'clock**
   *  *S02 (serveur) - PHP/S02-E04-atelier-oNews-multipages*

## La méthode

Méthode basée sur la construction d'un site web **page par page**. Cette méthode est efficace à condition de ne pas remettre en question l'organisation choisie au départ.

Un site Web c'est un ensemble :

1. pages PHP / HTML avec du contenu
2. images
3. scripts
4. fonctions
5. styles CSS

## La structure

``` yaml
monProjet/    # racine du projet

    !Des_dossiers_de_base

          images/ ou img/         # contient les "images.jpg" (png, svg,...)
          styles/ ou css/         # contient les "styles.css"
          scripts/ ou js/         # contient les fonctionnalités côté client "monScript.js" (code js pure)
          classes/                # (facultatif) contient les classes si on programme en objet
          data/                   # contient par exemple les données de chaque articles que l'on viendra "piocher" selon les besoins
          common_parts/ ou includes/ ou inc/ # contient les templates : "header.tpl.php", "menu.tpl.php", "footer.tpl.php", "articles.tpl.php",... (code HTML et boucles PHP pour gérer l'affichage)
          functions/ ou utils/    # contient les fonctionnalités serveur cachées "mesFonctions.php" (code PHP pure, par exemple pour dynamiser l'affichage des articles d'un bloc)
          _DATA/                  # contient tous les fichiers qui se rapportent au site mais qui n'en font pas partie : code d'accès, charte graphique, maquettes,...

    !Des_fichiers_pour_les_pages_obligatoires  # (code PHP pure, avec des include et require)

          index.php  # c'est le fichier que va afficher le serveur, il DOIT s'appeler "index.php"
          contact.php
          mentions-legales.php
          cgu.php
          ...

    !Des_dossiers_et_fichiers_pour_les_pages_thematiques

          sushi/
                index.php  # (facultatif) page d'accueil de la catégorie
                sushi-saumon.php
                maki-thon.php
          espace-client/
                index.php  # (facultatif) page d'accueil de la catégorie
                mon-compte.php
                carte-fidelite.php

```

## Quelques règles

* La notation des dossiers et fichiers NE doit comporter NI **espaces** NI **accents**
