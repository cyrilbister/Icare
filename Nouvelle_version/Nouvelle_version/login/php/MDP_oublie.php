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
    <title>Mot de passe oublié</title>
    <link rel='stylesheet' type='text/css' media='screen' href="../css/MDP_oublie.css">
    <link href="../../header_footer/footer.css" rel="stylesheet" media="all" type="text/css">
    <link href="../../header_footer/header_basique.css" rel="stylesheet" media="all" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<header>
    <div class="bande">
        <nav class="utilisateur">
            <ul>
                <li class="rubriques"><a href="login.html">Se connecter</a></li>
                <li class="rubriques"><a href="inscription.html">Création d'un compte</a></li>
            </ul>
        </nav>
    </div>

    <div class="menu">
        <nav class="page-accueil">
            <ul>
                <li class="rubriques"><a href="../../vitrine/php/accueil.php">Accueil</a></li>
                <li class="rubriques"><a href="infinite_measures.html">Infinite Measures & Vous</a></li>
                <li class="rubriques"><a href="../../vitrine/html/equipe.html">Notre Equipe</a></li>
                <li class="rubriques"><a href="stats.html">Nos Statistiques</a></li>
                <li class="rubriques"><a href="forum.html">Forum</a></li>
            </ul>
        </nav>
    </div>

</header>

<body>
<h1>Mot de passe oublié</h1>
<h3 id="premierh3">Si vous avez oublié votre mot de passe, veuillez renseigner votre adresse mail.</h3>
<form method="post" action="verif_MDP_oublie.php">
    <div class="container" id="un">
        <label for="mail" class = "mail">Adresse mail</label><br> <input type="text" id="mail" name="mail" class="mail"/><br>

        <div class="container" id="deux">
            <label></label><input type="submit" value="Récupérer mon mot de passe" class="bouton"/>
        </div>

        <p class="message_erreur"> <?php

            function nulle(){
                if (!isset($_SESSION['message_erreur'])){
                    echo "";
                }
                else{
                    echo $_SESSION['message_erreur'];
                }
            }
            nulle();

            ?></p>
    </div>

</form>





</body>

<footer class="footer-distributed">

    <div class="footer-left">

        <h3>I<span>Care</span></h3>

        <p class="footer-links">


            <a href="../../vitrine/php/faq.php">FAQ</a>
            .
            <a href="mentions.html">Mentions Légales</a>
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
            <iframe class="API"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.7658445478332!2d2.2776649150477297!3d48.82452897928419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670797ea4730d%3A0xe0d3eb2ad501cb27!2sISEP!5e0!3m2!1sfr!2sfr!4v1583759492983!5m2!1sfr!2sfr"
                    width="400" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        </p>
    </div>
</footer>

</html>
