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

 function get_identite($base, $id){

    $reponse = $base->prepare('SELECT `N° Identité` FROM identite WHERE `Nom d\'utilisateur`=:pseudo');
    $reponse-> execute(array('pseudo'=> $_SESSION['username']));
    $donnees = $reponse->fetch();
    $reponse->closeCursor(); // Termine le traitement de la requête

    return $donnees['N° Identité'];

 }
 
 
function update_email($base, $mail){

    $reponse = $base->prepare('UPDATE identite SET `Adresse email`=:mail WHERE `Nom d\'utilisateur`=:pseudo');
    $reponse-> execute(array('mail' => $mail, 'pseudo'=> $_SESSION['username']));
    $reponse->closeCursor(); // Termine le traitement de la requête

}

function update_nom($base, $nom){

    $reponse = $base->prepare('UPDATE identite SET `Nom`=:nom WHERE `Nom d\'utilisateur`=:pseudo');
    $reponse-> execute(array('nom' => $nom, 'pseudo'=> $_SESSION['username']));
    $reponse->closeCursor(); // Termine le traitement de la requête

}

function update_prenom($base, $prenom){

    $reponse = $base->prepare('UPDATE identite SET `Prénom`=:prenom WHERE `Nom d\'utilisateur`=:pseudo');
    $reponse-> execute(array('prenom' => $prenom, 'pseudo'=> $_SESSION['username']));
    $reponse->closeCursor(); // Termine le traitement de la requête

}


function update_pseudo($base, $pseudo){

    $reponse = $base->prepare('UPDATE identite SET `Nom d\'utilisateur`=:new WHERE `N° Identité`=:id');
    $reponse-> execute(array('new' => $pseudo, 'id'=> get_identite($base, $_SESSION['username'])));
    $reponse->closeCursor(); // Termine le traitement de la requête

    $_SESSION['username'] = $pseudo;

    

}
function update_phone($base, $phone){

    $reponse = $base->prepare('UPDATE identite SET `Numéro de téléphone`=:phone WHERE `Nom d\'utilisateur`=:pseudo');
    $reponse-> execute(array('phone' => $phone, 'pseudo'=> $_SESSION['username']));
    $reponse->closeCursor(); // Termine le traitement de la requête

}
function update_mdp($base, $mdp, $verif_mdp){

    if ($mdp == $verif_mdp){
    $reponse = $base->prepare('UPDATE identite SET `Mot de passe`=:mdp WHERE `Nom d\'utilisateur`=:pseudo');
    $reponse-> execute(array('mdp' => $mdp, 'pseudo'=> $_SESSION['username']));
    $reponse->closeCursor(); // Termine le traitement de la requête

    }
else{

    header("Location: compte_administrateur.php");
}

}




function update($base, $nom, $prenom, $phone, $mail, $mdp, $verif_mdp, $pseudo){

    update_nom($base, $nom);
    update_prenom($base, $prenom);
    update_phone($base, $phone);
    update_email($base, $mail);
    update_mdp($base, $mdp, $verif_mdp);
    update_pseudo($base, $pseudo);
    



    header("Location: compte_administrateur.php");


}

update($base, $_POST['nom_inc'], $_POST['prénom_inc'], $_POST['num_de_tel_inc'], $_POST['mail_inc'], $_POST['pass1_inc'], $_POST['pass2_inc'], $_POST['pseudo_inc']);
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 ?>