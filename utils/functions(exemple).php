<?php

// On va créer une fonction qui va se charger d'afficher l'HTML d'un article
//* Méthodo
// - Mettre en place une fonction qui va s'appeler 'displayArticle'
// - Pour ça on a besoin de connaitre l'article qu'on veut afficher
// - Recup les données de cet article
// - D'appeler le fichier de template qui va afficher les dites données

function displayArticle($pNumArticle) {
    // On inclut le fichier contenant le GIGAAA tableau des articles
    // __DIR__ est une constante magique
    // https://www.php.net/manual/fr/language.constants.magic.php
    // elle est toujours définie et contient toujours la même chose :
    // Le chemin absolue vers le dossier courant (sans le slash à la fin)
    // Super pratique pour avoir le bon chemin absolue quelque soit la machine sur laquelle
    // le code est executé !
    require_once( __DIR__ . "/../data/dataArticles.php");

    // On recup ainsi l'article demandé (via le param $pNumArticle)
    // On vient piocher dans le GIGAAAA tableau, l'article N°$pNumArticle
    $article = $articles[$pNumArticle];

    // On convertit la date de publication (string) en timestamp
    $timestamp = strtotime($article['publicationDate']);

    // On formatte le timestamp dans un certain format
    $formattedDate = date('d F Y', $timestamp);

    // On appel le template qui va se charger d'afficher toutes ces données
    require_once( __DIR__ . "/../inc/article.tpl.php");
}
