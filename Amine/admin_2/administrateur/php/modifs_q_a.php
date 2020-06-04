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
    <link rel='stylesheet' type='text/css' media='screen' href="../css/ajout__q_a.css">
    <link rel='stylesheet' type='text/css' media='screen' href="../../header_footer/header_connecte.css">
    <link rel='stylesheet' type='text/css' media='screen' href="../../header_footer/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src='main.js'></script>
</head>

<header>
    <div class="bande">
        <nav class="utilisateur">
            <ul>
                <li class="rubriques" ><a href="../../login/php/login.php">Deconnexion</a></li>
                <li class="rubriques"><a href="../php/compte_administrateur.php">Mon compte</a></li>
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
                <li class="rubriques"><a href="../../gestionnaire/php/forum_gestionnaire.php">Forum</a></li>
            </ul>
        </nav>
    </div>
    <div class="perso">
        <nav class="page-accueil">
            <ul>
                <li class="rubriques1" ><a href="tdb_administrateur.html">Tableau de bord</a></li>
                <li class="rubriques1" ><a href="edition_faq.html">Edition de FAQ</a></li>
                <li class="rubriques1"><a href="gestion_compte.html">Gestion des comptes</a></li>
                <li class="rubriques1"><a href="gestion_forum.html">Gestion du forum</a></li>
                <li class="rubriques1"><a href="parametres_site.html">Paramètres du site</a></li>
                <li class="rubriques1"><a href="nouveau_gestionnaire.html">Créer un gestionnaire</a></li>
                <li class="rubriques1"><a href="messagerie_admin.html">Messagerie</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>

?>


<form action="validation_modifs_q_a.php" method="post">
    <h1 class="titre">Modifier Q&A</h1>

    <div class="listbox">
    <SELECT name="choix_question">
        <?php
        $reponse = $base->prepare('SELECT `Question` FROM faq');
        $reponse-> execute();
        while($donnees = $reponse->fetch()){
            ?>

        <OPTION><?php

            echo $donnees['Question'];

            ?></OPTION>

        <?php

        }
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
    </SELECT>
    </div>

    <div id="checkbox">

        <input type="checkbox" class="checkbox" name="check_question" value="check_question">
        <label for="subscribeNews">Question</label>

        <input type="checkbox" class="checkbox" name="check_reponse" value="check_reponse">
        <label for="subscribeNews">Réponse</label>

    </div>

    <div id="champs" class="champs">
        <input type="text"  name ="question" id="question" class="question_reponse" placeholder="Veuillez saisir votre question">
        <hr>

        <input type="text"  name ="reponse" id="reponse" class="question_reponse" placeholder="Veuillez saisir la réponse à votre question">
    </div>
    <hr>


    <div class="bloc_bouton">
        <button class="bouton" href="validation_modifs_q_a">Modifier</button>
    </div>

    <hr id=hr2>

</form>

<script src="../js/modif_q_a.js"></script>
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
            <iframe class="API" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.7658445478332!2d2.2776649150477297!3d48.82452897928419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670797ea4730d%3A0xe0d3eb2ad501cb27!2sISEP!5e0!3m2!1sfr!2sfr!4v1583759492983!5m2!1sfr!2sfr" width="400" height="200" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        </p>


</footer>


</html>



