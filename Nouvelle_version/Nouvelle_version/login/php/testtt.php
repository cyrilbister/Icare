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

<?php


function test_email($base, $mail){

    $reponse = $base->prepare('SELECT COUNT(*) FROM identite WHERE `Adresse email` = :mail  ');
    $reponse-> execute(array('mail' => $mail));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['COUNT(*)'];

}

function test_identite($base, $nom, $prenom, $rue, $ville){
    $reponse = $base->prepare('SELECT COUNT(*) FROM identite WHERE `Nom` = :nom AND `Prénom` = :prenom AND `N° Identité` = (SELECT `N° d\'adresse` FROM adresse WHERE `Ville`= :ville AND `Nom de rue`= :rue )');
    $reponse-> execute(array('nom' => $nom, 'prenom' => $prenom, 'rue' => $rue, 'ville' => $ville));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['COUNT(*)'];

}

function test_username($base, $pseudo){
    $reponse = $base->prepare('SELECT COUNT(*) FROM identite WHERE `Nom d\'utilisateur` = :pseudo');
    $reponse-> execute(array('pseudo' => $pseudo));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['COUNT(*)'];

}

function genererChaineAleatoire($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/*-+^¨$£*µù%!§:/;.,?=})°]à@ç_è`-|([{#~é&²')
{
    $chaine = '';
    $max = mb_strlen($listeCar, '8bit') - 1;
    for ($i = 0; $i < $longueur; ++$i) {
        $chaine .= $listeCar[random_int(0, $max)];
    }
    return $chaine;
}

function mailConfirmation($base){

    $mail = $_POST['mail'];
    $mdp = $_POST['pass1'];

    $clef = genererChaineAleatoire(10);

    $req = $base->prepare('UPDATE identite SET `Clef de vérification` =:clef  WHERE `Mot de passe` =:mdp');
    $req -> execute(array("clef"=>$clef,"mdp"=>$mdp ));


    $destinataire = $mail;
    $sujet = "Activer votre compte" ;
    $entete = "From: youandicare@gmail.com" ;

    $message = 'Merci d\'avoir créer votre compte ICare ! Afin d\'en finaliser l\'activation, veuillez cliquer sur le lien ci-dessous.
    
    localhost\Test\activation.php?log='.urlencode($mdp).'&cle='.urlencode($clef).';
    
    
    ---------------
    Ceci est un mail automatique, merci de ne pas y répondre.';

    mail($destinataire, $sujet, $message, $entete) ;

}

function remplissageCorrect($base, $nom, $prenom, $batiment, $rue, $ville, $code_postal, $date_naissance, $pseudo, $mail, $pass1, $pass2){


    if (test_email($base,$mail) >= 1){

        $_SESSION['message_erreur']="Cette adresse mail est déjà reliée à un compte !";
        header('Location: parametres_compte_utilisateur.php');

    }

    elseif (test_username($base, $pseudo) >= 1){
        $_SESSION['message_erreur']="Ce nom d'utilisateur est déjà relié à un compte !";
        header('Location: parametres_compte_utilisateur.php');

    }

    elseif ((intval($code_postal) == false)){
        $_SESSION['message_erreur']="Veuillez indiquer un code postal valable !";
        header('Location: parametres_compte_utilisateur.php');
    }

    elseif (($code_postal < 0) OR (stripos($code_postal, '**'))){

        $t = fopen('log.txt', 'r+');
        fputs($t, $code_postal);
        fclose($t);

        $_SESSION['message_erreur']="Veuillez indiquer un code postal valable !";
        header('Location: parametres_compte_utilisateur.php');
    }


    elseif (intval($batiment) == false){

        $_SESSION['message_erreur']="Veuillez indiquer un numéro de bâtiment entier !";
        header('Location: parametres_compte_utilisateur.php');

    }

    elseif (($batiment < 0) OR (stripos($batiment, '*')) OR ($batiment > 10**7)){

        $t = fopen('log.txt', 'r+');
        fputs($t, $code_postal);
        fclose($t);

        $_SESSION['message_erreur']= "Veuillez indiquer un numéro de bâtiment valable !";
        header('Location: parametres_compte_utilisateur.php');
    }

    elseif ($pass1 != $pass2) {

        $_SESSION['message_erreur']="Les mots de passe ne sont pas similaires !";
        header('Location: parametres_compte_utilisateur.php');

    }
    elseif (test_identite($base, $_POST['nom'], $_POST['prenom'], $_POST['rue'], $_POST['ville'] ) >= 1) {
        $_SESSION['message_erreur']="Un compte à votre nom et adresse postale existe déjà, veuillez vérifier la base de donnée ou contacter un administrateur pour éviter les duplicatas !";
        header('Location: parametres_compte_utilisateur.php');

    }
    else if (!isset($nom, $prenom, $batiment, $rue, $ville, $code_postal, $date_naissance, $pseudo, $mail, $pass1,  $pass2)) {
        $_SESSION['message_erreur']="Veuillez compléter tous les champs requis !";
        header('Location: parametres_compte_utilisateur.php');
    }
    else{
        $t = fopen('log.txt', 'r+');
        fputs($t, $code_postal);
        fclose($t);

        insertion($base, $_POST['nom'], $_POST['prenom'],$_POST['batiment'],$_POST['rue'], $_POST['ville'], $_POST['code_postal'], $_POST['pays'], $_POST['date_naissance'], $_POST['pseudo'], $_POST['mail'], $_POST['pass1'], $_POST['pass2']);
        mailConfirmation($base);
        header('Location: login.php');
    }

}

function insertion($base, $nom, $prenom, $batiment, $rue, $ville, $code_postal, $pays, $date_naissance, $pseudo, $mail, $pass1){

    $identite = $base->prepare('INSERT INTO identite (`Adresse email`, `Nom`, `Prénom`, `Nom d\'utilisateur`, `Mot de passe`, `Date de naissance`, `Actif`) VALUES (:mail, :nom, :prenom, :pseudo, :mdp, :date_naissance, :actif)');
    $identite-> execute(array('mail' => $mail, 'nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'mdp' => $pass1, "date_naissance" => $date_naissance, "actif" => 'Inactif'));

    $adresse = $base->prepare('INSERT INTO adresse (`Numéro de bâtiment`, `Nom de rue`, `Code postal`, `Ville`, `Pays`) VALUES (:batiment, :rue, :code_postal, :ville, :pays)');
    $adresse-> execute(array('batiment' => $batiment, 'rue' => $rue, 'code_postal' => $code_postal, 'ville' => $ville, 'pays' => $pays));

}

remplissageCorrect($base, $_POST['nom'], $_POST['prenom'],$_POST['batiment'],$_POST['rue'], $_POST['ville'], $_POST['code_postal'],  $_POST['date_naissance'], $_POST['pseudo'], $_POST['mail'], $_POST['pass1'], $_POST['pass2']);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Page_creation_compte.css" />
    <title>Accueil - Barbecue & Graviers</title>
</head>



<body>






</body>
</html>
