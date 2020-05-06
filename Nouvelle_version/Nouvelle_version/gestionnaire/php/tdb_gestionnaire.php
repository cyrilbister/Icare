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
    <title>Tableau de bord</title>
    <link rel= "stylesheet" href="../../header_footer/header_connecte.css" media="all" type="text/css">
    <link rel= "stylesheet" href="../css/tdb_gestionnaire.css" media="all" type="text/css">
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
<p class="titre">
    Tableau de bord
</p>
<p class="annonce">
    Bonjour <?php

    $reponse = $base->prepare('SELECT `Nom d\'utilisateur` FROM identite WHERE `Nom d\'utilisateur` = :pseudo');
    $reponse-> execute(array('pseudo' => $_SESSION['username']));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    echo $donnees['Nom d\'utilisateur'];


    ?>, voici le récaptitulatif de votre compte :<br><br>
    Vous avez créé <?php

    $reponse = $base->prepare('SELECT COUNT(*) FROM utilisateur WHERE `N° de Compte` = (SELECT `N° de compte` FROM gestionnaire WHERE `Nom d\'utilisateur` = :pseudo) ');
    $reponse-> execute(array('pseudo' => $_SESSION['username']));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    echo $donnees['COUNT(*)'];


    ?> comptes d'utilisateurs.
</p>
<p class="description">
    Liste des élèves de l'auto-école inscrits sur le site :
</p>
<div id="Affichage-élèves">
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date d'inscription</th>
        </tr>
        <?php

        $req = $base->prepare('SELECT `N° de compte` FROM gestionnaire WHERE `Nom d\'utilisateur` = :pseudo');
        $req -> execute(array('pseudo' => $_SESSION['username']));

        while ($num_compte = $req->fetch()){

            $req2 = $base->prepare('SELECT `N° Identité` FROM utilisateur WHERE `N° de Compte` = :num_compte');
            $req2->execute(array('num_compte' => $num_compte['N° de compte']));

            while ($num_identite = $req2->fetch()) {

                ?><?php

                $reponse = $base->prepare('SELECT `Nom`, `Prénom`, `N° Identité` FROM identite WHERE `N° Identité` = :num_identite ');
                $reponse->execute(array('num_identite' => $num_identite['N° Identité']));

                while ($donnees = $reponse->fetch()) {
                    ?>


                    <?php

                    $req3 = $base->prepare('SELECT `Date inscription` FROM utilisateur WHERE `N° Identité` = :num_identite');
                    $req3->execute(array('num_identite' => $donnees['N° Identité']));

                    while ($donnees3 = $req3->fetch()) {
                        ?>

                        <tr class=choix>
                            <td><a><?php echo $donnees['Nom']; ?></a></td>
                            <td><a><?php echo $donnees['Prénom']; ?></a></td>
                            <td><a><?php echo $donnees3['Date inscription']; ?></a></td>
                        </tr>
                        <?php


                    };
                    $req3->closeCursor();

                };
                $reponse->closeCursor();

            };
            $req2->closeCursor(); // Termine le traitement de la requête
        };


        $req->closeCursor();

        ?>
    </table>
</div>
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
            <iframe class="API" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.7658445478332!2d2.2776649150477297!3d48.82452897928419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670797ea4730d%3A0xe0d3eb2ad501cb27!2sISEP!5e0!3m2!1sfr!2sfr!4v1583759492983!5m2!1sfr!2sfr" width="400" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        </p>
    </div>
</footer>
</html>
