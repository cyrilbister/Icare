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


function update($base, $num, $rue, $ville, $code_postal)
{

    $reponse = $base->prepare('UPDATE adresse SET `Numéro de bâtiment` = :num, `Nom de rue` = :nom, `Ville`=:ville, `Code postal`=:code  WHERE `N° d\'adresse` = 0 ');
    $reponse->execute(array('num' => $num, 'nom' => $rue, 'ville' => $ville, 'code' => $code_postal));
    /*$donnees = $reponse->fetch();*/
    $reponse->closeCursor(); // Termine le traitement de la requête

}
if (($_POST['num_rue']=="") OR ($_POST['nom_rue'] =="") OR ($_POST['ville'] =="") OR ( $_POST['code_postal']=="")){


    header('Location: parametre_site.php');
}

else {
    update($base, $_POST['num_rue'], $_POST['nom_rue'], $_POST['ville'], $_POST['code_postal']);
    header('Location: parametre_site.php');

}

if ($_POST['nom_site'] != ""){
    nom_site($base, $_POST['nom_site']);
    header('Location: parametre_site.php');
}
else{
    header('Location: parametre_site.php');
}

function nom_site($base, $nom_site){
    $reponse = $base->prepare('UPDATE administrateur_établisemment SET `Nom de l\'auto école` = :nom');
    $reponse->execute(array('nom' => $nom_site));
    /*$donnees = $reponse->fetch();*/
    $reponse->closeCursor(); // Termine le traitement de la requête
}


?>