<?php

session_start();

try {
    // On se connecte à MySQL
    $base = new PDO('mysql:host=localhost;dbname=bdd_icare;port=3308;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Contacter l'administrateur</title>
    <link rel= "stylesheet" href="../../header_footer/header_connecte.css" media="all" type="text/css">
    <link href="../css/contact_gestionnaire.css" rel="stylesheet" media="all" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
</head>

<header>
    <div class="bande">
        <nav class="utilisateur">
            <ul>
                <li class="rubriques" ><a href="../../login/php/login.php">Deconnexion</a></li>
                <li class="rubriques"><a href="compte_gestionnaire.php">Mon compte</a></li>
                <!-- lien vers les paramètres du comptes (différent pour chaque type de compte) -->
            </ul>
        </nav>
    </div>
    <div class="menu">
        <nav class="page-accueil">
            <ul>
                <li class="rubriques" ><a href="../../vitrine/php/accueil.php">Accueil</a></li>
                <li class="rubriques" ><a href="../../vitrine/html/infinite_measures.html">Infinite Measures & Vous</a></li>
                <li class="rubriques"><a href="../../vitrine/html/equipe.html">Notre Equipe</a></li>
                <li class="rubriques"><a href="stats.html">Nos Statistiques</a></li>
                <li class="rubriques"><a href="forum_gestionnaire.php">Forum</a></li>
            </ul>
        </nav>
    </div>
    <div class="perso">
        <nav class="page-accueil">
            <ul>
                <li class="rubriques1"><a href="tdb_gestionnaire.php">Tableau de bord</a></li>
                <li class="rubriques1"><a href="../html/nouvel_utilisateur.html">Nouvel utilisateur</a></li>
                <li class="rubriques1"><a href="../html/vu_resultats_gestionnaire.html">Consulter les tests</a></li>
                <li class="rubriques1"><a href="forum_gestionnaire.php">Participer au forum</a></li>
                <li class="rubriques1"><a href="contact_gestionnaire.php">Contacter l'administrateur</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>
<form method="POST" action="">
    <p class="titre">
        Envoyer un message à l'administrateur
    </p>
    <p class="instruction">
        Veuillez saisir votre message, celui-ci sera envoyé automatiquement après confirmation
    </p>
    <div class="container" id="un">
        <label for="message">Message</label><br />
        <input type="text" id="message" name="message_inc"class="message" /><br />
    </div>
    <input type="submit" value="Confirmer l'envoi du message" class="bouton"/>
    <p class="ajoutPHP"><!-- paragraphe pour le Javascipt--></p>
</form>

</body>
<footer class="footer-distributed">

    <div class="footer-left">

        <h3>I<span>Care</span></h3>

        <p class="footer-links">


            <a href="../../vitrine/php/faq.php">FAQ</a>
            .
            <a href="../mentions-faq-forum/mentions.html"> Mentions Légales</a>
            </br>



            <a href="#">Langues | </a>

            <a href="#2">Anglais</a>
            .
            <a href="#2">Français</a>


        </p>

        <p class="footer-company-name">Icare &copy; 2020</p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p>10 Rue de Vanves</br> Issy-les-Moulineaux, France</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+33 6 68 61 24 99</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">youandicare.supp@gmail.com</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>About the company</span>
            <iframe class="API" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.7658445478332!2d2.2776649150477297!3d48.82452897928419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670797ea4730d%3A0xe0d3eb2ad501cb27!2sISEP!5e0!3m2!1sfr!2sfr!4v1583759492983!5m2!1sfr!2sfr" width="350" height="100" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </p>

</footer>
</html>





