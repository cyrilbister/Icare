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
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/Login.css'>
    <link href="../../header_footer/footer.css" rel="stylesheet" media="all" type="text/css">
    <script src='main.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


</head>
<body>
<div>


	<p>

	</p>

    <div id="container">
        <!-- zone de connexion -->

        <form action="" method="POST">

            <div class=Username>
            <p class="Usertxt">Nom d'utilisateur</p>
            <input class="username" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            </div>

            <hr>

            <div class=Password>
            <p class="Passtxt">Mot de passe</p>
            <input class="password" type="password" placeholder="Entrer le mot de passe" name="password" required>
            </div>

            <div class=Oubli>
                <a class="oubli" href="MDP_oublie.php">Mot de passe oublié ?</a>
            </div>

            <hr id="hr1">

            <input type="submit" id='Bouton' value='Connexion' >
        </form>
	</div>


</div>

<?php

unset($_SESSION['message_erreur']);


function login($base, $pseudo){

    $reponse = $base->prepare('SELECT `Mot de passe` FROM identite WHERE `Nom d\'utilisateur` = :pseudo  ');
    $reponse-> execute(array('pseudo' => $pseudo));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['Mot de passe'];

}
function type_compte($base, $pseudo){

    $reponse = $base->prepare('SELECT `Type de compte` FROM identite WHERE `Nom d\'utilisateur` = :pseudo  ');
    $reponse-> execute(array('pseudo' => $pseudo));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['Type de compte'];



}



if (isset($_POST['password']) AND $_POST['password'] == login($base, $_POST['username'])){

    $_SESSION['username'] = $_POST['username'];

    if (type_compte($base, $_POST['username']) == 'Gestionnaire'){

        echo '<script language = JavaScript>

        function changerPage()
        {
            document.getElementById("Bouton").onclick = window.location.href = "../../gestionnaire/php/tdb_gestionnaire.php";
        };
        
        changerPage();

    </script>';

    }
    elseif (type_compte($base, $_POST['username']) == 'Utilisateur'){

        echo '<script language = JavaScript>

        function changerPage()
        {
            document.getElementById("Bouton").onclick = window.location.href = "../../utilisateur/html/tbd_utilisateur.html";
        };
        
        changerPage();

    </script>';

    }

    elseif(type_compte($base, $_POST['username']) == 'Administrateur'){

        echo '<script language = JavaScript>

        function changerPage()
        {
            document.getElementById("Bouton").onclick = window.location.href = "../../administrateur/html/tdb_administrateur.html";
        };
        
        changerPage();

    </script>';
    }



}
else  {
    unset($_SESSION['username']);

}


?>

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

