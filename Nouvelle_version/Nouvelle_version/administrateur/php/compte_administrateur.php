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
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gestion du Forum</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="../css/compte_gestionnaire_admin.css">
    <link rel='stylesheet' type='text/css' media='screen' href="../../header_footer/header_connecte.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src='main.js'></script>
</head>

<header>
    <div class="bande">
        <nav class="utilisateur">
            <ul>
                <li class="rubriques" ><a href="../../login/php/login.php">Deconnexion</a></li>
                <li class="rubriques"><a href="compte_administrateur.php">Mon compte</a></li>
                <!-- lien vers les paramètres du comptes (différent pour chaque type de compte) -->
            </ul>
        </nav>
    </div>

    <div class="menu">
        <nav class="page-accueil">
            <ul>
                <li class="rubriques" ><a href="accueil.html">Accueil</a></li>
                <li class="rubriques" ><a href="infinite_measures.html">Infinite Measures & Vous</a></li>
                <li class="rubriques"><a href="equipe.html">Notre Equipe</a></li>
                <li class="rubriques"><a href="stats.html">Nos Statistiques</a></li>
                <li class="rubriques"><a href="forum.html">Forum</a></li>
            </ul>
        </nav>
    </div>
    <div class="perso">
        <nav class="page-accueil">
            <ul>
                <li class="rubriques1" ><a href="../tdb_administrateur/tdb_administrateur.html">Tableau de bord</a></li>
                <li class="rubriques1" ><a href="../edition_faq/edition_faq.html">Edition de FAQ</a></li>
                <li class="rubriques1"><a href="../gestion_compte/gestion_compte.html">Gestion des comptes</a></li>
                <li class="rubriques1"><a href="../gestion_forum/gestion_forum.html">Gestion du forum</a></li>
                <li class="rubriques1"><a href="../parametres_site/parametres_site.html">Paramètres du site</a></li>
                <li class="rubriques1"><a href="../nouveau_gestionnaire/nouveau_gestionnaire.html">Créer un gestionnaire</a></li>
                <li class="rubriques1"><a href="../messagerie_admin/messagerie_admin.html">Messagerie</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>


<form method="POST" action="">
    <p class="titre">
        Paramétrer mon compte
    </p>
    <input type="submit" value="Confirmer la modification" class="bouton1"/>
    <div class="container" id="un">
        <section>
            <label for="nom">Nom</label><br /> <input type="text" id="nom" name="nom_inc" class="nom" required><br />
            <hr>
            <label for="prénom">Prénom</label><br /> <input type="text" id="prénom" name="prénom_inc" class="prénom" required/><br />
            <hr>
            <label for="pseudo">Nom d'utilisateur</label><br /> <input type="text" id="pseudo" name="pseudo_inc" class="pseudo" maxlength="10"/><br />
            <hr>
            <label for="numéro de téléphone">Numéro de téléphone</label><br /> <input type="tel" id="numéro de téléphone" name="num_de_tel_inc"><br />
            <hr>
            <label for="mail">Adresse mail</label><br /> <input type="text" id="mail" name="mail_inc" class="mail"/><br />
            <hr>
        </section>
    </div>

    <div class="container" id="deux">
        <label for="pass1">Mot de passe</label><br /> <input type="password" id="pass1" name="pass1_inc" class="pass1"/><br />
        <hr>
        <label for="pass2">Mot de passe<span class="petit"> (vérification)</span></label><br /> <input type="password" id="pass2" name="pass2_inc" class="pass2"/><br />
        <hr>
    </div>
    <p class="ajoutPHP"><!-- paragraphe pour le Javascipt--></p>
</form>

</body>



<footer class="footer-distributed">

    <div class="footer-left">

        <h3>I<span>Care</span></h3>

        <p class="footer-links">


            <a href="../../vitrine/php/faq.php">FAQ</a>
            .
            <a href="#">Mentions Légales</a>
            </br>



            <a href="#">Langues</a> -

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
            <p>+33 68 61 24 99</p>
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

