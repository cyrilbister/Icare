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

if ($_POST['question']=="" AND $_POST['reponse']==""){

    header('Location: modifs_q_a.php');
}
else{

    modifier_question($base, $_POST['choix_question'], $_POST['question'], $_POST['reponse']);
    header('Location: modifs_q_a.php');
}

function modifier_question($base, $choix, $question, $reponse){
    if(isset($reponse)){
        $req = $base->prepare('UPDATE faq SET `Reponse`=:reponse WHERE `Question`=:choix');
        $req->execute(array('choix'=>$choix,'reponse'=>$reponse));
        $req->closeCursor(); // Termine le traitement de la requête
    }
    if(isset($question)) {
        $req = $base->prepare('UPDATE faq SET `Question`=:question WHERE `Question`=:choix');
        $req->execute(array('choix'=>$choix,'question' => $question));
        $req->closeCursor(); // Termine le traitement de la requête
    }
    }

?>
