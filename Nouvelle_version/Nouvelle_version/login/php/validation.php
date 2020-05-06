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

$mdp = $_GET['mdp'];
$clef = $_GET['clef'];

$reponse = $base->prepare('SELECT `Clef de vérificationS`, `ACTIF` FROM identite WHERE `Mot de passe` =:mdp');

if($reponse->execute(array('mdp' => $mdp)) && $donnees = $reponse->fetch())
{
    $clefbdd = $donnees['Clef de validation'];
    $actif = $donnees['Actif'];
}

if ($actif=='Actif'){
    echo 'Votre compte est déjà actif !';
}
else {
    if ($clef==$clefbdd){
        echo "Votre compte a bien été activé !";

        $reponse = $base->prepare('UPDATE identite SET `Actif` = `Actif`  WHERE `Mot de passe` =:mdp');
        $reponse -> execute(array("mdp"=>$mdp ));

    }
    else{
        echo "Erreur ! Votre compte ne peut être activé...";
    }

}
?>


