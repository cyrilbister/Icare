<?php

session_start();
try
{
    // On se connecte à MySQL
    $base = new PDO('mysql:host=localhost;dbname=bdd_icare;port=3308;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link href="../../header_footer/header_basique.css" rel="stylesheet" media="all" type="text/css">
    <link href="../../header_footer/footer.css" rel="stylesheet" media="all" type="text/css">
    <link href="../css/accueil.css" rel="stylesheet" media="all" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<header>
    <div class="bande">
        <nav class="utilisateur">
            <ul>
                <li class="rubriques"><a href="../../login/php/login.php">Se connecter</a></li>
                <li class="rubriques"><a href="inscription.php">Création d'un compte</a></li>
            </ul>
        </nav>
    </div>

    <div class="menu">
        <nav class="page-accueil">
            <ul>
                <li class="rubriques"><a href="accueil.php">Accueil</a></li>
                <li class="rubriques"><a href="../html/infinite_measures.html">Infinite Measures & Vous</a></li>
                <li class="rubriques"><a href="../html/equipe.html">Notre Equipe</a></li>
                <li class="rubriques"><a href="stats.html">Nos Statistiques</a></li>
                <li class="rubriques"><a href="../../utilisateur/php/forum_utilisateur.php">Forum</a></li>
            </ul>
        </nav>
    </div>

</header>


<body>

<div class="firstcontainer">

    <figure class="swap-on-hover">
        <img  class="swap-on-hover__front-image" src="https://images.unsplash.com/photo-1521136095380-08fbd7be93c8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80"/>
        <img class="swap-on-hover__back-image" src="https://images.unsplash.com/photo-1485463611174-f302f6a5c1c9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1055&q=80"/>
        <div class="text-block">
            <h4 style="font: bold 50px sans-serif;">PASSEZ AU NIVEAU SUPERIEUR</h4>
        </div>
    </figure>

</div>

<center><h1 style="font: bold 50px sans-serif; color: #292c2f;">Nos valeurs & nos convictions</h1></center>

<div class="container">
    <div class="photo">
        <img class="swap-on-hover__back-image" src="https://images.unsplash.com/photo-1543279385-618b485c1677?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1490&q=80"/>
    </div>
    <div class="content">
        <h4>Ce que nous proposons</h4>
        <p>Bienvenue sur le site de <?php

            $reponse = $base->prepare('SELECT `Nom de l\'auto école` FROM administrateur_etablissement');
            $reponse->execute();
            $donnees = $reponse->fetch();
            echo $donnees['Nom de l\'auto école'];
            $reponse->closeCursor();

            ?>! Ici vous pourrez naviguer à travers les différentes sections et découvrir les services que propose la structure, mais également son fonctionnement.<br>
            L'établissement vous propose ses services afin de pouvoir tester votre aptitude, ou non, à conduire en toute sécurité.
            Si vous disposez d'une place au sein de l'auto-école, vous pourrez créer votre compte afin d'accéder à vos résultats en ligne. <br>
        <p>Vous recevrez aussi un bulletin postal, vous indiquant les potentielles maladies décelées lors du passage de vos tests, et vous permettre d'aller consulter votre médécin référent.<br>
            Bonne conduite !
        </p>
    </div>
</div>

<div class="container">
    <div class="photo">
        <img class="swap-on-hover__back-image" src="https://images.unsplash.com/photo-1505455184862-554165e5f6ba?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"/>
    </div>
    <div class="content">
        <h4>Nos Valeurs</h4>
        <p>Nous garantissons notre solution et notre prestation ccomme des élements réalisés pour votre bien-être et votre sécurité. <br>
            Nous plaçons l'humain au coeur de nos valeurs et souhaitons que nos conseils puissent vous permettre de conduire en toute serénité. N'hésitez surtout pas à contacter le support quant à vos doutes ou inquiétudes.</p>
    </div>
</div>


<div class="espace">

</div>

</body>


<footer class="footer-distributed">

    <div class="footer-left">

        <h3>I<span>Care</span></h3>

        <p class="footer-links">


            <a href="faq.php">FAQ</a>
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


