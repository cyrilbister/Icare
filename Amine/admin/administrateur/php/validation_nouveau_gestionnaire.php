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


<?php

function test_email($base, $mail){

    $reponse = $base->prepare('SELECT COUNT(*) FROM identite WHERE `Adresse email` = :mail');
    $reponse-> execute(array('mail' => $mail));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['COUNT(*)'];

}


function creation($base, $mail_inc, $mdp)
{

    $reponse = $base->prepare('INSERT INTO identite (`Adresse email`, `Type de compte`, `Actif`, `Mot de passe`, `Nom d\'utilisateur`) VALUES (:mail, :compte, :actif, :mdp_temp, :mail) ');
    $reponse->execute(array('mail' => $mail_inc, 'compte' => "Gestionnaire", 'actif' => "Inactif", 'mdp_temp'=>$mdp));
    $reponse->closeCursor(); // Termine le traitement de la requête

}

function gestionnaire($base, $mail_inc){

    $reponse = $base->prepare('INSERT INTO gestionnaire (`Nom d\'utilisateur`) VALUES ((SELECT `Nom d\'utilisateur` FROM identite WHERE `Adresse email`=:mail))');
    $reponse->execute(array('mail' => $mail_inc));
    $reponse->closeCursor(); // Termine le traitement de la requête



}

function genererChaineAleatoire($longueur)
    {
        $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/*-+^¨$£*%!:/;.,?=})°]à@ç_è`-|([{#é&';
        $chaine = '';
        $max = strlen($listeCar) - 1;
        for ($i = 0; $i < $longueur; $i=$i+1) {
            $chaine .= $listeCar[random_int(0, $max)];
        }
        return $chaine;
    }


if (test_email($base, $_POST['mail_inc'])!=0){


    header('Location: nouveau_gestionnaire.php');
}

else if ($_POST['mail_inc']==""){

    header('Location: nouveau_gestionnaire.php');
}

else {
    creation($base, $_POST['mail_inc'], genererChaineAleatoire(45));
    gestionnaire($base, $_POST['mail_inc']);
    header('Location: nouveau_gestionnaire.php');

}



?>
