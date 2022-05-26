<?php 
require_once('./inc/header.tpl.php');

require_once('./utils/functions.php');
// Dans le lien des articles de la home page, on renvoie vers ce fichier uniquement
// On envoie également avec la méthode HTTP GET, un paramètre d'URL
// id = identifiant de l'article à afficher
// On peut maintenant se baser dessus pour afficher l'article qu'il faut !
// Pour ça on envoie cette valeur en argument à la fonction displayArticle()

// On convertit la query string en integer
$id = intval($_GET['id']);
displayArticle($id);

require_once('./inc/footer.tpl.php');
