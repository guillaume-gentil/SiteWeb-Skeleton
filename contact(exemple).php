<?php
require_once('./inc/header.tpl.php');

// Les données transsmisent via les formulaires se trouvent dans les superglobales
// - $_GET pour les données passées avec la méthodes HTTP GET
// - $_POST pour les données passées avec la méthodes HTTP POST

var_dump($_POST);
// var_dump($_GET);

// On extrait nos données depuis la variable superglobale $_POST
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];

//! Bonus Opérateur coalescent null
// On essaie de récupérer le champ "name" dans une variable $name. S'il n'existe pas, on met la valeur "Michel" dans $name.
$name = $_GET['name'] ?? 'Michel';

// 1 - On s'assure que les données dont on a besoin existent
// On utilise une fonction native de PHP isset
// https://www.php.net/manual/fr/function.isset
if ( isset($lastname) && isset($firstname) && isset($email) ) {

    // 2- On valide que le format de l'email est correct
    // On utilise la fonction native PHP filter_input
    // qui permet d'extraire une donnée et d'y appliquer un filtre (de validation ou nettoyage)
    // https://www.php.net/manual/fr/function.filter-input
    // https://www.php.net/manual/fr/filter.filters.php
    // https://www.php.net/manual/fr/filter.filters.validate.php
    // => Ici, on extrait la valeur à clé 'email' du tableau $_POST (et non pas la varibla $email)
    $filtered_email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

    // Si la validation ne passe pas : la réponse est 'false'
    // Autrement : 'true'
    var_dump($filtered_email);

    // Si le format de l'email n'est pas valide
    if (!$filtered_email) {
        // un ptit message d'erreur
        echo 'Veuillez renseigner un email correct !';
    } else {
        // Sinon, c'est ok !
        echo "Merci $firstname $lastname pour votre message, on vous répond sur votre email : $email";
        // On pourrait éventuellement déclencher d'autres actions ici (ex: un envoie d'email)
    }
}
?>

<h2 class="right__title">Nous contacter</h2>

<div class="posts">
    <div class="post post--solo">

        <!--
            Déclaration d'un formulaire en HTML
            https://developer.mozilla.org/fr/docs/Learn/Forms/Your_first_form
            https://developer.mozilla.org/fr/docs/Web/HTML/Element/Input
            https://developer.mozilla.org/fr/docs/Web/HTML/Element/select
            https://developer.mozilla.org/fr/docs/Web/HTML/Element/Textarea
            https://developer.mozilla.org/fr/docs/Web/HTML/Element/Label
            https://developer.mozilla.org/fr/docs/Web/HTML/Element/Button
            
            action = url du fichier dans lequel sera traité le form
            Si action est vide, c'est le fichier dans lequel sera le formulaire qui sera appelé*/

            method = méthode HTTP par laquelle transite les données
            choix possible : GET ou POST
        -->
        <form action="contact.php" method="post" class="contact-form">

            <div class="contact-form__row">
                <div>
                    <input type="radio" name="gender" id="genderMrs" value="madame">
                    <label for="genderMrs">Mme</label> /
                    <input type="radio" name="gender" id="genderMr" value="monsieur">
                    <label for="genderMr">M</label>
                </div>
                <input type="text" name="firstname" placeholder="Prénom" value="" required class="contact-form__item">
                <input type="text" name="lastname" placeholder="Nom" value="" required class="contact-form__item">
            </div>

            <div class="contact-form__row">
                <input type="email" name="email" placeholder="Adresse e-mail" required class="contact-form__item">
            </div>

            <div class="contact-form__row contact-form__row--bottom">
                <label for="source" class="contact-form__label">J'ai connu ce site grâce à</label>
                <select name="source" id="source" class="contact-form__item">
                    <option value="">choisir</option>
                    <option value="fb">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="google">Google</option>
                    <option value="bouche-a-oreilles">Bouche à oreilles</option>
                    <option value="jpp">JT de 13h de Jean-Pierre Pernault</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="contact-form__row">
                <label for="message" class="contact-form__label">Pour laisser un commentaire libre à propos d'O'clock c'est par ici :</label>
            </div>
            <div class="contact-form__row contact-form__row--bottom">
                <textarea name="message" id="message" placeholder="Votre message" class="contact-form__item contact-form__item--textarea "></textarea>
            </div>

            <div class="contact-form__row contact-form__row--bottom">
                <input type="checkbox" name="infos-ok" id="infos-ok" class="contact-form__item contact-form__item--checkbox">
                <label for="infos-ok">Je certifie la véracité de ces informations</label>
            </div>

            <div class="contact-form__row contact-form__row--bottom">
                <label for="fileUpload">Ajouter un fichier :</label>&nbsp;
                <input type="file" name="fileUpload" id="fileUpload">
            </div>

            <!-- On ne précise pas le type du button car par défaut il est de type submit -->
            <button class="contact-form__submit">Envoyer</button>
            <!--
                Juste une autre façon de faire un bouton submit
                <input type="submit" value="Envoyer" class="contact-form__submit">
            -->
        </form>

        <a href="./index.php" class="post__link">back to home</a>
    </div>
</div>

<?php require_once('./inc/footer.tpl.php') ?>