<?php

session_abort();
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

    $reponse = $base->prepare('SELECT COUNT(*) FROM identite WHERE `Adresse email` = :mail  ');
    $reponse-> execute(array('mail' => $mail));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['COUNT(*)'];

}

function remplissageCorrect($base, $mail)
{
    if (test_email($base, $mail) == 0 ) {

        $_SESSION['message_erreur'] = "Cette adresse mail n'est associée à aucun compte !";
        header('Location: MDP_oublie.php');

    }
    else{

        header('Location: login.php');
    }
}

remplissageCorrect($base, $_POST['mail']);

?>
