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
    <title>Forum</title>
    <link rel= "stylesheet" href="../css/forum_gestionnaire.css" media="all" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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


<div class="bandeHaut">
    <h1> Forum </h1>

</div>

<table>
    <caption></caption>

    <thead> <!-- En-tête du tableau -->
    <tr>
        <th>Sujet</th>
        <th>Date de la dernière réponse</th>
        <th>Auteur</th>
        <th>Date de la publication</th>
    </tr>
    </thead>


    <tbody> <!-- Corps du tableau -->
    <tr>
        <td>Sujet 1</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Sujet 2</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Sujet 3</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Sujet 4</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Sujet 5</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Sujet 6</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
</table>

<div class="container" id="P1">
    <p>Proposer une question</p><br/>
</div>

<form>
    <div class="container" id="un">
        <label for="sujet">Sur quel sujet porte votre question ?</label><br/>
        <select name="pays" id="sujet">
            <option value="s0">Choix du sujet</option>
            <option value="s1">Sujet 1</option>
            <option value="s2">Sujet 2</option>
            <option value="s3">Sujet 3</option>
            <option value="s4">Sujet 4</option>
            <option value="s5">Sujet 5</option>
            <option value="s6">Sujet 6</option>
            <option value="ns">Nouveau sujet</option>
        </select>
    </div><br/>
    <div class="container" id="deux">
        <label for="nouvelle_question"> Votre question </label><br/>
        <input type="text" name="pseudo" id="pseudo" placeholder="Posez votre question ici" />
        <hr>
    </div><br/>
    <div class="container" id="trois">
        <input type="submit" value="Envoyer la question" />
    </div>
</form>

<div class="container" id="P2">
    <p>Proposer une réponse</p><br/>
</div>

<form>
    <div class="container" id="quatre">
        <label for="sujet">Dans quel sujet se trouve la question ?</label><br/>
        <select name="sujet" id="sujet">
            <option value="s0">Choix du sujet</option>
            <option value="s1">Sujet 1</option>
            <option value="s2">Sujet 2</option>
            <option value="s3">Sujet 3</option>
            <option value="s4">Sujet 4</option>
            <option value="s5">Sujet 5</option>
            <option value="s6">Sujet 6</option>
            <option value="ns">Nouveau sujet</option>
        </select>
    </div><br/>
    <div class="container" id="cinq">
        <label for="réponse">A quelle question voulez-vous répondre ?</label><br/>
        <select name="réponse" id="réponse">
            <option value="q0">Choix de la question</option>
            <option value="q1">Question 1</option>
            <option value="q2">Question 2</option>
            <option value="q3">Question 3</option>
        </select>
    </div><br/>
    <div class="container" id="six">
        <label for="nouvelle_réponse">Votre réponse</label><br/>
        <input type="text" name="pseudo" id="pseudo" placeholder="Répondez ici" />
    </div><br/>
    <div class="container" id="sept">
        <input type="submit" value="Envoyer la réponse" />
    </div>
</form>

<div class="container" id="P3">
    <p>test  </p><br/>
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
