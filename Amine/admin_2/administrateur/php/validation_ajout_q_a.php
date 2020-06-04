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

if ($_POST['question']=="" OR $_POST['reponse']==""){

    header('Location: ajout_q_a.php');
}
else{

    ajouter_question($base, $_POST['question'], $_POST['reponse']);
    header('Location: ajout_q_a.php');
}

function ajouter_question($base, $question, $reponse){

    $req = $base->prepare('INSERT INTO faq (`Question`, `Reponse`) VALUES (:question, :reponse)');
    $req->execute(array('question' => $question, 'reponse'=>$reponse));
    $req->closeCursor(); // Termine le traitement de la requête

}

function modifier_question($base, $choix, $question, $reponse){
    if(isset($question)) {
        $req = $base->prepare('UPDATE faq SET `Question`=:choix WHERE `Question`=:question');
        $req->execute(array('choix'=>$choix,'question' => $question));
        $req->closeCursor(); // Termine le traitement de la requête
    }
    if(isset($reponse)){
    $req = $base->prepare('UPDATE faq SET `Reponse`=:reponse');
    $req->execute(array('reponse'=>$reponse));
    $req->closeCursor(); // Termine le traitement de la requête


}}

?>